<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery_image`.
 * Has foreign keys to the tables:
 *
 * - `gallery`
 */
class m180829_143154_create_gallery_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gallery_image', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'ownerId' => $this->integer()->notNull(),
            'rank' => $this->integer()->notNull()->defaultValue(0),
            'name' => $this->string(),
            'description' => $this->text()
        ]);

        // creates index for column `ownerId`
        $this->createIndex(
            'idx-gallery_image-ownerId',
            'gallery_image',
            'ownerId'
        );

        // add foreign key for table `gallery`
        $this->addForeignKey(
            'fk-gallery_image-ownerId',
            'gallery_image',
            'ownerId',
            'gallery',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `gallery`
        $this->dropForeignKey(
            'fk-gallery_image-ownerId',
            'gallery_image'
        );

        // drops index for column `ownerId`
        $this->dropIndex(
            'idx-gallery_image-ownerId',
            'gallery_image'
        );

        $this->dropTable('gallery_image');
    }
}
