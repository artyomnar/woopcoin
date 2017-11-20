<?php

use yii\db\Migration;

/**
 * Handles the creation of table `glossary`.
 */
class m171022_150153_create_glossary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('glossary', [
            'id' => $this->primaryKey(),
            'item' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-glossary-id',
            'glossary',
            'id'
        );

        /*$this->addForeignKey(
            'fk-glossary-category_id',
            'glossary',
            'category_id',
            'glossary_category',
            'id',
            'CASCADE'
        );*/
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        /*$this->dropForeignKey(
            'fk-glossary-category_id',
            'glossary'
        );*/

        $this->dropTable('glossary');
    }
}
