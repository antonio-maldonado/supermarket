<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pharse".
 *
 * @property int $id
 * @property string|null $data
 */
class Pharse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pharse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'data' => Yii::t('app', 'Data'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PharseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PharseQuery(get_called_class());
    }
}
