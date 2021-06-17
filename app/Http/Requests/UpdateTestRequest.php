<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateTestRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $current_test_id = Route::current()->test->id;
        return [
            'name' =>'required|string|unique:tests,name,'.$current_test_id,
            'testType_id'=>'required|integer',
            'price'=>'required|integer'
        ];
    }
}
