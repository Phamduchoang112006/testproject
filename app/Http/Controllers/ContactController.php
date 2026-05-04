<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getList() {
        $contacts = Contact::orderBy('id', 'DESC')->get();
        return view('admin.contact.list', compact('contacts'));
    }

    public function postReply(Request $request, $id) {
        $contact = Contact::find($id);
        if ($contact) {
            $reply = $request->reply_message;
            // Send email
            Mail::raw($reply, function($msg) use ($contact) {
                $msg->to($contact->email)->subject('Phản hồi từ cửa hàng');
            });
            $contact->status = 'đã liên hệ';
            $contact->save();
            return redirect()->back()->with('thongbao', 'Đã gửi phản hồi thành công');
        }
        return redirect()->back()->with('loi', 'Không tìm thấy liên hệ');
    }
}
