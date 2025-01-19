<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AdResource;
use App\Http\Resources\Api\BlogResource;
use App\Http\Resources\Api\BrandResource;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\GallariesResource;
use App\Http\Resources\Api\OfferResource;
use App\Http\Resources\Api\PartenersResource;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\QuestionResource;
use App\Http\Resources\Api\SliderResource;
use App\Http\Resources\Api\SubcategoryResource;
use App\Http\Resources\Api\TagResource;
use App\Models\Ad;
use App\Models\award;
use App\Models\blogs;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CommonQuestion;
use App\Models\Gallary;
use App\Models\NewsLetter;
use App\Models\Offer;
use App\Models\partener;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
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

 
}