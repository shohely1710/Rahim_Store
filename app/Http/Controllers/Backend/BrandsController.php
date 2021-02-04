<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use File;
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.pages.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',

        ],
            [
                'name.required' => 'Please provide a brand name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension..',
            ]

        );

        $brand= new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        //insert images also
        if(($request->image) > 0){
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('images/brands/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();

        session()->flash('success', 'A new brand has added successfully!');
        return redirect()->route('admin.brands');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',

        ],
            [
                'name.required' => 'Please provide a brand name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension..',
            ]

        );

        $brand= Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;

        //insert images also

        if(($request->image) > 0){

            //Delete the old image from folder
            if(File::exists('images/brands/' .$brand->image)) {
                File::delete('images/brands/' .$brand->image);
            }
            //code...
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('images/brands/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();

        session()->flash('success', 'A new brand has updated successfully!');
        return redirect()->route('admin.brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand= Brand::find($id);
        if(!is_null($brand)){
            return view('backend.pages.brands.edit', compact('brand'));
        }
        else{
            return redirect()->route('admin.brands');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if(!is_null($brand)){

            if(File::exists('images/brands/' .$brand->image)){
                File::delete('images/brands/' .$brand->image);
            }
            $brand->delete();

            }
        session()->flash('success', 'Brand has deleted successfully !!');
        return back();
    }
}
