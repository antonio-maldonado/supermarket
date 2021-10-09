<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Product}}`.
 */
class m210115_010558_create_Product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Product}}', [
            'Code_product' => $this->string(10),
            'Availability_pro' => "enum('No disponible','Disponible')",
            'Brand_pro' => $this->string(20),
            'Categorie_ID_pro' => $this->string(20),
            'Date_of_exp_pro' => $this->date(),
            'Description_pro' => $this->text(),
            'Img_product_pro' => "mediumblob",
            'Made_in_pro' => $this->string(100),
            'Name_pro' => $this->string(30),
            'Price_pro' => $this->decimal(10,2),
            'Provider_ID_pro' => $this->string(30)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Product}}');
    }
}
