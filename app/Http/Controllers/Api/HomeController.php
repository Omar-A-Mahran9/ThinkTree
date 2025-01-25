<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\NewsLetter;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function newsLetter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:news_letters'],
        ]);

        NewsLetter::create([
            'email' => $request->email
        ]);

        return $this->success(__('Created Successfully'));
    }

 
}