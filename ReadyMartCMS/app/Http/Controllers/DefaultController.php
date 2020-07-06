<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function index()
    {
        $date = date("Y-m-d");
        $featuredOne = DB::table('posts')
            ->where('status', 'publish')
            ->where('apearence', 'one')
            ->where('featured', 'yes')
            ->where('post_date', $date)
            ->latest()
            ->first();
        $featuredTwo = DB::table('posts')
            ->where('status', 'publish')
            ->where('apearence', 'two')
            ->where('featured', 'yes')
            ->where('post_date', $date)
            ->latest()
            ->first();
        $postsOne = DB::table('posts')
            ->where('status', 'publish')
            ->where('apearence', 'one')
            ->where('featured', 'no')
            ->where('post_date', $date)
            ->latest()
            ->limit(4)
            ->get();
        $postsTwo = DB::table('posts')
            ->where('status', 'publish')
            ->where('apearence', 'two')
            ->where('featured', 'no')
            ->where('post_date', $date)
            ->limit(4)
            ->get();
        return view('Frontend/index', compact("featuredOne", "postsOne", "featuredTwo", "postsTwo"));
    }


    public function showPost($slug)
    {
        $post = DB::table('posts')->where('slug', $slug)->first();
        $post_id = $post->id;
        $categories = DB::table('post_categories')
            ->where('post_id', $post_id)
            ->join('category', 'post_categories.category_id', '=', 'category.id')
            ->get();
        $tags = DB::table('post_tag')
            ->where('post_id', $post_id)
            ->join('tag', 'post_tag.tag_id', '=', 'tag.id')
            ->get();
        return view("Frontend.pages.posts", compact("post", "categories", "tags"));
    }
}
