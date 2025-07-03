<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCurrencyRequest;
use App\Http\Requests\Dashboard\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $count_currencies = Currency::count();

        $this->authorize('view_currency');

        if ($request->ajax())
            return response(getModelData(model: new Currency()));
        else
            return view('dashboard.currencies.index', compact('count_currencies'));
    }

    public function store(StoreCurrencyRequest $request)
    {
        $data = $request->validated();
        
        if($request->hasFile('image'))
        $data['image'] = uploadImageToDirectory($request->file('image'), "currency");

        Currency::create($data);

        return response(["currency created successfully"]);
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $data = $request->validated();

        if ($request->file('image'))
            $data['image'] = uploadImageToDirectory($request->file('image'), "currency");

        $currency->update($data);

        return response(["currency updated successfully"]);
    }

    public function destroy(Currency $currency)
    {
        $this->authorize('delete_currency');

        $currency->delete();

        return response(["currency deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_currency');

        Currency::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected currencies deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_currency');

        Currency::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["selected currencies restored successfully"]);
    }
}
