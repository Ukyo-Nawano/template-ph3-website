<?php

namespace Tests\Feature;

use App\Models\BigQuestion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        // BigQuestionモデルのダミーレコードを作成
        BigQuestion::factory()->create(['name' => '/']);

        // / にアクセスした時のレスポンスを取得
        $response = $this->get('/');

        // レスポンスに「/」が含まれていることを確認
        $response->assertStatus(200);
        $response->assertSee('/');
    }
}
