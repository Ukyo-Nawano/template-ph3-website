<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Introquestion;

class IntroquestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Introquestion::create([
            'id' => '1',
            'image' => '',
            'text' => 'うきょうの出身地はどこ？',
            'supplement' => '',
            'quiz_id' => '1',
        ]);

        Introquestion::create([
            'id' => '2',
            'image' => '',
            'text' => 'うきょうの誕生日はいつ？',
            'supplement' => '',
            'quiz_id' => '2',
        ]);

        Introquestion::create([
            'id' => '3',
            'image' => '',
            'text' => 'うきょうは何局？',
            'supplement' => 'サバリ',
            'quiz_id' => '3',
        ]);
    }
}
