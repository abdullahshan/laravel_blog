<?php

namespace App\Http\Controllers\backend;

use App\Models\post;
use Spatie\Tags\Tag;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function addpost(){

        $categries = Category:: latest()->get();
        $sub_categories = subcategory:: latest()->get();

        return view('backend.post.addpost',compact('categries','sub_categories'));
    }


    public function storepost(Request $request){

        // $tag = Tag::create(['name' => 'my tag']);

    

      $user_id = auth()->user()['id'];

      $data = new post();

      $data->user_id = $user_id;
      $data->category_id = $request->category_id;
      $data->subcategory_id = $request->subcategory_id;
      $data->title = $request->title;
      $data->slug = $this->getslug($request->title);
      $data->type = "type";
      if($request->hasFile('image')){
      
            $data->image = $this->project_image($request);

     }
      $data->content = $request->content;

      $data->save();

      $tag = str($request->hastag)->explode(',');

      foreach ($tag as $tags){

        $mytag = Tag::findOrCreate(['name' => trim($tags)]);
        $data->attachTag($mytag);

      }

      return back();

        
    }

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
    


    private function project_image($request){

        if($request->hasFile('image')){
            $project_image = $request->file('image')->extension();
    
            $filename = $this->getslug($request->title) . '.' . $project_image;
    
         $image =   $request->image->storeAs('upload/',$filename, 'public');
    
                return $image;
         }
    }

}
