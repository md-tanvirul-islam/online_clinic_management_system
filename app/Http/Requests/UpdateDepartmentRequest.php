<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class UpdateDepartmentRequest extends FormRequest
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

        // dd(request()->route()->parameters['department']);
        // $id = Route::current()->parameter('department');
        // dd(request()->route('department'));
        return [
            'name'   => [
                'required',
                'unique:departments,name,' . request()->route('department'),
            ],

            // 'name' => 'required|string|unique:departments,name,' . request()->route('department')->id,
            'is_active'=>[
                'required',
                'string',
                Rule::in(['yes', 'no']),
                'description'=>'string',
            ]

            
            
        ];
    }
}
