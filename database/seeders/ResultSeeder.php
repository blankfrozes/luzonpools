<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $results = [];

        $begin = new Carbon('2021-01-01 04:00:00');
        $end = new Carbon('2022-12-15 18:00:00');
        $a = 0;
        $b = 1;

        for ($i = $begin; $i <= $end; $i->modify('+12 hours')) {
            $a += 1;
            $results[] = [
                'periode' => $a,
                'first' => random_int(1000, 9999),
                'second' => random_int(1000, 9999),
                'third' => random_int(1000, 9999),
                'starter' => random_int(1000, 9999) . "," . random_int(1000, 9999) . "," . random_int(1000, 9999) .  "," . random_int(1000, 9999) . "," . random_int(1000, 9999) . "," .random_int(1000, 9999),
                'consolation' => random_int(1000, 9999) . "," . random_int(1000, 9999) . "," . random_int(1000, 9999) .  "," . random_int(1000, 9999) . "," . random_int(1000, 9999) . "," .random_int(1000, 9999),
                'complete' => 1,
                'created_at' => Carbon::parse($i)->toDateTimeString(),
                'updated_at' => Carbon::parse($i)->toDateTimeString(),
            ];
        }

        $collection = collect($results);
        $sorted = $collection->sortBy('periode');

        DB::table('results')->insert($sorted->values()->all());
    }
}