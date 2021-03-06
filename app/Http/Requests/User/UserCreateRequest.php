<?php

namespace App\Http\Requests\User;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class UserCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            MainContract::NAME  =>  'required',
            MainContract::SURNAME   =>  'required',
            MainContract::LAST_NAME =>  'required',
            MainContract::BIRTHDATE =>  'required',
            MainContract::HIDE_BIRTHDATE    =>  'required|date',
            MainContract::ROLE_ID   =>  'nullable',
            MainContract::COMPANY   =>  'nullable',
            MainContract::BIN   =>  'nullable',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function check(): array
    {
        return $this->validator->validated();
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => 'failure',
            'status_code' => 400,
            'message' => 'Bad Request',
            'errors' => $validator->errors(),
        ];
        throw new HttpResponseException(response()->json($response, 400));
    }
}
