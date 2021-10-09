<?php

namespace app\models;

use dektrium\user\models\Token;
use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public function register()
    {
        if ($this->getIsNewRecord() == false) {
            throw new \RuntimeException('Calling "' . __CLASS__ . '::' . __METHOD__ . '" on existing user');
        }

        $transaction = $this->getDb()->beginTransaction();

        try {
            $this->confirmed_at = $this->module->enableConfirmation ? null : time();
            $this->password     = $this->module->enableGeneratingPassword ? Password::generate(8) : $this->password;

            $this->trigger(self::BEFORE_REGISTER);

            if (!$this->save()) {
                $transaction->rollBack();
                return false;
            }

            // nuestra magia esta aquí!!!!
            // the following three lines were added: For RBAC 
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('regular');
            $auth->assign($authorRole, $this->getId());
            // End RBAC
            // fin de nuestra magia 
            if ($this->module->enableConfirmation) {
                /** @var Token $token */
                $token = \Yii::createObject(['class' => Token::className(), 'type' => Token::TYPE_CONFIRMATION]);
                $token->link('user', $this);
            }

            $this->mailer->sendWelcomeMessage($this, isset($token) ? $token : null);
            $this->trigger(self::AFTER_REGISTER);

            $transaction->commit();

            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            \Yii::warning($e->getMessage());
            throw $e;
        }
 }
   public function rules()
    {
        return [
        [['username'],'required'],
        	 [['email'], 'string', 'max' => 100],
        	  [['id'], 'unique'],
        	   [['password_hash'], 'string', 'max' => 100],
        ];
}   
}