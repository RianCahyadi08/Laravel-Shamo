<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function getProductCategory(Request $request)
    {
        $limit = $request->query('limit') ? $request->query('limit') : 10; 

        $dataProductCategory = ProductCategory::paginate($limit);

        return response()->json([
            'message' => 'Successfully get data',
            'data' => $dataProductCategory
        ]);
    }

}
