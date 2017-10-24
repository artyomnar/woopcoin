<?php

use yii\db\Migration;

/**
 * Handles the creation of table `publication`.
 */
class m171023_165722_create_publication_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('publication', [
            'id' => $this->primaryKey(),
            'name' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('publication');
    }
}
