<?php

use yii\db\Migration;

class m151210_135246_seomanager extends Migration
{

    public $tableName = 'seomanager';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'route' => $this->string(),
            'title' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'canonical' => $this->string(),
            'data' => $this->string(),
            'updated' => $this->integer(),
            'created' => $this->integer()->notNull(),
        ]);

        $this->createIndex('seomanager_idx_route', $this->tableName, 'route');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
