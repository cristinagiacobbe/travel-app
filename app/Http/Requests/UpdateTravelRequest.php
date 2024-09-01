<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTravelRequest extends FormRequest
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
            'title' => 'required|min:2|max:50',
            'date' => 'nullable|date',
            'cover_image' => 'nullable|image',
            'description' => 'nullable',
            'valutation' => 'nullable|numeric|max:5',
            'people' => 'nullable',
            'additional_notes' => 'nullable',
            'latitude' => 'required',
            'longitude' => 'required',
            'completed' => 'nullable'
        ];
    }
}
