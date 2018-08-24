<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180820_072353_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(64),
            'date' => $this->integer(),
            'text' => $this->text(),
            'email' => $this->text(),
            'publish' => $this->integer(1)->defaultValue(0),
            'viewed' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment');
    }
}
