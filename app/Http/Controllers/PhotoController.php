<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $save = $request->file('image')->storePublicly();
        }

        return back();
    }

    public function index()
    {
        return inertia('Photo');
    }
}
