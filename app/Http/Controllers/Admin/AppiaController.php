<?php

namespace App\Http\Controllers\Admin;

use App\Models\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppiaController extends Controller
{
    public function index()
    {
        return view('AppiaAntica', ['travels' => Travel::all()]);
    }


    public function show(Travel $travel)
    {
        return view('admin.show', compact('travel'));
    }
}
