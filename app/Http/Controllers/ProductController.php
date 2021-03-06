<?php

namespace Marketplace\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Marketplace\Category;
use Marketplace\Http\Controllers\Controller;
use Marketplace\Http\Requests;
use Marketplace\Photo;
use Marketplace\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['photos', 'category'])->where('quantity', '>', 0)->paginate(5);

        return view ('products.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_products()
    {
        $user = Auth::user();

        $products = Product::where('user_id', $user->id)->with(['photos', 'category'])->paginate(5);

        return view ('products.index-user', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bycategory($category)
    {
        $user = Auth::user();

        // $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        //         ->where('categories.name', 'like', '%'.$category.'%')
        //         ->where('products.quantity', '>', 0)
        //         ->join('photos', 'products.id', '=', 'photos.product_id')
        //         ->select(['products.*'])
        //         ->paginate(5);

        $cat = Category::where('name', 'like', '%'.$category.'%')->first();
        $products = Product::where('category_id', $cat->id)->where('quantity', '>', 0)->paginate(5);

        return view ('products.bycategory', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $product = Product::create($inputs);
        $file = $request->file('photo');
        if(isset($file)){
            $photo = Photo::create([
                'product_id' => $product->id,
                'path' => ''
            ]);
            $photo->path = $photo->uploadImage($file, 'products/');
            $photo->save();
        }
        else{
            $photo = Photo::create([
                'product_id' => $product->id,
                'path' => 'products/phpysCnPx.png'
            ]);
        }

        return redirect()->route('products.index', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $photos = $product->photos;

        return view ('products.show')->with(compact('product', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all());

        $product->save();

        return redirect()->route('products.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!\Request::ajax()) {
            abort(403);
        }
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.user');
    }

    public function addPhoto(Request $request, $productId)
    {
        $file = $request->file('file');

        $photo = Photo::create([
            'product_id' => $productId,
            'path' => ''
        ]);
        $photo->path = $photo->uploadImage($file, 'products/');
        $photo->save();
    }
}
