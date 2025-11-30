<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Разрешаем всем пользователям отправлять
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
                'regex:/^[A-Za-zÀ-žа-яА-Я0-9\s\-\_\.]+$/u',
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                'max:50'
            ],

            'phone' => [
                'required',
                'string',
                'regex:/^\+?[0-9]{7,15}$/',
                'max:15'
            ],

            'topic' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z0-9_\-\.]+$/u',
            ],

            'message' => [
                'required',
                'string',
                'max:250',
                'not_regex:/<[^>]*>/',  // запрет HTML
                'not_regex:/script/i',   // запрет JS
                'not_regex:/on\w+=/i',   // запрет onClick и т.п.
                'not_regex:/\<?php/i',   // запрет PHP
            ],

            'hp_secret' => ['nullable', 'max:0'],
        ];
    }

    // Санитизация данных после валидации
    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);

        foreach ($data as $key => $value) {
            $data[$key] = strip_tags($value); // вырезаем опасные фрагменты
        }

        return $data;
    }

    public function expectsJson()
    {
        return true;
    }



}
