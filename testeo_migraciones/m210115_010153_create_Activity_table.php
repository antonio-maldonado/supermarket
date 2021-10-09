<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Activity}}`.
 */
class m210115_010153_create_Activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Activity}}', [
            'ID_activity' => $this->primaryKey(),
            'IP_act' => $this->string(15),
            'ID_user_act' => $this->string(30),
            'Last_time_active_act' => $this->date(),
            'Token' => $this->string(150)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Activity}}');
    }
}
