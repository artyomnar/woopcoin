<?php

use yii\db\Migration;

/**
 * Handles the creation of table `glossary_category`.
 */
class m171113_152604_create_glossary_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('glossary_category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->createIndex(
            'idx-category-id',
            'glossary_category',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('glossary_category');
    }
}
