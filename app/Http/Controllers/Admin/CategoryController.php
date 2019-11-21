<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth:admin');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::orderBy('id','desc')->paginate(5);
      return view('admin.pages.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
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
          'slug' => 'required|unique:categories',
          'banner_image' => 'image|nullable|max:500',
          'meta_image' => 'image|nullable|max:300',
      ]);

      if ($request->hasFile('banner_image')) {
        $file = $request->file('banner_image');
        $path = $path = 'public/media/catalog/category/cover';
        $coverImagetoStore = $this->imageUpload($file, $path);
      }else {
        $coverImagetoStore = 'noImage.png';
      }

      if ($request->hasFile('meta_image')) {
        $file = $request->file('meta_image');
        $path = $path = 'public/media/catalog/category/meta';
        $coverImagetoStore = $this->imageUpload($file, $path);
      }else {
        $metaImagetoStore = 'noImage.png';
      }

      $category = new Category;
      $category->enable                 = $request->enable;
      $category->name                   = $request->name;
      $category->slug                   = $request->slug;
      $category->show_short_description = $request->show_short_description;
      $category->short_description      = $request->short_description;
      $category->show_description       = $request->show_description;
      $category->description            = $request->description;
      $category->full_width_banner      = $request->full_width_banner;
      $category->meta_title             = $request->meta_title;
      $category->meta_keyword           = $request->meta_keyword;
      $category->meta_description       = $request->meta_description;
      $category->banner_image           = $coverImagetoStore;
      $category->meta_image             = $metaImagetoStore;
      $category->save();
      return redirect('/admin/category')->with('success','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.update')->with('category', $category);
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
        //
    }

    private function imageUpload($file, $path){
      $getFileNameWithExtension = $file->getClientOriginalName();
      $fileName = pathinfo($getFileNameWithExtension,PATHINFO_FILENAME);
      $getFileExtension = $file->getClientOriginalExtension();
      $coverImagetoStore = $fileName.'_'.time().'.'.$getFileExtension;
      $path = $file->storeAs($path,$coverImagetoStore);
      return $coverImagetoStore;
    }
}
