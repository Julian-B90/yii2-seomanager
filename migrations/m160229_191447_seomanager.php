<?php

use yii\db\Migration;

class m151210_135246_seomanager extends Migration
{

    public $tableName = 'seomanager';

    public function saveUp()
    {
        $this->alterColumn($this->tableName, 'data', $this->text);

        $this->createIndex('seomanager_idx_route', $this->tableName, 'route');
    }

    public function safeDown()
    {
        $this->alterColumn($this->tableName, 'data', $this->string);
    }
}
