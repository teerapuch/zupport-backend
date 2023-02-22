<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        echo "login Endpoint Requested";
    }
    
    public function signup() {
        echo "signup Endpoint Requested";
    }
    
    public function index() {
        echo "Hello World";
    }

}
