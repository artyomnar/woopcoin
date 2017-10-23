<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rate`.
 */
class m171022_150351_create_rate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rate', [
            'id' => $this->primaryKey(),
            'currency' => $this->string(255)->notNull(),
            'old_value' => $this->float(),
            'new_value' => $this->float(),
        ]);

        $this->createIndex(
            'idx-rate-id',
            'rate',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rate');
    }
}
