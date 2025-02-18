<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait ResponseTrait{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'statusCode' => 403,
            'errors' => $validator->errors(),
            'message' => 'Validation failed',
        ], 422));
    }

    public function sendResponse($result, $message, $statusCode)
    {
        $response = [
            'statusCode' => $statusCode,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, $statusCode);
    }

    public function sendError($error, $errorMessages = [], $statusCode = 404)
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $statusCode);
    }

    public function validateRequest($data, $rules)
    {
        return \Illuminate\Support\Facades\Validator::make($data, $rules);
    }
}