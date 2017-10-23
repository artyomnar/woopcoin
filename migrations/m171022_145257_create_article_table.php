<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m171022_145257_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'content' => $this->text(),
            'date' => $this->date()->notNull(),
            'image' => $this->string(),
            'viewed' => $this->integer(),
            'comments' => $this->integer(),
            'author_id' => $this->integer(),
            'status' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-article-id',
            'article',
            'id'
        );

        /*$this->addForeignKey(
            'fk-article-category_id',
            'article',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );*/
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
