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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
