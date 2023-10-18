<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactu;

class ContactController extends Controller
{
    public function addContactPost(Request $request) {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'الرجاء التسجيل الدخول للإرسال');
        }

        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $contact = new Contactu();

        $contact->title = $request->input('title');
        $contact->description = $request->input('description');
        $contact->user_id = auth()->user()->id;

        // Save the data to the database
        $contact->save();

        return redirect(route('contact'))->with('success', 'تم الإرسال بنجاح');
    }
}
