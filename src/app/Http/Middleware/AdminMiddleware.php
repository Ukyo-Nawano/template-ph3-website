<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\Question;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_admin) {
            // ユーザーが管理者の場合、クイズデータや質問データを取得
            $quizzes = Quiz::withTrashed()->paginate(20);
            $questions = Question::withTrashed()->get();

            // ビューにデータを渡す
            view()->share(compact('quizzes', 'questions'));
            return $next($request);
        } else {
            // 管理者でない場合、トップページにリダイレクト
            return (redirect('/top')); // トップページのURLに変更してください
        }

    }
}
