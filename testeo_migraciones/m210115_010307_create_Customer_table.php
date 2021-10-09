<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Customer}}`.
 */
class m210115_010307_create_Customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Customer}}', [
            'ID_customer' => $this->primaryKey(),
            'Activity_ID_cus' => $this->string(10),
            'Address_cus' => $this->string(50),
            'Age_cus' => $this->integer(['length' => 11]),
            'City_cus' => $this->string(30),
            'Code_postal_cus' => $this->integer(['length' => 15]),
            'Details_address_cus' => $this->string(100),
            'Email_cus' => $this->string(100),
            'Fullname_cus' => $this->string(100),
            'Password_cus' => $this->string(30),
            'Phone_cus' => $this->string(15),
            'Phone_ref_cus' => $this->string(15),
            'Reference_fullname_cus' => $this->string(100),
            'Registration_date_cus' => $this->date(),
            'Relationship_ref_cus' => $this->string(20),
            'State_cus' => $this->string(50),
            'Username_cus' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Customer}}');
    }
}
