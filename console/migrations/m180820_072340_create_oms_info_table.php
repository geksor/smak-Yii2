<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oms_info`.
 */
class m180820_072340_create_oms_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('oms_info', [
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
        $this->dropTable('oms_info');
    }
}
