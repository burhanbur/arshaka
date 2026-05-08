<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Http\Requests\Contact\StoreMessageRequest;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        try {
            Message::create($request->validated());

            Session::flash('notification', [
                'level'   => 'success',
                'message' => 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.',
            ]);

            return redirect()->route('web.contact');
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            Session::flash('notification', [
                'level'   => 'error',
                'message' => 'Terjadi kesalahan. Silakan coba kembali.',
            ]);

            return redirect()->back()->withInput();
        }
    }
}
