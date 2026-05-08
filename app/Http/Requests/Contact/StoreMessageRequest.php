<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\BaseFormRequest;

class StoreMessageRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:20'],
            'subject' => ['required', 'string', 'max:200'],
            'body'    => ['required', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'body.required'    => 'Isi pesan wajib diisi.',
            'body.max'         => 'Isi pesan maksimal 5000 karakter.',
        ];
    }
}
