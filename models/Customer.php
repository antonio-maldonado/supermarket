<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Customer".
 *
 * @property int $ID_customer
 * @property string|null $Activity_ID_cus
 * @property string|null $Address_cus
 * @property int|null $Age_cus
 * @property string|null $City_cus
 * @property int|null $Code_postal_cus
 * @property string|null $Details_address_cus
 * @property string|null $Fullname_cus
 * @property string|null $Phone_cus
 * @property string|null $Phone_ref_cus
 * @property string|null $Reference_fullname_cus
 * @property string|null $Registration_date_cus
 * @property string|null $Relationship_ref_cus
 * @property string|null $State_cus
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Age_cus', 'Code_postal_cus'], 'integer'],
            [['Registration_date_cus'], 'safe'],
            [['Activity_ID_cus'], 'string', 'max' => 10],
            [['Address_cus', 'State_cus'], 'string', 'max' => 50],
            [['City_cus'], 'string', 'max' => 30],
            [['Details_address_cus', 'Fullname_cus', 'Reference_fullname_cus'], 'string', 'max' => 100],
            [['Phone_cus', 'Phone_ref_cus'], 'string', 'max' => 15],
            [['Relationship_ref_cus'], 'string', 'max' => 20],
            [['Activity_ID_cus'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_customer' => Yii::t('app', 'Id Customer'),
            'Activity_ID_cus' => Yii::t('app', 'Activity Id Cus'),
            'Address_cus' => Yii::t('app', 'Address Cus'),
            'Age_cus' => Yii::t('app', 'Age Cus'),
            'City_cus' => Yii::t('app', 'City Cus'),
            'Code_postal_cus' => Yii::t('app', 'Code Postal Cus'),
            'Details_address_cus' => Yii::t('app', 'Details Address Cus'),
            'Fullname_cus' => Yii::t('app', 'Fullname Cus'),
            'Phone_cus' => Yii::t('app', 'Phone Cus'),
            'Phone_ref_cus' => Yii::t('app', 'Phone Ref Cus'),
            'Reference_fullname_cus' => Yii::t('app', 'Reference Fullname Cus'),
            'Registration_date_cus' => Yii::t('app', 'Registration Date Cus'),
            'Relationship_ref_cus' => Yii::t('app', 'Relationship Ref Cus'),
            'State_cus' => Yii::t('app', 'State Cus'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
