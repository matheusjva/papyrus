<?php

// phpcs:disable PSR1.Classes.ClassDeclaration

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Roles;
use App\Models\User;

class CreateDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Insere o usuário admin
         */
        $adminId = DB::table('users')->insertGetId([
            'email' => 'admin@example.org',
            'password' => bcrypt('secret'),
            'name' => 'Admin',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $adminId = DB::table('users')
            ->where('email', '=', 'admin@example.org')
            ->pluck('id')
            ->first();

        DB::table('users')->where('id', '=', $adminId)->delete();
    }
}
