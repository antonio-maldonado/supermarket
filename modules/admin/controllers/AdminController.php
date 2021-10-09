<?php

namespace app\modules\admin\controllers;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
     public function actionCreateUser($id, $role='employee')
    {
        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
        ]);
        if($role == 'employee'){    
            $model = \app\models\Employee::findOne($id);
            $user->username = $model->username;
            if($model->email) {
                $user->email=$model->email;
            } else {
                $user->email=$model->proposeEmail; 
            }
        
            $event = $this->getUserEvent($user);

            $this->performAjaxValidation($user);
        
            $this->trigger(self::EVENT_BEFORE_CREATE, $event);
            if ($user->load(\Yii::$app->request->post()) && $user->create($role)) {
                \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
                $this->trigger(self::EVENT_AFTER_CREATE, $event);
            //            
                $model->user_id = $user->id;
					 $model->email=$user->email;              
                $model->save(false);
                    // nuestra magia esta aquí!!!!
            	     // nuestra magia esta aquí!!!!
            // the following three lines were added: For RBAC 
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('employee');
            $auth->assign($authorRole, $user->getId());
            // End RBAC
                return $this->redirect(['/admin/employee/index']);
            //
            //return $this->redirect(['update', 'id' => $user->id]);
            }
        } elseif($role == 'customer') {
            $model = \app\models\Customer::findOne($id);
            $user->username = $model->username;
        
            if($model->contactEmail) {
                $user->email=$model->contactEmail;
            } else {
                $user->email=$model->proposeEmail; 
            }
        
            $event = $this->getUserEvent($user);

            $this->performAjaxValidation($user);
        
            $this->trigger(self::EVENT_BEFORE_CREATE, $event);
            if ($user->load(\Yii::$app->request->post()) && $user->create($role)) {
                \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
                $this->trigger(self::EVENT_AFTER_CREATE, $event);
            //            
                $model->user_id = $user->id;
                $model->save(false);
                  // nuestra magia esta aquí!!!!
            	     // nuestra magia esta aquí!!!!
            // the following three lines were added: For RBAC 
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('customer');
            $auth->assign($authorRole, $user->getId());
            // End RBAC
                return $this->redirect(['admin/customer/index']);
            //
            //return $this->redirect(['update', 'id' => $user->id]);
            }
        
        }    
        return $this->render('create', [
            'user' => $user,
        ]);
    }

}
