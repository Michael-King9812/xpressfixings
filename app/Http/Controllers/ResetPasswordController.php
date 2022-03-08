<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo() {
        if (Auth()->user()->category == 'customer') {
            return route('/customer/dashboards');
        } elseif (Auth()->user()->category == 'admin') {
            return route('/admins/dashboard');
        } elseif (Auth()->engineer()) {
            return route('/engineer/dashboard');
        }
    }
}
