<?php

use App\Currency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Rfc4122\UuidV5;

class AddCurrenciesToCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Currency::insert([
            "id" => UuidV5::uuid4(),
            "name" => "ریال",
            "short_name" => "ریال",
            "ratio_to_rial" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Currency::insert([
            "id" => UuidV5::uuid4(),
            "name" => "دلار",
            "short_name" => "$",
            "ratio_to_rial" => 200000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Currency::insert([
            "id" => UuidV5::uuid4(),
            "name" => "یورو",
            "short_name" => "€",
            "ratio_to_rial" => 250000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            //
        });
    }
}
