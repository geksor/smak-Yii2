<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service_item`.
 * Has foreign keys to the tables:
 *
 * - `service_type`
 */
class m180817_100454_create_service_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service_item', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(),
            'title' => $this->string(256),
            'day_count' => $this->integer(3),
            'price' => $this->integer(7),
            'publish' => $this->integer(1)->defaultValue(0),
            'order' => $this->integer(11)->defaultValue(1),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            'idx-service_item-type_id',
            'service_item',
            'type_id'
        );

        // add foreign key for table `service_type`
        $this->addForeignKey(
            'fk-service_item-type_id',
            'service_item',
            'type_id',
            'service_type',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `service_type`
        $this->dropForeignKey(
            'fk-service_item-type_id',
            'service_item'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            'idx-service_item-type_id',
            'service_item'
        );

        $this->dropTable('service_item');
    }
}
