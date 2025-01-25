<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\TagResource;
use App\Models\NewsLetter;
use App\Models\Tag;
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

    public function getTags()
    {
        $tags = Tag::get();

        return $this->success('', TagResource::collection($tags));
    }

 
}