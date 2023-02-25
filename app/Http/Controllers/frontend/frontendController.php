<?php

namespace App\Http\Controllers\frontend;

use App\Models\post;
use App\Models\User;
use Spatie\Tags\Tag;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\callback;

class frontendController extends Controller
{

    //Frontend Home Page//

        public function index(){

        $category = Category::with('categories')->latest()->get();
    
        $catdata = Category::with('categories')->get();

        $posts = post::latest()->take(5)->with('user')->get();
        $insprations = post::with('category')->with('user')->get();
    
        $latest_all = post::latest()->with('user')->with('category')->paginate(3);


        $postall = post:: paginate(3);

        $tags = Tag::all();

        // dd($tags);

        // foreach($tags as $tag){

        //     // dd($tag);
        // }


        $first = post::latest()->with('category')->with('user')->first();
        $trending_all = post::where('type','=','trending')->latest()->paginate(5);
        $trending_all_old = post::where('type','=','trending')->oldest()->paginate(5);

       

        $Trending = post::where('type','=','trending')->with('category')->with('user')->oldest()->first();
        $Trending_old = post::where('type','=','trending')->with('category')->with('user')->latest()->first();
      
       $men_fashinon = post:: where('category_id', 'category_id')->get();

        $user_role = $this->subsUser();

     


        return view('frontend.home',compact('user_role','catdata','category','posts','postall','first','tags','Trending','trending_all','trending_all_old','Trending_old','latest_all','insprations'));
    }



    //Frontend Categorory Post show//

        public function frontend_post(category $category){

        $data = $category;
        $post = post::where('category_id', $data->id)->with('user')->latest()->get();

        // dd($post);
        $posts = post::take(5)->paginate();
        $allpost = post::oldest()->with('user')->get();

        // dd($allpost->first()->user->name);

        // dd($post);
        $category = Category::with('categories')->with('posts')->latest()->get();

        // dd($category['1']->posts->first()->title);
        $catdata = Category::with('categories')->get();
        return view('frontend.category_view',compact('allpost','posts','catdata','category','data','post'));
    }

    

    //Frontend Sub_Category post view//

        public function frontend_sub_post(subcategory $categories){

        $data = $categories;
        $catdata = Category::with('categories')->get();
        $posts = post::take(5)->paginate();
        $post = post::where('subcategory_id', $data->id)->with('user')->latest()->get();

        // dd($post);

        $category = Category::with('categories')->latest()->get();

        return view('frontend.category_view',compact('posts','catdata','category','data','post'));

    }





    // single_block_post show//

        public function single_post($slug){

     
        $postdata = post:: where('slug', $slug)->with('category')->with('user')->with('tags')->first();
        $catdata = Category::with('categories')->get();
        // dd($postdata);

        $category = Category::with('categories')->latest()->get();

      

        return view('frontend.singleblock',compact('category','postdata'));
    }




    //frontend postdata search with JQUERY //

        public function search(Request $request){

         $post = post::where('title', 'LIKE', '%'. $request->search_text .'%')->get();

         if($post->count() == 0){

            return response('Post not found!',404);

            exit;
         }

         return json_encode($post);
         
    }


    //Contact user//

        public function contact(){

        return view('frontend.contact');
    }



    // Role Subs User get//

    private function subsUser(){

        if(Auth::user()){
            $email = Auth::user()->email;

              $user_info = User::where('email',$email)->with('roles')->get();

              $user_role = $user_info->first()->roles['0']->name;

         return $user_role;

       
      }
    }

}



  