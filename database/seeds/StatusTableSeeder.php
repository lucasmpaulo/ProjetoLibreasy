<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->truncate();

        Status::create([
            'id' => 1,
            'status_atual' => 'Disponível',
        ]);

        Status::create([
            'id' => 2,
            'status_atual' => 'Indisponível',
        ]);
    }
}
