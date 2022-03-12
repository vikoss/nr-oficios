<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class NotificationRequest extends FormRequest
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
            'document'  => 'required',
            'name'      => 'required'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    /* protected function prepareForValidation()
    {
        $path = Storage::put('notifications', base64_decode($this->document));

        $this->merge([
            'document'  => Storage::url($path),
            'name'      => strtolower($this->name)
        ]);
    } */
}
