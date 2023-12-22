<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Choice;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Choice::create([
            'id' => '1',
            'question_id' => '1',
            'text' => '約79万人',
            'is_correct' => '1',
        ]);

        Choice::create([
            'id' => '2',
            'question_id' => '1',
            'text' => '約28万人',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '3',
            'question_id' => '1',
            'text' => '約183万人',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '4',
            'question_id' => '2',
            'text' => 'INTECH',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '5',
            'question_id' => '2',
            'text' => 'BIZZTECH',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '6',
            'question_id' => '2',
            'text' => 'X-TECH',
            'is_correct' => '1',
        ]);

        Choice::create([
            'id' => '7',
            'question_id' => '3',
            'text' => 'Internet of Things',
            'is_correct' => '1',
        ]);

        Choice::create([
            'id' => '8',
            'question_id' => '3',
            'text' => 'Information on Tool',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '9',
            'question_id' => '3',
            'text' => 'Integrate into Technology',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '10',
            'question_id' => '4',
            'text' => '流山市',
            'is_correct' => '1',
        ]);

        Choice::create([
            'id' => '11',
            'question_id' => '4',
            'text' => '渋谷区',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '12',
            'question_id' => '4',
            'text' => 'さいたま市',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '13',
            'question_id' => '5',
            'text' => '7月6日',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '14',
            'question_id' => '5',
            'text' => '9月19日',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '15',
            'question_id' => '5',
            'text' => '11月21日',
            'is_correct' => '1',
        ]);

        Choice::create([
            'id' => '16',
            'question_id' => '6',
            'text' => 'カルチャー局',
            'is_correct' => '1',
        ]);

        Choice::create([
            'id' => '17',
            'question_id' => '6',
            'text' => 'テック局',
            'is_correct' => '0',
        ]);

        Choice::create([
            'id' => '18',
            'question_id' => '6',
            'text' => 'マーケ局',
            'is_correct' => '0',
        ]);
    }
}
