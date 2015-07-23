<?php

use yii\db\Schema;
use yii\db\Migration;

class m150723_174021_delColCategories extends Migration
{
    public function up()
    {
        $this->dropColumn('category', 'level');
        $this->dropColumn('category', 'idPath');
        $this->dropColumn('category', 'parentId');
    }

    public function down()
    {
        $this->addColumn('category', 'parentId', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->addColumn('category', 'level', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->addColumn('category', 'idPath', Schema::TYPE_STRING . '(255) NOT NULL');
    }
}
