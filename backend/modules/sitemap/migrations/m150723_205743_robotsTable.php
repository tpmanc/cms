<?php

use yii\db\Schema;
use yii\db\Migration;

class m150723_205743_robotsTable extends Migration
{
    public function up()
    {
        $this->createTable('robotsModule', [
            'id' => Schema::TYPE_PK,
            'param' => Schema::TYPE_STRING . '(255) NOT NULL',
            'value' => Schema::TYPE_STRING . '(255) NOT NULL',
            'UNIQUE KEY `param` (`param`)',
        ]);
        $this->insert('robotsModule', [
            'param' => 'disabledItems',
            'value' => '',
        ]);
    }

    public function down()
    {
        $this->dropTable('robotsModule');
    }
}