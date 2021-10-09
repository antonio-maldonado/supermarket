<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Promotions}}`.
 */
class m210115_010632_create_Promotions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Promotions}}', [
            'ID_promotion' => $this->primaryKey(),
            'Categorie_ID_prom' => $this->integer(['length' => 10]),
            'End_date_prom' => $this->date(),
            'Name_prom' => $this->string(50),
            'Product_code_prom' => $this->string(10),
            'Start_date_prom' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Promotions}}');
    }
}
