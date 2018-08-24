<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oms_link`.
 */
class m180820_072328_create_oms_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('oms_link', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'link' => $this->text(),
            'order' => $this->integer(11)->defaultValue(1),
            'publish' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('oms_link');
    }
}
