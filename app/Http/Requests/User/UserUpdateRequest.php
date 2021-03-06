<?php

namespace App\Http\Requests\User;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            MainContract::NAME  =>  'required',
            MainContract::SURNAME   =>  'required',
            MainContract::LAST_NAME =>  'nullable',
            MainContract::COMPANY   =>  'nullable',
            MainContract::BIN   =>  'nullable',
            MainContract::PASSWORD  =>  'nullable',
            MainContract::SPARE_PART_ID => 'nullable',
            MainContract::BRAND_ID => 'nullable',
            MainContract::SERVICE_ID => 'nullable'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function check(): array
    {
        $data   =   $this->validator->validated();
        if (array_key_exists(MainContract::PASSWORD,$data)) {
            $data[MainContract::PASSWORD]   =   Hash::make($data[MainContract::PASSWORD]);
        }
        return $data;
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
