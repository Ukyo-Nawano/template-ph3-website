<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;
use App\Http\Requests\CreateQuizRequest;
use App\Http\Requests\CreateQuestionRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $quizzes = Quiz::withTrashed()->paginate(20);
        $questions = Question::withTrashed()->get();

        return view('admin.dashboard', compact('quizzes', 'questions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        $questions = Question::withTrashed()->where('quiz_id', $quiz->id)->with('choices')->paginate(20);
        return view('admin.show', compact('quiz', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    public function questionCreate()
    {
        $quizzes = Quiz::all();
        $questions = Question::all();
        return view('admin.questionCreate', [
            'quizzes' => $quizzes, // クイズのデータ
            'questions' => $questions, // 設問のデータ
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateQuizRequest $request)
    {
        // バリデーションが成功した場合の処理

        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Quiz::create([
            'name' => $request->input('name'), // フォームからの入力を取得
        ]);
        // データベースに問題タイトルを保存する処理を追加

        return redirect()->route('admin.dashboard')->with('add', '新しいクイズのタイトルを作成しました！');
    }

    public function questionStore(CreateQuestionRequest $request)
    {
        // バリデーションが成功した場合の処理
        $validatedData = $request->validated();

        // クイズの設問をデータベースに保存

        $newQuestion = new Question();
        $newQuestion->quiz_id = $validatedData['quiz_id'];
        $newQuestion->text = $request->input('text');
        $newQuestion->save();

        // 選択肢を`choices` テーブルに挿入
        $choicesArray = $request->input('choices');
        $correctChoiceIndex = $request->input('correct_choice'); // 正解の選択肢のインデックス

        foreach ($choicesArray as $index => $choiceText) {
            $choice = new Choice();
            $choice->text = $choiceText;
            $choice->question_id = $newQuestion->id;
            $choice->is_correct = ($index == $correctChoiceIndex) ? 1 : 0; // 正解かどうかを判定
            $choice->save();
        }

        // 画像の処理
        $image = $request->file('image');

        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $newQuestion->image = $imageName;
        }

        $newQuestion->save();

        // 各設問に関連付けられた画像をセッションに保存
        session(['question_' . $newQuestion->id . '_image' => $newQuestion->image]);

        // リダイレクトと成功メッセージの表示
        return redirect()->route('admin.show', ['quiz' => $validatedData['quiz_id']])
            ->with('add', '新しい設問を作成しました!');
    }



    /**
     * Show the form for editing the specified resource.
     */

    public function questionEdit(Quiz $quiz, $id)
    {
        $question = Question::find($id); // 設問を取得
        $choices = $question->choices; // 設問に関連付けられた選択肢を取得

        return view('admin.questionEdit', compact('question', 'choices', 'quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.edit', compact('quiz'));
    }



    /**
     * Update the specified resource in storage.
     */

    public function questionUpdate(Request $request, $id)
    {

        $question = Question::find($id);

        if ($question) {
            $question->update([
                'text' => $request->input('text'),
                'correct_choice' => $request->input('correct_choice'),
            ]);

            // 選択肢の更新ロジック
            $choices = $request->input('choices');
            $correctChoiceText = $request->input('correct_choice'); // 正解のテキスト

            // 既存の選択肢を削除し、新しい選択肢を追加
            $question->choices()->delete();
            foreach ($choices as $choiceText) {
                $choice = new Choice();
                $choice->text = $choiceText;
                $choice->is_correct = ($choiceText === $correctChoiceText) ? 1 : 0; // 正解のテキストと一致するか判断
                $question->choices()->save($choice);
            }

            // 画像の処理
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                // 既存の画像を削除
                if ($question->image) {
                    // 削除するファイルのフルパスを指定
                    $imagePath = public_path($question->image);
                    // ファイルが存在する場合のみ削除
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $question->image = null;
                }
                $question->image = $imageName; // データベースにはファイル名のみを保存
            }



            // if ($image) {
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('images'), $imageName);
            //     $newQuestion->image = $imageName;
            // }

            // $newQuestion->save();

            $question->save();

            return redirect()->route('admin.show', ['quiz' => $question->quiz_id])->with('message', '設問が更新されました！');
        }
    }



    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.dashboard')->with('message', '更新されました！');
    }





    /**
     * Remove the specified resource from storage.
     */

    public function questionDestroy(Question $question)
    {
        // 設問に関連する選択肢（choices）を削除
        $question->choices()->delete();

        // 設問に関連する画像（image）を削除
        if ($question->image) {

            // 画像カラムを null に設定 (論理削除)
            $question->image = "";
            $question->save();
        }

        // 設問自体を削除
        $question->delete();

        return redirect()->route('admin.show', ['quiz' => $question->quiz_id])->with('message', '設問と関連リソースが削除されました');
    }


    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.dashboard')->with('success', '削除しました！');
    }

    public function createAdmin()
    {
        $user = new User();
        $user->name = 'Admin User';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('adminpassword');
        $user->is_admin = true;
        $user->save();

        return "Admin user created!";
    }

    public function makeAdmin($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->is_admin = true;
            $user->save();

            return "User with ID $userId is now an admin.";
        } else {
            return "User not found.";
        }
    }
}
