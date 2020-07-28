<?php

use App\Mesin;
use Illuminate\Database\Seeder;

class MesinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mesin = ['kode' => 'M1', 'lokasi' => 'Kantor', 'ip' => '192.168.1.253'];

        Mesin::create($mesin);
    }
}
