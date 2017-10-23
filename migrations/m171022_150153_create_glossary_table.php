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
        ]);

        $this->createIndex(
            'idx-glossary-id',
            'glossary',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('glossary');
    }
}
