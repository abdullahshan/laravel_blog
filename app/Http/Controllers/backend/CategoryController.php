<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class CategoryController extends Controller
{
    public function addcategory(){

        $data = Category:: with('categories')->latest()->get();

        // dd($data);

        return view('backend.category.add_category', compact('data'));
    }

    public function storecategory(Request $request){
           
            $request->validate([

                'title' => 'required|max:225|string',
            ], [
                
                'title.required' => 'please enter your category title',
            ]
            );

        $data = new Category();

        $data->title = $request->title;
        $data->slug  = $this->genarateslug($request->title, $request->slug);

        $data->save();

        return back();

    }

  
    public function editcategory(category $category){

            $data = category::all();

            $category = $category;

           return view('backend.category.add_category',compact('data','category'));
    }



public function updatecategory(Request $request, Category $category){


        $request->validate([

            'title' => 'required|max:225|string',
        ], [
            
            'title.required' => 'please enter your category title',
        ]
        );

    $category->title = $request->title;
    $category->slug  = $this->genarateslug($request->title, $request->slug);
    $category->save();


    return redirect()->route('category.add')->with("success","update successfully done!");
    }

    public function deletecategory(Category $category){

       $category->delete();

        return redirect()->route('category.add');
    }

    

    private function genarateslug($title, $slug = null){

        if($slug == null){

            $slug = str()->slug($title);
           
        }else{
            $slug = str()->slug($slug);
        }

        $count = Category::where('slug', 'LIKE', '%' .  $slug . '%')->count();

        if($count > 0){

            $unique_slug = $slug . '-' . $count++;
            return $unique_slug;
        }else{
            return $slug;
        }

       

       
    }

}
