<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class isirole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=> 'Pengguna',
        ]);
        DB::table('roles')->insert([
            'name'=> ' Pengguna & Penjual',
        ]);
        DB::table('roles')->insert([
            'name'=> 'Admin',
        ]);
        
    }
}
