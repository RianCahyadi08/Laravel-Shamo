<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct(Request $request)
    {
        $limit = $request->query('limit') ? $request->query('limit') : 10; 

        $dataProduct = Product::select('id', 'name', 'price', 'description', 'tags', 'product_categories_id')->with('productCategory')
                                ->paginate($limit);

        return response()->json([
            'message' => 'Successfully get data',
            'data' => $dataProduct
        ]);
        
    }
}
