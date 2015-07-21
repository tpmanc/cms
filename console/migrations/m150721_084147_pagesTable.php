<?php

use yii\db\Schema;
use yii\db\Migration;

class m150721_084147_pagesTable extends Migration
{
    public function up()
    {
        $this->createTable('staticPage', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'seoTitle' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoDesctiption' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoKeywords' => Schema::TYPE_STRING . '(255) NOT NULL',
            'chpu' => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('staticPage');
    }
}
