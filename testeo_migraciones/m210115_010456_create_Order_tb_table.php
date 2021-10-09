<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Order_tb}}`.
 */
class m210115_010456_create_Order_tb_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Order_tb}}', [
            'ID_order' => $this->primaryKey(),
            'Customer_ID_ord' => $this->integer(['length' => 10]),
            'Date_of_purchase_ord' => $this->date(),
            'Employee_ID_ord' => $this->integer(['length' => 10]),
            'Names_of_products_ord' => $this->string(1500),
            'Number_of_products_ord' => $this->integer(['length' => 10]),        
            'Payment_ID_ord' => $this->integer(['length' => 10]), 
            'Prices_of_products_ord' => $this->string(1500),
            'Product_code_ord' => $this->string(500),
            'Status_ord' => "enum('Pagado','No pagado','En proceso')",
            'Total_price_ord' => $this->decimal(10,2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Order_tb}}');
    }
}
