<?php
namespace app\rbac;
use yii\rbac\Rule;
use Yii;

class ManagerRule extends Rule
{
    public $name = 'isManager';

    public function execute($user ,$item ,$params)
    {
        $employee = \app\models\Employee::findOne(['user_id'=>$user]);
            
            if($employee)
            {
                return $employee->job_title == 'Manager';
            }else
            {
                return false;
            }
    }

}
?>