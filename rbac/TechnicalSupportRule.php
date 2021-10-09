<?php
namespace app\rbac;
use yii\rbac\Rule;
use Yii;

class TechnicalSupportRule extends Rule
{
    public $name = 'isTechnicalSupport';

    public function execute($user ,$item ,$params)
    {
        $employee = \app\models\Employee::findOne(['user_id'=>$user]);
            
            if($employee)
            {
                return $employee->job_title == 'Technical Support';
            }else
            {
                return false;
            }
    }

}
?>