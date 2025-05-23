<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function sendConfirmationEmail(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            $user = $request->user();
            Mail::raw('Gracias por su compra en Compu-Commerce. ;)', function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Confirmación de compra');
            });
            return redirect('/')->with('success', 'Correo enviado exitosamente.');
        }
    }
}
