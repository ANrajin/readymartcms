<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')->get();
        $tags = DB::table('tag')->get();
        return view("admin.pages.posts", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $temp_slug = preg_split("/[\s,-,\/]+/", $request->slug);
        $slug = implode("-", $temp_slug);

        //check if directory exist or not
        if (!Storage::exists("public/posts")) {
            Storage::makeDirectory("public/posts");
        }

        $img = $request->file('image');
        $thumbnail = rand(99, 1000) . '.' . $img->getClientOriginalExtension();

        if ($request->featured) {
            $featured = $request->featured;
        } else {
            $featured = "no";
        }

        $data = [
            'title' => $request->title,
            'slug'  => $slug,
            'thumbnail' => $thumbnail,
            'apearence' => $request->appreance,
            'type'  => $request->type,
            'status' => $request->status,
            'featured' => $featured,
            'details' => $request->details,
            'video_link' => $request->link,
            'post_date' => date("Y-m-d")
        ];

        $post = Posts::create($data);

        //store image into storage directory
        Storage::putFileAs('public/posts', $img, $thumbnail);

        if ($request->has('categories') && $post->id) {
            $categories = $request->categories;

            foreach ($categories as $category) {
                $data = [
                    'post_id' => $post->id,
                    'category_id'    => $category
                ];

                DB::table('post_categories')->insert($data);
            }
        }

        if ($request->has('tags') && $post->id) {
            $tags = $request->tags;

            foreach ($tags as $tag) {
                $data = [
                    'post_id' => $post->id,
                    'tag_id'    => $tag
                ];

                DB::table('post_tag')->insert($data);
            }
        }

        $notification = [
            'message' => "Data successfully added",
            'alert-type' => "success"
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the all resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Posts::all();
        return view("admin.pages.posts-list", compact("posts"));
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
        if (!empty($request->status)) {
            $data = [
                'status' => $request->status
            ];

            Posts::where('id', $id)->update($data);
            echo "success";
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
        //
    }
}
