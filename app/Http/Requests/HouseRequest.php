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
            'beds' => 'required|numeric',
            'bathrooms' => "required|numeric",
            'country' => 'required',
            'region' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postal_code' => 'required|numeric',
            'house_number' => 'required|numeric',
            'image' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo obbligatorop',
            'title.max' => 'Sono consentiti al massimo :max caratteri',
            'beds.required' => 'Devi specificare il numero di posti letto',
            'bathrooms.required' => 'Devi specificare il numero di bagni',
            'country.required' => 'Devi inserire il paese',
            'region.required' => 'Devi inserire una regione',
            'city.required' => 'Devi inserire la città',
            'address.required' => 'Devi inserire l\'indirizzo',
            'postal_code.required' => 'Devi inserire il codice postale',
            'house_number.requiredr' => 'Devi inserire un numero civico',
            'image.required' => 'Bisogna inserire un\'immagine',
        ];
    }
}
