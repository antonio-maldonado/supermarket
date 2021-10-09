<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Provider}}`.
 */
class m210115_010704_create_Provider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Provider}}', [
            'ID_provider' => $this->string(10),
            'Description_prov' => $this->text(),
            'Name_prov' => $this->string(100),
            'Phone_prov' => $this->string(15),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Provider}}');
    }
}
