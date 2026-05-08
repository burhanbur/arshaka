<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Exception;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all'); // all | unread | read

        $messages = Message::when($filter === 'unread', fn($q) => $q->unread())
            ->when($filter === 'read', fn($q) => $q->where('is_read', true))
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadCount = Message::unread()->count();

        return view('pages.message.index', get_defined_vars());
    }

    public function show($id)
    {
        $data = Message::findOrFail($id);

        // Mark as read if not already read
        if (!$data->is_read) {
            try {
                $data->update([
                    'is_read' => true,
                    'read_at' => now(),
                ]);
            } catch (Exception $ex) {
                Log::error($ex->getMessage());
            }
        }

        return view('pages.message.show', get_defined_vars());
    }

    public function destroy($id)
    {
        try {
            $message = Message::findOrFail($id);
            $message->delete();

            Session::flash('notification', ['level' => 'success', 'message' => 'Pesan berhasil dihapus.']);
            return redirect()->route('message.index');
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menghapus pesan.']);
            return redirect()->back();
        }
    }
}

