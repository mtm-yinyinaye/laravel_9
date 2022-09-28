<?php

namespace App\Http\Requests;

use App\Models\TestModel;
use App\Rules\ExistsID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name' => Rule::forEach(function ($value, $attribute) {
            //     return []
            //     // return [
            //     //     'required',
            //     //     'srting',
            //     //     // Rule::exists(TestModel::class, 'name')
            //     // ]
            // }),
            'name' => ['required', new ExistsID(TestModel::class, 'name')],
            'amount' => 'required',
            'description' => 'required'
        ];
    }
}
