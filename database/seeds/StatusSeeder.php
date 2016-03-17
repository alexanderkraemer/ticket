<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new \App\Status();
        $status->id = 1;
        $status->title = 'new';
        $status->save();

        $status = new \App\Status();
        $status->id = 2;
        $status->title = 'opened';
        $status->save();

        $status = new \App\Status();
        $status->id = 3;
        $status->title = 'closed';
        $status->save();

        $status = new \App\Status();
        $status->id = 4;
        $status->title = 'suspended';
        $status->save();
    }
}
