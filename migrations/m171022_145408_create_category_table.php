<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m171022_145408_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->createIndex(
            'idx-category-id',
            'category',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
