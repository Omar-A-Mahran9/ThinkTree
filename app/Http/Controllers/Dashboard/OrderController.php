<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\HistoryOrder;
use App\Services\OTOService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecification;

class OrderController extends Controller
{


    public function index(Request $request)
    {
          $this->authorize('view_orders');

        if ($request->ajax()) {
              return response(getModelData(model: new Order(), relations: ['customer' => ['id', 'first_name','last_name','phone'],'package' => ['id', 'name_ar','name_en','description_en','description_ar','price','discount_price','have_discount']]));
         }

        return view("dashboard.orders.index");
    }

    public function show(Order $order)
    {
        $this->authorize('show_orders');
        $order->load([
            'customer',
            
        ]);
        return view("dashboard.orders.show", compact("order"));
    }

 
}
