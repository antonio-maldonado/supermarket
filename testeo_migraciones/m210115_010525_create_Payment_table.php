<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Payment}}`.
 */
class m210115_010525_create_Payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Payment}}', [
            'ID_payment' => $this->primaryKey(),
            'Date_of_payment_made_pay' => $this->date(),
            'Method_of_payment_pay' => "enum('Efectivo',
            'Tarjeta de crédito','Tarjeta de debito')",            
            'Total_paid_pay' => $this->decimal(10,2)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Payment}}');
    }
}
