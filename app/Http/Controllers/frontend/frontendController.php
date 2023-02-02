<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){

        $category = Category::with('categories')->latest()->get();

        return view('frontend.home',compact('category'));
    }


    public function frontend_post(category $category){

        $data = $category;
        $post = post::where('category_id', $data->id)->with('user')->latest()->get();

        // dd($post);

        $category = Category::with('categories')->latest()->get();

        return view('frontend.category_view',compact('category','data','post'));
    }


    public function frontend_sub_post(subcategory $categories){

        $data = $categories;
        
        $post = post::where('subcategory_id', $data->id)->with('user')->latest()->get();

        // dd($post);

        $category = Category::with('categories')->latest()->get();

        return view('frontend.category_view',compact('category','data','post'));

    }
}
