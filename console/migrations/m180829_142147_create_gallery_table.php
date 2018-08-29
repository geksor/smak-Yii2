<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m180829_142147_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'publish' => $this->integer(1)->defaultValue(0),
            'rank' => $this->integer(11)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('gallery');
    }
}
