<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m180820_072404_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'short_text' => $this->string(1000),
            'full_text' => $this->text(),
            'image' => $this->text(),
            'create_date' => $this->integer(),
            'publish_start' => $this->integer(),
            'publish_end' => $this->integer(),
            'publish' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}
