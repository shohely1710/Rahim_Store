<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
use Image;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = DB::table('products')->get();
//        $products= Product::all();
        $products = Product::orderBy('id', 'desc')->limit(4)->paginate(3);
        return view('frontend.pages.product.index', compact('products'))->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('frontend.product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',

        ]);
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->slug = SlugService::createSlug(Product::class, 'slug', $request->title);


//        $product->slug = str_slug($request->title);
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;
        $product->save();

        /*ProductImage Model insert image */

//        if($request->hasFile('product_image')){
//            //insert that image
//
//            $image = $request->file('product_image');
//            $img = time() . '.'. $image->getClientOriginalExtension();
//            $location = public_path('images/products/'  .$img);
//            Image::make($image)->save($location);
//
//            $product_image = new ProductImage;
//            $product_image->product_id = $product->id;
//            $product_image->image = $img;
//            $product_image->save();
//        }


        if (count($request->product_image) > 0) {
            foreach ($request->product_image as $image) {

                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/' . $img);
                Image::make($image)->save($location);

                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $product = Product::where('slug', $slug)->first();

        if(!is_null($product)){
            return  view('frontend.pages.product.show', compact('product'));
        }
        else{
            session()->flash('errors', 'Sorry !! There is no product by this URL..');
            return redirect()->route('product');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
