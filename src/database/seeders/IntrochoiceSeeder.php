<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Introchoice;

class IntrochoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Introchoice::create([
            'id' => '1',
            'question_id' => '1',
            'text' => '流山市',
            'is_correct' => '1',
        ]);

        Introchoice::create([
            'id' => '2',
            'question_id' => '1',
            'text' => '渋谷区',
            'is_correct' => '0',
        ]);

        Introchoice::create([
            'id' => '3',
            'question_id' => '1',
            'text' => 'さいたま市',
            'is_correct' => '0',
        ]);

        Introchoice::create([
            'id' => '4',
            'question_id' => '2',
            'text' => '7月6日',
            'is_correct' => '0',
        ]);

        Introchoice::create([
            'id' => '5',
            'question_id' => '2',
            'text' => '9月19日',
            'is_correct' => '0',
        ]);

        Introchoice::create([
            'id' => '6',
            'question_id' => '2',
            'text' => '11月21日',
            'is_correct' => '1',
        ]);

        Introchoice::create([
            'id' => '7',
            'question_id' => '3',
            'text' => 'カルチャー局',
            'is_correct' => '1',
        ]);

        Introchoice::create([
            'id' => '8',
            'question_id' => '3',
            'text' => 'テック局',
            'is_correct' => '0',
        ]);

        Introchoice::create([
            'id' => '9',
            'question_id' => '3',
            'text' => 'マーケ局',
            'is_correct' => '0',
        ]);
    }
}
