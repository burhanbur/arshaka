<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\BaseFormRequest;

class UpdatePostRequest extends BaseFormRequest
{
    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'category_id'  => ['nullable', 'string', 'exists:categories,id'],
            'title'        => ['required', 'string', 'max:255'],
            'slug'         => ['required', 'string', 'max:255', "unique:posts,slug,{$id}", 'regex:/^[a-z0-9\-]+$/'],
            'thumbnail'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'content'      => ['required', 'string'],
            'status'       => ['required', 'integer', 'in:0,1'],
            'published_at' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'Judul artikel wajib diisi.',
            'title.max'             => 'Judul artikel maksimal 255 karakter.',
            'slug.required'         => 'Slug wajib diisi.',
            'slug.unique'           => 'Slug sudah digunakan, gunakan slug lain.',
            'slug.regex'            => 'Slug hanya boleh mengandung huruf kecil, angka, dan tanda hubung.',
            'content.required'      => 'Konten artikel wajib diisi.',
            'status.required'       => 'Status artikel wajib dipilih.',
            'status.in'             => 'Status artikel tidak valid.',
            'thumbnail.image'       => 'Thumbnail harus berupa file gambar.',
            'thumbnail.mimes'       => 'Thumbnail harus berformat jpg, jpeg, png, atau webp.',
            'thumbnail.max'         => 'Ukuran thumbnail maksimal 2 MB.',
            'category_id.exists'    => 'Kategori yang dipilih tidak ditemukan.',
        ];
    }
}
