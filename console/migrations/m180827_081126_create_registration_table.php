<?php

use yii\db\Migration;

/**
 * Handles the creation of table `registration`.
 */
class m180827_081126_create_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('registration', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'email' => $this->text(),
            'tel' => $this->string(18),
            'insurance' => $this->bigInteger(16),
            'date' => $this->integer(),
            'viewed' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('registration');
    }
}
