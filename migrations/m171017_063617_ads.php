<?php

use yii\db\Schema;
use yii\db\Migration;

class m171017_063617_ads extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%ads}}',
            [
                'ads_id'=> $this->primaryKey(11)->comment('ID объявления'),
                'ads_name'=> $this->string(255)->notNull(),
                'ads_desk'=> $this->text()->notNull(),
                'ads_price'=> $this->integer(11)->notNull(),
                'ads_status'=> $this->integer(11)->notNull(),
                'ads_parent_user_id'=> $this->integer(11)->notNull(),
                'ads_create_date'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%ads}}');
    }
}
