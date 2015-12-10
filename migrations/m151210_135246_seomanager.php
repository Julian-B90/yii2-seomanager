<?php

use yii\db\Migration;

class m151210_135246_seomanager extends Migration
{
    public function up()
    {
        $this->createTable('seomanger', [
            'id' => $this->primaryKey(),
            'route' => $this->string(),
            'title' => $this->string(),
            'description' => $this->string(),
            'canonical' => $this->string(),
            'data' => $this->string(),
            'updated' => $this->integer(),
            'created' => $this->integer()->notNull(),
        ]);

        $this->createIndex('seomanager_idx_route', 'seomanger', 'route');
    }

    public function down()
    {
        $this->dropTable('seomanger');
    }
}
