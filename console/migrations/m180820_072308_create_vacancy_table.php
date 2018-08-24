<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vacancy`.
 */
class m180820_072308_create_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'text' => $this->text(),
            'create_date' => $this->integer(),
            'publish_date' => $this->integer(),
            'publish' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vacancy');
    }
}
