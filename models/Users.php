<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $ID_user
 * @property int $Active
 * @property string|null $ID_cus_emp
 * @property string|null $Email
 * @property string|null $Password
 * @property string|null $Username
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Active'], 'required'],
            [['Active'], 'integer'],
            [['ID_cus_emp'], 'string', 'max' => 20],
            [['Email'], 'string', 'max' => 100],
            [['Password', 'Username'], 'string', 'max' => 30],
            [['ID_cus_emp'], 'unique'],
            [['Email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_user' => Yii::t('app', 'Id User'),
            'Active' => Yii::t('app', 'Active'),
            'ID_cus_emp' => Yii::t('app', 'Id Cus Emp'),
            'Email' => Yii::t('app', 'Email'),
            'Password' => Yii::t('app', 'Password'),
            'Username' => Yii::t('app', 'Username'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
