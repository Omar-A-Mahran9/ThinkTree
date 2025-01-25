<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
 

    
            return $this->success('', [
                 
                'Test_link' => setting('available_test') == 1 ? setting('test_link') : null,

        ]);
    }
}
