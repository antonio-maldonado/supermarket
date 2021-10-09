<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $order_date
 * @property string|null $code_product
 * @property float|null $price_each
 * @property int|null $quantity_in_stock_product
 * @property string|null $promotion_product
 * @property int $order_number
 * @property int|null $employee_id
 * @property int $id
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_date', 'order_number'], 'required'],
            [['order_date'], 'safe'],
            [['price_each'], 'number'],
            [['quantity_in_stock_product', 'order_number', 'employee_id'], 'integer'],
            [['code_product'], 'string', 'max' => 15],
            [['promotion_product'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_date' => Yii::t('app', 'Order Date'),
            'code_product' => Yii::t('app', 'Code Product'),
            'price_each' => Yii::t('app', 'Price Each'),
            'quantity_in_stock_product' => Yii::t('app', 'Quantity In Stock Product'),
            'promotion_product' => Yii::t('app', 'Promotion Product'),
            'order_number' => Yii::t('app', 'Order Number'),
            'employee_id' => Yii::t('app', 'Employee ID'),
            'id' => Yii::t('app', 'ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
