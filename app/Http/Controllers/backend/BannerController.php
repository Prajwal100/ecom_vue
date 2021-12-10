<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Banner::latest()->get());
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
            $upload_path='backend/upload/banner/';
            $image_url=$upload_path.$name;
            $img->save($image_url);
        }
        $data=$request->all();
        $data['image']=$image_url;
        Banner::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner=Banner::find($id);
        return response()->json($banner);
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
        $banner=Banner::find($id);
        $request->validate([
            'image'=>'required',
            'status'=>'required|in:active,inactive',
        ]);

        $data['title']=$request->title;
        $data['status']=$request->status;
        $image=$request->new_image;
        if($image){
            $position=strpos($image,';');
            $sub=substr($image,'0',$position);
            $ext=explode('/',$sub)[1];

            $name=time().'.'.$ext;
            $img=Image::make($image)->resize(500,250);
            $upload_path='backend/upload/banner/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $data['image']=$image_url;
                $img=Banner::where('id',$id)->first();
                $image_path=$img->image;
                unlink($image_path);
                $banner->update($data);
            }
        }
        else{
            $oldphoto=$request->image;
            $data['image']=$oldphoto;
            $banner->update($data);
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
        $banner=Banner::findOrFail($id);
        $image=$banner->image;
        if($image){
            unlink($image);
            $banner->delete();
        }
        else{
            $banner->delete();
        }
    }
}
