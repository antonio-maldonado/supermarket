<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $code
 * @property string $name
 * @property string $description
 * @property int $quantity_in_stock
 * @property float $buy_price
 * @property float $MSRP
 * @property string|null $imageFile
 * @property string|null $promotion
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'description', 'quantity_in_stock', 'buy_price', 'MSRP'], 'required'],
            [['description'], 'string'],
            [['quantity_in_stock'], 'integer'],
            [['buy_price', 'MSRP'], 'number'],
            [['code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 70],
            [['imageFile', 'promotion'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'quantity_in_stock' => Yii::t('app', 'Quantity In Stock'),
            'buy_price' => Yii::t('app', 'Buy Price'),
            'MSRP' => Yii::t('app', 'Msrp'),
            'imageFile' => Yii::t('app', 'Image File'),
            'promotion' => Yii::t('app', 'Promotion'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
