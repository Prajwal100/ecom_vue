<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Category::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:20',
            'slug'=>'nullable|unique:categories,slug',
            'image'=>'required',
            'status'=>'required|in:active,inactive',
        ]);

        $image_url='';
        if($request->image){
            $position=strpos($request->image,';');
            $sub=substr($request->image,'0',$position);
            $ext=explode('/',$sub)[1];

            $name=time().".".$ext;
            $img=Image::make($request->image)->resize(500,250);
            $upload_path='backend/upload/category/';
            $image_url=$upload_path.$name;
            $img->save($image_url);
        }
        $data=$request->all();
        if($request->slug ==null){
            $data['slug']=Str::slug($request->title);
        }
        $data['image']=$image_url;
        Category::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        return response()->json($category);
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
        $category=Category::findOrFail($id);
        $request->validate([
            'title'=>'required|max:20',
            'slug'=>"nullable|unique:categories,slug,$id",
            'image'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data['title']=$request->title;
        $data['slug']=$request->slug;
        $data['status']=$request->status;
        $image=$request->new_image;
        if($image){
            $position=strpos($image,';');
            $sub=substr($image,'0',$position);
            $ext=explode('/',$sub)[1];

            $name=time().'.'.$ext;
            $img=Image::make($image)->resize(500,250);
            $upload_path='backend/upload/category/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $data['image']=$image_url;
                $img=Category::where('id',$id)->first();
                $image_path=$img->image;
                unlink($image_path);
                $category->update($data);
            }
        }
        else{
            $oldphoto=$request->image;
            $data['image']=$oldphoto;
            $category->update($data);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $image=$category->image;
        if($image){
            unlink($image);
            $category->delete();
        }
        else{
            $category->delete();
        }
    }
}
