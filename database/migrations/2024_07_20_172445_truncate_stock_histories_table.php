<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB; // Asegúrate de importar la clase DB
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TruncateStockHistoriesTable extends Migration
{
    public function up()
    {
        DB::table('stock_histories')->truncate();
    }

    public function down()
    {
        // No need to reverse truncation
    }
}
