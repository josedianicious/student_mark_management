<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::create(
            [
                'term_title' => 'One'
            ]
        );
        Term::create(
            [
                'term_title' => 'Two'
            ]
        );
        Term::create(
            [
                'term_title' => 'Three'
            ]
        );
    }
}
