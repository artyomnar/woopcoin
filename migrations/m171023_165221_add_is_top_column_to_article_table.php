<?php

use yii\db\Migration;

/**
 * Handles adding is_top to table `article`.
 */
class m171023_165221_add_is_top_column_to_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article', 'is_top', $this->integer()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article', 'is_top');
    }
}
