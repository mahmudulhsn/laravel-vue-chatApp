<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            "user_id" => ["required", "numeric"],
            "chat_room_id" => ["required", "numeric"],
            "message" => ["required", "string"],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            "user_id" => auth()->id(),
            "chat_room_id" => $this->roomID,
        ]);
    }
}
