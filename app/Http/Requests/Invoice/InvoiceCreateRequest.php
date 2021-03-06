<?php

namespace App\Http\Requests\Invoice;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class InvoiceCreateRequest extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            MainContract::RID   =>  'required|int',
            MainContract::DATA  =>  'required',
        ];
    }

    public function messages(): array
    {
        return [
            MainContract::RID.'.required'   =>  'Нет переменнрй rid',
            MainContract::DATA.'.required'  =>  'Нет переменной data'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function check(): array
    {
        $data   =   $this->validator->validated();
        if (array_key_exists(MainContract::DATA,$data)) {
            $converted  =   json_decode($data[MainContract::DATA],true);
            $arr    =   [];
            if ($converted) {
                $data[MainContract::DATA]   =   $converted[MainContract::DATA];
                foreach ($data[MainContract::DATA] as &$invoiceData) {
                    $invoiceData[MainContract::RID] =   $data[MainContract::RID];
                    $arr[] =   $invoiceData;
                }
            }
            $data[MainContract::DATA]   =   $arr;
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
