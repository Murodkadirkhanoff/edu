<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
        // Базовые правила, общие для create и update
        $rules = [
            'title'                            => 'required|string',
            'description'                      => 'required|string',
            'lang_id'                          => 'required|integer',
            'course_level_id'                  => 'required|integer',
            'status'                           => 'required|integer',
            'is_whole_purchase_available'      => 'nullable|boolean',
            'whole_price_minor'                => 'required_if:is_whole_purchase_available,1|nullable|integer',
            'is_lesson_purchase_available'     => 'nullable|boolean',
            'lesson_price_minor'               => 'required_if:is_lesson_purchase_available,1|nullable|integer',
            'category_id'                      => 'required|integer',
            'subcategory_id'                   => 'required|integer',
        ];

        // Правила для thumbnail
        $thumbnailRules = ['mimes:jpeg,jpg,png', 'max:5000'];

        if ($this->isMethod('post')) {
            // При создании — обязательно
            array_unshift($thumbnailRules, 'required');
        } else {
            // При обновлении — только если прислали файл
            array_unshift($thumbnailRules, 'sometimes');
        }

        $rules['thumbnail'] = implode('|', $thumbnailRules);

        return $rules;
    }
}
