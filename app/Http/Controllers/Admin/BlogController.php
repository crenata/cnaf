<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

use App\Helpers\Helper;

use App\Models\Admin\Blog;

use Session;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.pages.blog.index')->withBlogs($blogs);
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
        $rules =
            [
                'name' => 'required',
                'image' => 'required|image',
                'body' => 'required'
            ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $blog = new Blog;

            $blog->name = $request->name;
            $blog->slug = str_slug($request->name, '-');
            $blog->body = $request->body;

            if ($request->hasFile('image')) {
                $blog->image = Helper::interventionUploadImage($request->file('image'), null, 'blogs');
            }

            $blog->save();

            return response()->json($blog);
        }
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
        $rules =
            [
                'name' => 'required'
            ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $blog = Blog::findOrFail($id);

            $blog->name = $request->name;
            $blog->slug = str_slug($request->name, '-');
            $blog->body = $request->body;

            if ($request->hasFile('image')) {
                $image_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $blog->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $blog->image = Helper::interventionUploadImage($request->file('image'), null, 'blogs');
            }

            $blog->save();

            return response()->json($blog);
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
        $blog = Blog::findOrFail($id);

        $image_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $blog->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $blog->delete();
        return response()->json($blog);
    }
}
