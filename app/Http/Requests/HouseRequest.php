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
            'rooms_number' => "required|numeric",
            'country' => 'required',
            'region' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|max:32000',
            'service' => 'nullable|exists:service,id',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo obbligatorop',
            'title.max' => 'Sono consentiti al massimo :max caratteri',
            'beds.required' => 'Devi specificare il numero di posti letto',
            'bathrooms.required' => 'Devi specificare il numero di bagni',
            'rooms_number.required' => 'Devi specificare il numero di stanze',
            'country.required' => 'Devi inserire il paese',
            'region.required' => 'Devi inserire una regione',
            'city.required' => 'Devi inserire la città',
            'address.required' => 'Devi inserire l\'indirizzo',
            'image.required' => 'Bisogna inserire un\'immagine',
            'service.exists' => 'Il servizio scelto non è presente',
            'image.image' => 'Il file caricato non è un\'immagine',
            'image.max' => 'L\'immagine è troppo pesante! Sono consentiti al massimo :max kb'
        ];
    }
}
