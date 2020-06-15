<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Gate;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return User::all();
    }
        
}
