<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table`.
 * Has foreign keys to the tables:
 *
 * - `doctor`
 */
class m180815_082654_create_table_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('table', [
            'id' => $this->primaryKey(),
            'doctor_id' => $this->integer(),
            'table_pay' => $this->text(),
            'table_oms' => $this->text(),
        ]);

        // creates index for column `doctor_id`
        $this->createIndex(
            'idx-table-doctor_id',
            'table',
            'doctor_id'
        );

        // add foreign key for table `doctor`
        $this->addForeignKey(
            'fk-table-doctor_id',
            'table',
            'doctor_id',
            'doctor',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `doctor`
        $this->dropForeignKey(
            'fk-table-doctor_id',
            'table'
        );

        // drops index for column `doctor_id`
        $this->dropIndex(
            'idx-table-doctor_id',
            'table'
        );

        $this->dropTable('table');
    }
}
