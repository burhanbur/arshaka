<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\BaseFormRequest;

class UpdateCategoryRequest extends BaseFormRequest
{
    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:120', "unique:categories,slug,{$id}", 'regex:/^[a-z0-9\-]+$/'],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'Nama kategori wajib diisi.',
            'name.max'        => 'Nama kategori maksimal 100 karakter.',
            'slug.required'   => 'Slug wajib diisi.',
            'slug.unique'     => 'Slug sudah digunakan, gunakan slug lain.',
            'slug.regex'      => 'Slug hanya boleh mengandung huruf kecil, angka, dan tanda hubung.',
            'description.max' => 'Deskripsi maksimal 500 karakter.',
        ];
    }
}
