<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Enums\OrderStatus;
use App\Models\CityVendor;
use Illuminate\Http\Request;
use App\Enums\VendorStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\customers_rates;

class DashboardController extends Controller
{
    public function index()
    {
        $number_of_orders=Order::count();

        $total_earning = Order::sum('price'); // Replace 'price' with the actual column name for earnings in your table.

        $number_of_clients = Customer::count(); // Replace 'price' with the actual column name for earnings in your table.
        $number_of_rates = customers_rates::count(); // Replace 'price' with the actual column name for earnings in your table.

        //
        return view('welcome',compact('number_of_orders','total_earning','number_of_clients','number_of_rates')  );
    }
 
}
