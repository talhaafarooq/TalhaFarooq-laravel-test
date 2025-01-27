<?php

namespace App\Http\Requests\API;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    use ValidationTrait;
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required'
        ];
    }
}
