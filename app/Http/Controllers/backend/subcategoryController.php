<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use PDO;

class subcategoryController extends Controller
{
    public function add_sub_category(){

        $data = subcategory::with('category')->get();
        $category = Category::get();

        return view('backend.category.add_sub_category',compact('data','category'));
    }

    public function store_sub_category(Request $request){

           $request->validate([
                'title' => 'required|max:20|string',
                'cat_id' => 'required',
           ],[
            'title.required' => 'please enter sub title',
           ]);


           $data = new subcategory();
       
           $data->category_id = $request->cat_id;
           $data->title = $request->title;
           $data->slug = $this->slugenarate($request->title, $request->slug);
           $data->save();

           return back();
    }

    public function edit_sub_category(subcategory $categories){

    
        $categories = $categories;
        $data = subcategory::with('category')->get();
        $category = Category::get();
        return view('backend.category.add_sub_category', compact('categories','data','category'));
    }

    public function update_sub_category(Request $request, subcategory $categories){

        $request->validate([
            'title' => 'required|max:20|string',
            'cat_id' => 'required',
       ],[
        'title.required' => 'please enter sub title',
       ]);

        $categories->category_id = $request->cat_id;
        $categories->title = $request->title;
        $categories->slug = $this->slugenarate($request->title, $request->slug);
        $categories->save();

        return redirect()->route('category.sub.add');

    }


    public function delete_sub_category(subcategory $categories){

            $categories->delete();
            
            return redirect()->route('category.sub.add');
    }




    private function slugenarate($title, $slug = null){

            if($slug==null){

                $newslug = str()->slug($title);
            }else{

                $newslug = str()->slug($slug);
            }

            $count = subcategory::where('slug','LIKE', '%'. $newslug . '%')->count();

            if($count > 0){

                $slug = $newslug. '-' . $count++;
                return $slug;
            }else{
                return $newslug;
            }

           
    }
}
