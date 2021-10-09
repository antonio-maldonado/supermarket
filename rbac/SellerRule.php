<?php
namespace app\rbac;
use yii\rbac\Rule;
use Yii;

class SellerRule extends Rule
{
    public $name = 'isSeller';

    public function execute($user ,$item ,$params)
    {
        $employee = \app\models\Employee::findOne(['user_id'=>$user]);
            
            if($employee)
            {
                return $employee->job_title == 'Seller';
            }else
            {
                return false;
            }
    }

}
?>