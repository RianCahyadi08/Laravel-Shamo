<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;

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

    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');
        $showProduct = $request->input('show_product');

        if ($id) {
            $category = ProductCategory::with(['products'])->find($id);

            if ($category) {
                return ResponseFormatter::success(
                    $category,
                    'Successfully get categories'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data categories not found'
                );
            }
        }

        $category = ProductCategory::with(['products']);

        if ($id) {
            $category->where('id', $id);
        }

        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }

        if ($showProduct) {
            // $category->with('products')->where('name', 'like', '%' . $name . '%');
            $category->with('products')->where('id', $showProduct);
        }

        return ResponseFormatter::success(
            $category->paginate($limit),
            'Successfully get categories'
        );
    }
}
