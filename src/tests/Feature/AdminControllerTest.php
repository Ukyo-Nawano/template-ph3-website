<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Choice;
use App\Models\Quiz;
use App\Models\Question;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * AdminControllerのeditアクションの基本的な機能テスト
     *
     * @return void
     */
    public function test_edit()
    {
        // テスト用のクイズデータを作成
        $quiz = Quiz::factory()->create();
        $questionId = 1;

        // ハードコーディングされたテストデータ
        $testData = [
            'name0' => Str::random(21),  // 21文字の文字列
            'name1' => 'Choice 2',
            'name2' => 'Choice 3',
            'valid' => 1,
        ];

        // Question モデルを作成
        Question::create([
            'id'      => $questionId,
            'quiz_id' => $quiz->id,
            'text'    => '質問の内容',
        ]);

        // Choice モデルを作成
        foreach (range(0, 2) as $key) {
            Choice::create([
                'question_id' => $questionId,
                'text'        => $testData['name' . $key],
                'is_correct'  => $key == $testData['valid'] ? 1 : 0,
            ]);
        }

        // 正常なリクエスト
        $response = $this->get(route('admin.edit', ['quiz' => $quiz]));
        $response->assertStatus(200);
        $response->assertSessionDoesntHaveErrors();

        // Debugging
        dump(session()->all());

        // 選択肢が20文字を超えていた場合エラーが出ることを確認
        $response = $this->get("/admin/{$quiz->id}/edit", array_merge($testData, [
            'name1' => Str::random(21),
            'name2' => Str::random(21),
        ]));

        // Debugging
        dump(session()->all());

        // validが0〜2以外の場合、エラーが出ることを確認
        $response = $this->get("/admin/{$quiz->id}/edit", array_merge($testData, ['valid' => 4]));

        // Debugging
        dump(session()->all());
    }
}
