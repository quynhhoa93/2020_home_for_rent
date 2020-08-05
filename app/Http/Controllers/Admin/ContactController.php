<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.pages.contacts.index', compact('contacts'));
    }

    public function singleContact($id)
    {
        $contact = Contact::find($id);
        return view('admin.pages.contacts.single_contact', compact('contact'));
    }

    public function deleteContact($id)
    {
        $category = Contact::find($id);
        $category->delete();
        toastr()->warning('đã xoá một yêu cầu của khách hàng');
        return redirect()->back();
    }
}
