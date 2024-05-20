<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckAvailableRoomsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'checkIn' => 'required|date',
            'checkOut' => 'required|date|after:checkIn',
            'guestCount' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'checkIn.required' => 'Check-in date is required.',
            'checkIn.date' => 'Check-in date must be a valid date.',
        ];
    }
}
