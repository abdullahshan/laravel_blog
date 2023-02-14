<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class frontendController extends Controller
{
    public function index(){

        $category = Category::with('categories')->latest()->get();

        $posts = post::latest()->take(5)->with('user')->get();
        $insprations = post::with('category')->with('user')->get();
    
        $latest_all = post::latest()->with('user')->with('category')->paginate(3);


        $postall = post:: paginate(3);
        $tags = Tag::all();

        // foreach($tags as $tag){

        //     print_r(json_decode($tag)->name);
        // }


        $first = post::latest()->with('category')->with('user')->first();
        $trending_all = post::where('type','=','trending')->latest()->paginate(5);
        $trending_all_old = post::where('type','=','trending')->oldest()->paginate(5);

       

        $Trending = post::where('type','=','trending')->with('category')->with('user')->oldest()->first();
        $Trending_old = post::where('type','=','trending')->with('category')->with('user')->latest()->first();
      
       $men_fashinon = post:: where('category_id', 'category_id')->get();


        return view('frontend.home',compact('category','posts','postall','first','tags','Trending','trending_all','trending_all_old','Trending_old','latest_all','insprations'));
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
