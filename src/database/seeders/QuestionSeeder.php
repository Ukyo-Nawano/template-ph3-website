<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'id' => '1',
            'image' => '',
            'text' => '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
            'supplement' => '経済産業省 2019年3月 － IT 人材需給に関する調査',
            'quiz_id' => '1',
        ]);

        Question::create([
            'id' => '2',
            'image' => '',
            'text' => '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
            'supplement' => '',
            'quiz_id' => '1',
        ]);

        Question::create([
            'id' => '3',
            'image' => '',
            'text' => 'IoTとは何の略でしょう？',
            'supplement' => '',
            'quiz_id' => '1',
        ]);

        Question::create([
            'id' => '4',
            'image' => '',
            'text' => 'うきょうの出身地はどこ？',
            'supplement' => '',
            'quiz_id' => '2',
        ]);

        Question::create([
            'id' => '5',
            'image' => '',
            'text' => 'うきょうの誕生日はいつ？',
            'supplement' => '',
            'quiz_id' => '2',
        ]);

        Question::create([
            'id' => '6',
            'image' => '',
            'text' => 'うきょうは何局？',
            'supplement' => 'サバリ',
            'quiz_id' => '2',
        ]);
    }
}
