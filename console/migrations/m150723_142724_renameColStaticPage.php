<?php

use yii\db\Schema;
use yii\db\Migration;

class m150723_142724_renameColStaticPage extends Migration
{
    public function up()
    {
        $this->dropColumn('staticPage', 'seoDesctiption');
        $this->addColumn('staticPage', 'seoDescription', Schema::TYPE_STRING . '(255) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('staticPage', 'seoDescription');
        $this->addColumn('staticPage', 'seoDesctiption', Schema::TYPE_STRING . '(255) NOT NULL');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
