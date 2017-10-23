<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m171022_145445_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->createIndex(
            'idx-tag-id',
            'tag',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tag');
    }
}
