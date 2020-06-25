<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AddAdminToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@parkey.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'phone' => '0100000000',
                'nric' => '000000000000',
                'password' => Hash::make('admin123'),
                'isAdmin' => '1'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
