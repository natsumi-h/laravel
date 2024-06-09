<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|url',
            'category' => 'required|in:chinese,indian,italian,japanese,mexican,thai,vietnamese',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'maxPax' => 'required|integer|min:1|max:100',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'レストラン名は必須です。',
            'name.string' => 'レストラン名は文字列でなければなりません。',
            'name.max' => 'レストラン名は最大255文字までです。',
            'image.url' => '画像のURLが無効です。',
            'category.required' => 'カテゴリは必須です。',
            'category.in' => 'カテゴリは指定された値の中から選択してください。',
            'description.required' => '説明は必須です。',
            'description.string' => '説明は文字列でなければなりません。',
            'address.required' => '住所は必須です。',
            'address.string' => '住所は文字列でなければなりません。',
            'address.max' => '住所は最大255文字までです。',
            'phone.required' => '電話番号は必須です。',
            'phone.string' => '電話番号は文字列でなければなりません。',
            'phone.max' => '電話番号は最大20文字までです。',
            'maxPax.required' => '最大収容人数は必須です。',
            'maxPax.integer' => '最大収容人数は整数でなければなりません。',
            'maxPax.min' => '最大収容人数は少なくとも1でなければなりません。',
            'maxPax.max' => '最大収容人数は100までです。',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Error',
            'errors' => $validator->errors()
        ], 422));
    }

    /**
     * Get the validated name.
     */
    public function name(): string
    {
        return $this->input('name');
    }

    /**
     * Get the validated image URL.
     */
    public function image(): string
    {
        return $this->input('image');
    }

    /**
     * Get the validated category.
     */
    public function category(): string
    {
        return $this->input('category');
    }

    /**
     * Get the validated description.
     */
    public function description(): string
    {
        return $this->input('description');
    }

    /**
     * Get the validated address.
     */
    public function address(): string
    {
        return $this->input('address');
    }

    /**
     * Get the validated phone number.
     */
    public function phone(): string
    {
        return $this->input('phone');
    }

    /**
     * Get the validated maximum number of pax.
     */
    public function maxPax(): int
    {
        return $this->input('maxPax');
    }
}
