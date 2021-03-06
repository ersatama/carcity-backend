<?php

namespace App\Http\Requests\NotificationTenant;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class NotificationTenantViewUpdateRequest extends FormRequest
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
    #[ArrayShape([MainContract::USER_ID => "string", MainContract::IDS => "string"])] public function rules(): array
    {
        return [
            MainContract::USER_ID   =>  'required|exists:users,id',
            MainContract::IDS   =>  'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function check(): array
    {
        $data   =   $this->validator->validated();
        $data[MainContract::IDS]    =   array_unique($data[MainContract::IDS]);
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
