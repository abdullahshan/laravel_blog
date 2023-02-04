<?php

namespace App\Http\Controllers\backend;

use App\Models\post;
use Spatie\Tags\Tag;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDO;

class PostController extends Controller
{
    public function addpost(){

        $categries = Category:: latest()->get();
        $sub_categories = subcategory:: latest()->get();

        return view('backend.post.addpost',compact('categries','sub_categories'));
    }


    //post inser part//

    public function storepost(Request $request){

        // $tag = Tag::create(['name' => 'my tag']);

      $user_id = auth()->user()['id'];

      $data = new post();

      $data->user_id = $user_id;
      $data->category_id = $request->category_id;
      $data->subcategory_id = $request->subcategory_id;
      $data->title = $request->title;
      $data->slug = $this->getslug($request->title);
      $data->type = $request->type;
      $data->content = $request->content;
      if($request->hasFile('image')){
      
            $data->image = $this->project_image($request);

     }

      $data->save();

      $tag = str($request->hastag)->explode(',');

      foreach ($tag as $tags){

        $mytag = Tag::findOrCreate(['name' => trim($tags)]);
        $data->attachTag($mytag);

      }

      return back();

        
    }


    //Allpost with category and sub_category//

    public function allpost(){

        $posts = post::with('category')->with('subcategory')->get();

        // dd($posts);

        return view('backend.post.allpost',compact('posts'));
    }


    //post edite par//

    public function edit($slug){


        $single_post = post:: where('slug', $slug)->with('category')->with('subcategory')->first();

            $categries = Category::all();
            $sub_categories = subcategory::all();

            return view('backend.post.addpost', compact('categries','sub_categories','single_post'));
    }


    //post update part//

    public function update(post $category, Request $request){


        $user_id = auth()->user()['id'];
        // dd($category);
        $category->title = $request->title;
        $category->user_id = $user_id;
        $category->category_id = $request->category_id;
        $category->subcategory_id = $request->subcategory_id;
        $category->title = $request->title;
        $category->slug = $this->getslug($request->title);
        $category->type = $request->type;
        $category->content = $request->content;
        if($request->hasFile('image')){
        
              $category->image = $this->project_image($request);
  
       }
  
        $category->save();
  
      if($request->tag){

        $tag = str($request->hastag)->explode(',');
  
        foreach ($tag as $tags){
  
          $mytag = Tag::findOrCreate(['name' => trim($tags)]);
          $category->attachTag($mytag);
  
        }
      }

         return redirect(route('post.allpost'));
    }
    

    //post delete rotue//

    public function delete(post $category){

        $category->delete();

        return back();
      
    }
    


    
    //slug insert part//

    private function getslug($title, $slug = null){

        if($slug == null){

            $newslug = $title;

        }else{

            $newslug = $slug;
        }

        $count = post:: where('slug', 'LIKE' , '%' . $newslug . '%')->count();

       if($count > 0){

                $unicqslug = $newslug . $count++;    
                return $unicqslug;
       }else{

            return $newslug;
       }

      
}


    //post insert image part//

    private function project_image($request){

        if($request->hasFile('image')){
            $project_image = $request->file('image')->extension();
    
            $filename = $this->getslug($request->title) . '.' . $project_image;
    
         $image =   $request->image->storeAs('upload/',$filename, 'public');
    
                return $image;
         }
    }

}
