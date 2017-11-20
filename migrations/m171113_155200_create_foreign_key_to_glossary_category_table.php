<?php

use yii\db\Migration;

/**
 * Handles the creation of foreign key `foreign_key_to_glossary_category_table`.
 */
class m171113_155200_create_foreign_key_to_glossary_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addForeignKey(
            'fk-glossary-category_id',
            'glossary',
            'category_id',
            'glossary_category',
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
            'fk-glossary-category_id',
            'glossary'
        );
    }
}
