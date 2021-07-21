<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
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
        return [
            'title' => 'required|max:255',
            'beds' => 'required',
            'bathrooms' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo obbligato',
            'title.required' => 'Sono consentiti al massimo :max caratteri',
            'title.beds' => 'Devi specificare il numero di posti letto',
            'title.bathrooms' => 'Devi specificare il numero di bagni',
            'title.country' => 'Devi inserire il paese',
            'title.city' => 'Devi inserire la città',
            'title.address' => 'Devi inserire l\'indirizzo',
            'title.image' => 'Bisogna inserire un\'immagine',
        ];
    }
}
