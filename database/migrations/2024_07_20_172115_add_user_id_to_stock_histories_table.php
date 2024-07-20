<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AddUserIdToStockHistoriesTable extends Migration
{
    public function up()
    {
        // Paso 1: Añadir la columna user_id como nullable
        Schema::table('stock_histories', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('flavor_id');
        });

        // Paso 2: Actualizar los registros existentes para asignar un user_id predeterminado si hay un usuario predeterminado
        $defaultUserId = User::first()->id ?? null;
        if ($defaultUserId) {
            DB::table('stock_histories')->update(['user_id' => $defaultUserId]);
        }

        // Mantener la columna user_id como nullable
        Schema::table('stock_histories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('stock_histories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
