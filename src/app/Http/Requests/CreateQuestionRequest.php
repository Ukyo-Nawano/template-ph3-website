<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'quiz_id' => 'required|exists:quizzes,id',
            'text' => 'required|max:200',
            'choices' => 'required|array|size:3',
            'choices.*' => 'required|max:100',
            'correct_choice' => 'required|numeric|in:0,1,2',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 2MBまでの画像ファイル
        ];
    }
}
