<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reminder`.
 */
class m180827_081100_create_reminder_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('reminder', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'text' => $this->text(),
            'order' => $this->integer(11)->defaultValue(1),
            'publish' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('reminder');
    }
}
