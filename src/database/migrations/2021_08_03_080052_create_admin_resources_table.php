<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_resources', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('資源名稱');
            $table->string('icon', 255)->nullable()->comment('icon');
            $table->string('custom_url', 255)->nullable()->comment('自訂Url Path');
            $table->integer('parent_id')->default(0)->comment('父層ID');
            $table->integer('sort')->default(0)->comment('排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_resources');
    }
}
