<?php

use yii\db\Schema;
use yii\db\Migration;

class m150803_083409_fixDesLengthCategory extends Migration
{
    public function up()
    {
        $this->dropColumn('category', 'seoDescription');
        $this->addColumn('category', 'seoDescription', Schema::TYPE_STRING . '(500) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('category', 'seoDescription');
        $this->addColumn('category', 'seoDescription', Schema::TYPE_STRING . '(255) NOT NULL');
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
