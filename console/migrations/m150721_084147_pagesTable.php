<?php

use yii\db\Schema;
use yii\db\Migration;

class m150721_084147_pagesTable extends Migration
{
    public function up()
    {
        $this->createTable('staticPages', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_VARCHAR . ' (255)',
            'text' => Schema::TYPE_TEXT,
            'seoTitle' => Schema::TYPE_VARCHAR . ' (255)',
            'seoDesctiption' => Schema::TYPE_VARCHAR . ' (255)',
            'seoKeywords' => Schema::TYPE_VARCHAR . ' (255)',
            'chpu' => Schema::TYPE_VARCHAR . ' (255)',
        ]);
    }

    public function down()
    {
        $this->dropTable('staticPages');
    }
}
