<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('admin.index')->with('articles',$articles);
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
        if($request->hasFile("main_image")){
            $file=$request->file("main_image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $article =new Article([
                "title" =>$request->title,
                "author" =>$request->author,
                "description" =>$request->description,
                "image" =>$imageName,
            ]);
            $article->save();
        }

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['article_id']=$article->id;
                $request['image']=$imageName;
                $file->move(\public_path("/images"),$imageName);
                Image::create($request->all());

            }
        }

        return redirect("/admin/index");
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
        $articles=Article::findOrFail($id);
        return view('admin.edit')->with('articles',$articles);
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
        $article=Article::findOrFail($id);
        if($request->hasFile("main_image")){
            if (File::exists("cover/".$article->image)) {
                File::delete("cover/".$article->image);
            }
            $file=$request->file("main_image");
            $article->image=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$article->image);
            $request['image']=$article->image;
        }

        $article->update([
            "title" =>$request->title,
            "author"=>$request->author,
            "description"=>$request->description,
            "image"=>$article->image,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["article_id"]=$id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }

        return redirect("/admin/index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Article::findOrFail($id);

        if (File::exists("cover/".$posts->cover)) {
            File::delete("cover/".$posts->cover);
        }
        $images=Image::where("article_id",$posts->id)->get();
        foreach($images as $image){
            if (File::exists("images/".$image->image)) {
                File::delete("images/".$image->image);
            }
        }
        $posts->delete();
        return back();
    }

    public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) {
            File::delete("images/".$images->image);
        }

        Image::find($id)->delete();
        return back();
    }

    public function deletecover($id){
        $cover=Article::findOrFail($id)->image;
        if (File::exists("cover/".$cover)) {
            File::delete("cover/".$cover);
        }
        return back();
    }
}
