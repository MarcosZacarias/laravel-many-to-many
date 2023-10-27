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
            'repo_path'=>'required|string|url',
            'img_path'=>'required|string|url',
            'description'=>'nullable|string',
            'type_id'=> 'nullable|exists:types,id',
            'technologies' => ['nullable', 'exists:technologies,id'],

        ];
    }

    public function messages(){
        return [
            'name.required'=>'The name is obligatory',
            'name.string' => 'The name must be a string',
            'name.max' => 'The name must be a maximum of 25 characters',
            'name.unique' => 'The name must be unique',

            'repo_path.required'=>'The link repository is obligatory',
            'repo_path.string' => 'The link repository must be a string',
            'repo_path.url' => 'The link repository must be a URI',

            
            'img_path.required' => 'The image path is obligatory',
            'img_path.string' => 'The image path must be a string',
            'img_path.url' => 'The image path must be a URI',

            'description.string'=> 'The description must be a string',

            'type_id.exists'=> 'The type entered is invalid',

            'tecnologies.exists' => 'The technologies inserted are not valid',


        ];
    } 
}