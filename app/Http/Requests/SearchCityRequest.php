<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class SearchCityRequest extends FormRequest
{
public function authorize(): bool
{
return true;
}


public function rules(): array
{
return [
'city' => ['required', 'string', 'min:2', 'max:80']
];
}


public function messages(): array
{
return [
'city.required' => 'Please enter a city name.',
];
}
}
