<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
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

        $dataProduct = Product::select('id', 'name', 'price', 'description', 'tags', 'product_categories_id')->with('productCategory', 'productGalleries')
            ->paginate($limit);

        return response()->json([
            'message' => 'Successfully get data',
            'data' => $dataProduct
        ]);
    }

    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $categories = $request->input('categories');
        $priceFrom = $request->input('price_from');
        $priceTo = $request->input('price_to');

        if ($id) {
            $product = Product::with(['productCategory', 'productGalleries'])->find($id);

            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Successfully get product'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data product not found'
                );
            }
        }

        $product = Product::with(['productCategory', 'productGalleries']);

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        if ($description) {
            $product->where('description', 'like', '%' . $description . '%');
        }

        if ($tags) {
            $product->where('tags', 'like', '%' . $tags . '%');
        }

        if ($priceFrom) {
            $product->where('price', '>=', $priceFrom);
        }

        if ($priceTo) {
            $product->where('price', '>=', $priceTo);
        }

        if ($categories) {
            $product->where('product_categories_id', $categories);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Successfully get product'
        );
    }
}
