<?php

use yii\db\Migration;

/**
 * Handles the creation of foreign key `foreign_key_to_article_table`.
 */
class m171022_161014_create_foreign_key_to_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addForeignKey(
            'fk-article-category_id',
            'article',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-article-category_id',
            'article'
        );
    }
}
