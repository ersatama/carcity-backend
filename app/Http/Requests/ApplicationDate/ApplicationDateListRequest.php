<?php

namespace App\Http\Requests\ApplicationDate;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ApplicationDateListRequest extends FormRequest
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
    public function rules():array
    {
        return [
            MainContract::PAGINATION    =>  'nullable',
            MainContract::TAKE  =>  'nullable',
            MainContract::UPLOAD_STATUS_ID  =>  'nullable',
            MainContract::CREATED_AT    =>  'nullable',
            MainContract::COMPANY   =>  'nullable',
            MainContract::NUMBER    =>  'nullable'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function check(): array
    {
        $data   =   $this->validator->validated();
        if (!array_key_exists(MainContract::PAGINATION,$data)) {
            $data[MainContract::PAGINATION] =   1;
        }
        if (!array_key_exists(MainContract::TAKE,$data)) {
            $data[MainContract::TAKE]   =   30;
        }
        $data[MainContract::DATA]   =   [
            [MainContract::STATUS,1]
        ];
        if (array_key_exists(MainContract::UPLOAD_STATUS_ID,$data)) {
            $data[MainContract::DATA][] =   [MainContract::UPLOAD_STATUS_ID,$data[MainContract::UPLOAD_STATUS_ID]];
        }
        if (array_key_exists(MainContract::CREATED_AT,$data)) {
            $date   =   explode('_',$data[MainContract::CREATED_AT]);
            $data[MainContract::CREATED_AT] =   [date('Y-m-d',strtotime($date[0])).' 00:00:00',date('Y-m-d',strtotime($date[1])).' 23:59:59'];
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
