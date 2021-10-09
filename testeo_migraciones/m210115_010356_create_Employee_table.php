<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee}}`.
 */
class m210115_010356_create_Employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee}}', [
            'ID_employee' => $this->primaryKey(),
            'Activity_ID_emp' => $this->string(30),
            'Age_emp' => $this->integer(['length' => 11]),
            'Address_emp' => $this->string(50),
            'Categorie_ID_emp' => $this->integer(['length' => 10]),
            'Email_emp' => $this->string(100),
            'First_name_emp' => $this->string(50),
            'Job_title_emp' => "enum('Administrador','Recursos humanos',
            'Supervisor de area','Jefe de productos nuevos',
            'Jefe de productos obsoletos','Registrador de productos nuevos',
            'Registrador de productos obsoletos','Vendedor')",
            'Last_name_emp' => $this->string(50),
            'Password_emp' => $this->string(30),
            'Phone_emp' => $this->string(15),
            'Sex_emp' => "enum('Masculino','Femenino','Prefiero no decirlo')",
            'Username_emp' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Employee}}');
    }
}
