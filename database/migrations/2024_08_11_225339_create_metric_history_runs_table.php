<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricHistoryRunsTable extends Migration
{
    public function up()
    {

        Schema::create('metric_history_runs', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->decimal('accessibility_metric', 5, 2)->nullable();
            $table->decimal('performance_metric', 5, 2)->nullable();
            $table->decimal('best_practices_metric', 5, 2)->nullable();
            $table->unsignedBigInteger('strategy_id');
            $table->timestamps();
        
            $table->foreign('strategy_id')->references('id')->on('strategies')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('metric_history_runs');
    }
}
