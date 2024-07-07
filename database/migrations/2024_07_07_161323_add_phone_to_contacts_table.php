<?php
// 2024_07_07_161323_add_phone_to_contacts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToContactsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Modify the 'phone' column if needed
            $table->string('phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // If necessary, reverse any changes made in the 'up' method
            $table->dropColumn('phone');
        });
    }
}

