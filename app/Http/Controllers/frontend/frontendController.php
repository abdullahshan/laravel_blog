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

    // single_block_post//

    public function single_post($slug){

     
        $postdata = post:: where('slug', $slug)->with('category')->with('user')->with('tags')->first();

        // dd($postdata);

        $category = Category::with('categories')->latest()->get();

      

        return view('frontend.singleblock',compact('category','postdata'));
    }

    //postdata search//

    public function search(Request $request){

         $post = post::where('title', 'LIKE', '%'. $request->search_text .'%')->get();

         if($post->count() == 0){

            return response('Post not found!',404);

            exit;
         }

         return json_encode($post);
         
    }
}
