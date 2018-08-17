<?php

use yii\db\Migration;

/**
 * Handles the creation of table `doctor`.
 * Has foreign keys to the tables:
 *
 * - `position`
 */
class m180815_081024_create_doctor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('doctor', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'photo' => $this->text(),
            'info' => $this->text(),
            'diplom' => $this->text(),
            'publish' => $this->integer()->defaultValue(0),
            'order' =>  $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('doctor');
    }
}
