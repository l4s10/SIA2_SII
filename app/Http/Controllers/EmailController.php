<?php

namespace App\Http\Controllers;

use App\Mail\ExampleEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        Mail::to('franciscomunoz142@gmail.com')->send(new ExampleEmail());

        return back()->with('success', 'Correo enviado con éxito!');
    }
}
