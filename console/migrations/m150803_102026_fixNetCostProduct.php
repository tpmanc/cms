<?php

use yii\db\Schema;
use yii\db\Migration;

class m150803_102026_fixNetCostProduct extends Migration
{
    public function up()
    {
        $this->dropColumn('product', 'netCost');
        $this->addColumn('product', 'netCost', Schema::TYPE_FLOAT . ' NOT NULL');
        $this->dropColumn('product', 'seoDescription');
        $this->addColumn('product', 'seoDescription', Schema::TYPE_STRING . '(500) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('product', 'netCost');
        $this->addColumn('product', 'netCost', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->dropColumn('product', 'seoDescription');
        $this->addColumn('product', 'seoDescription', Schema::TYPE_STRING . '(255) NOT NULL');
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
