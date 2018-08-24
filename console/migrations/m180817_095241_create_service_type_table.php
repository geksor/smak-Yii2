<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service_tipe`.
 */
class m180817_095241_create_service_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service_type', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64),
            'short_description' => $this->string(130),
            'description' => $this->text(),
            'publish' => $this->integer(1)->defaultValue(0),
            'order' => $this->integer(11)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('service_type');
    }
}
