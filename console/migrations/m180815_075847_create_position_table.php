<?php

use yii\db\Migration;

/**
 * Handles the creation of table `position`.
 */
class m180815_075847_create_position_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('position');
    }
}
