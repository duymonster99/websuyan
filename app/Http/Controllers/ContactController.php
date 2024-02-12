<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmContact;
use App\Models\Contact;
use App\Models\Notify;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show_contact()
    {
        if(session('accountLogin'))
        {
            $acc = session()->get('accountLogin');
        }

        if(isset($acc))
        {
            return view("user-page.contact.contact", compact('acc'));
        }
        else
        {
            return view("user-page.contact.contact");
        }
    }

    public function index()
    {
        $contact = Contact::all();
        return view('admin-page.contact.index', compact('contact'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'bail|required|email',
            'phone'=>'bail|required|numeric|digits:10',
            'question'=>'required',
        ],[
            'name.required'=>'Vui lòng nhập tên của bạn',
            'email.required'=>'Vui lòng nhập email của bạn',
            'email.email'=>'Vui lòng nhập đúng định dạng email',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là chuỗi các số nguyên từ 0-9',
            'phone.digits'=>'Số điện thoại phải có độ dài 10 ký tự',
            'question.required'=>'Vui lòng nhập câu hỏi của bạn',
        ]);

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'answer' => $request->input('question'),
        ]);

        if($acc = $contact)
        {
            Mail::to($acc['email'])->send(new ConfirmContact($acc));
        }

        $mess = $contact['name'] ." send you a message";
        $notify = new Notify();
        $notify->notify = $mess;
        $notify->save();

        Toastr::success('Gửi yêu cầu thành công');
        return redirect()->back();
    }
}
