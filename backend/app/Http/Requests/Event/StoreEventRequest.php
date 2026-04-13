<?php

namespace App\Http\Requests\Event;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string|max:2000',
            'type'             => 'required|in:religious,cultural,social,professional,sports',
            'location'         => 'required|string|max:255',
            'latitude'         => 'nullable|numeric|between:-90,90',
            'longitude'        => 'nullable|numeric|between:-180,180',
            'city'             => 'nullable|string|max:100',
            'country'          => 'nullable|string|max:10',
            'start_date'       => 'required|date|after:now',
            'end_date'         => 'nullable|date|after:start_date',
            'max_participants' => 'nullable|integer|min:1',
            'is_online'        => 'nullable|boolean',
            'group_id'         => 'nullable|exists:groups,id',
            'cover'            => 'nullable|image|mimes:jpg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'      => "Le titre de l'événement est obligatoire",
            'type.required'       => "Le type d'événement est obligatoire",
            'location.required'   => 'Le lieu est obligatoire',
            'start_date.required' => 'La date de début est obligatoire',
            'start_date.after'    => 'La date de début doit être dans le futur',
            'end_date.after'      => 'La date de fin doit être après la date de début',
        ];
    }
}
