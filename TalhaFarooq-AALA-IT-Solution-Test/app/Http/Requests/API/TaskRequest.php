<?php

namespace App\Http\Requests\API;

use App\Enums\TaskStatusEnum;
use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'description' => 'required',
            'status' => ['required|', Rule::in(TaskStatusEnum::getValues())]
        ];
    }
}
