<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Categorie}}`.
 */
class m210115_010230_create_Categorie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Categorie}}', [
            'ID_categorie' => $this->primaryKey(),
            'Description_cat' => $this->text(),
            'Name_cat' => "enum('Farmacia','Linea_blanca',
            'Productos_del_hogar','General','Usuarios')",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Categorie}}');
    }
}
