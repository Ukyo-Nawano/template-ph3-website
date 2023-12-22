<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'id' => '1',
            'name' => 'ITクイズ'
        ]);

        Quiz::create([
            'id' => '2',
            'name' => '紹介クイズ'
        ]);

        Quiz::create([
            'id' => '3',
            'name' => ''
        ]);

        // 100件のダミーデータを作成し、保存する
        Quiz::factory(100)->create();
    }
}
