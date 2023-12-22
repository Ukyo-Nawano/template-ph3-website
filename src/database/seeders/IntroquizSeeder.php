<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Introquiz;

class IntroquizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Introquiz::create([
            'id' => '1',
            'name' => '紹介クイズ'
        ]);

        Introquiz::create([
            'id' => '2',
            'name' => '紹介クイズ'
        ]);

        Introquiz::create([
            'id' => '3',
            'name' => '紹介クイズ'
        ]);
    }
}
