<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tasks';

    /**
     * Run the migrations.
     * @table tasks
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->integer('priority')->nullable();
            $table->unsignedInteger('projects_id')->nullable();

            $table->index(["projects_id"], 'fk_tasks_projects_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('projects_id', 'fk_tasks_projects_idx')
                ->references('id')->on('projects')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
