<?php

use yii\db\Migration;

/**
 * Handles the creation of table `position_doctor`.
 * Has foreign keys to the tables:
 *
 * - `position`
 * - `doctor`
 */
class m180815_114555_create_junction_table_for_position_and_doctor_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('position_doctor', [
            'id' => $this->primaryKey(),
            'position_id' => $this->integer(),
            'doctor_id' => $this->integer(),
        ]);

        // creates index for column `position_id`
        $this->createIndex(
            'idx-position_doctor-position_id',
            'position_doctor',
            'position_id'
        );

        // add foreign key for table `position`
        $this->addForeignKey(
            'fk-position_doctor-position_id',
            'position_doctor',
            'position_id',
            'position',
            'id',
            'CASCADE'
        );

        // creates index for column `doctor_id`
        $this->createIndex(
            'idx-position_doctor-doctor_id',
            'position_doctor',
            'doctor_id'
        );

        // add foreign key for table `doctor`
        $this->addForeignKey(
            'fk-position_doctor-doctor_id',
            'position_doctor',
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
        // drops foreign key for table `position`
        $this->dropForeignKey(
            'fk-position_doctor-position_id',
            'position_doctor'
        );

        // drops index for column `position_id`
        $this->dropIndex(
            'idx-position_doctor-position_id',
            'position_doctor'
        );

        // drops foreign key for table `doctor`
        $this->dropForeignKey(
            'fk-position_doctor-doctor_id',
            'position_doctor'
        );

        // drops index for column `doctor_id`
        $this->dropIndex(
            'idx-position_doctor-doctor_id',
            'position_doctor'
        );

        $this->dropTable('position_doctor');
    }
}
