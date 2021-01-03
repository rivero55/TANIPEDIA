<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            ['name'=> 'Sayur', 'slug' => 'sayur'],
            ['name'=> 'Buah-Buahan', 'slug' => 'buah-buahan'],
            ['name'=> 'Protein Hewani', 'slug' => 'protein-hewani'],
        ]);
    }
}
