<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreContact_usRequest;
use App\Models\Contact_us;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
 
    public function store(StoreContact_usRequest $request)
    {

        $contact_us = $request->validated();
        $contact_us_data = Contact_us::create($contact_us);
        return $this->success(__('Contact Us has been registered successfully'));

    }

 

}
