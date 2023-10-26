<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name'=>'required|string|max:25|unique:projects,name,' . $this->project->name,
            'name_repo'=>'required|string',
            'img_path'=>'required|string|url',
            'description'=>'nullable|string',
            'type_id'=> 'nullable|exists:types,id',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'The name is obligatory',
            'name.string' => 'The name must be a string',
            'name.max' => 'The name must be a maximum of 25 characters',
            'name.unique' => 'The name must be unique',

            'name_repo.required'=>'The name repository is obligatory',
            'name_repo.string' => 'The name repository must be a string',
            
            'img_path.required' => 'The image path is obligatory',
            'img_path.string' => 'The image path must be a string',
            'img_path.url' => 'The image path must be a URI',

            'description.string'=> 'The description must be a string',

            'type_id.exists'=> 'The type entered is invalid',

        ];
    } 
}