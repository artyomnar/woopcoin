<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171022_145512_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string()->defaultValue(null),
            'password' => $this->string(),
            'isAdmin' => $this->integer()->defaultValue(0),
            'photo' => $this->string()->defaultValue(null),
        ]);

        $this->createIndex(
            'idx-user-id',
            'user',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
