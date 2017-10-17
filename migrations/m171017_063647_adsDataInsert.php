<?php

use yii\db\Schema;
use yii\db\Migration;

class m171017_063647_adsDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%ads}}',
                           ["ads_id", "ads_name", "ads_desk", "ads_price", "ads_status", "ads_parent_user_id", "ads_create_date"],
                            [
    [
        'ads_id' => '19',
        'ads_name' => 'Активное',
        'ads_desk' => '123123',
        'ads_price' => '123123',
        'ads_status' => '1',
        'ads_parent_user_id' => '1',
        'ads_create_date' => '1508095709',
    ],
    [
        'ads_id' => '20',
        'ads_name' => 'Неактив',
        'ads_desk' => 'Неактив',
        'ads_price' => '11',
        'ads_status' => '0',
        'ads_parent_user_id' => '1',
        'ads_create_date' => '1508095753',
    ],
    [
        'ads_id' => '21',
        'ads_name' => 'Неактив',
        'ads_desk' => 'test',
        'ads_price' => '123',
        'ads_status' => '0',
        'ads_parent_user_id' => '7',
        'ads_create_date' => '1508095811',
    ],
    [
        'ads_id' => '22',
        'ads_name' => 'Активное',
        'ads_desk' => 'Активное',
        'ads_price' => '1',
        'ads_status' => '1',
        'ads_parent_user_id' => '9',
        'ads_create_date' => '1508099789',
    ],
    [
        'ads_id' => '23',
        'ads_name' => 'Неактив',
        'ads_desk' => 'Неактив',
        'ads_price' => '111',
        'ads_status' => '0',
        'ads_parent_user_id' => '9',
        'ads_create_date' => '1508100283',
    ],
    [
        'ads_id' => '24',
        'ads_name' => 'АКТИВ 16',
        'ads_desk' => '16',
        'ads_price' => '16',
        'ads_status' => '1',
        'ads_parent_user_id' => '9',
        'ads_create_date' => '1508102236',
    ],
    [
        'ads_id' => '25',
        'ads_name' => '123123',
        'ads_desk' => '123123',
        'ads_price' => '123',
        'ads_status' => '1',
        'ads_parent_user_id' => '10',
        'ads_create_date' => '1508109206',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%ads}} CASCADE');
    }
}
