<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreMachineRequest extends FormRequest
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
            "name" => 'required',
            "description" => 'required',
            "imageUrl" => 'required',
            "motherboard_id" => 'required|exists:motherboards,id',
            "processor_id" => 'required|exists:processors,id',
            "rammemory_id" => 'required|exists:rammemories,id',
            "ramMemoryAmount" => 'required',
            "graphiccard_id" => 'required|exists:graphiccards,id',
            "graphicCardAmount" => 'required',
            "powersupply_id" => 'required|exists:powersupplies,id',
            "storagedevices" => 'required',
            'storagedevices.*.storagedevice_id' => 'required|exists:storagedevices,id',
            'storagedevices.*.amount' => 'required|numeric|min:0',
        ];

    }

    protected function failedValidation(Validator $validator)
    {

            $response = response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 400 );

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }



}
