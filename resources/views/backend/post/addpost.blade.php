@extends('layouts.backendapp')

@section('content')

<div class="card">
    <div class="card-header"><h2 style="font-size: 30px;">Add Post</h2></div>
    <div class="card-body">
        <form action="">

           <div class="row" style="margin: 10px 0px;">
            <label for="">Post title
                <input type="text" name="title" placeholder="post title" class="form-control">
            </label>

           </div>
           <div class="row" style="margin: 10px 0px;">
            <select name="" id="" class="form-control" style="width: 33.33%">
                <option disabled selected value="">Select Category</option>
                <option value="">option</option>
            </select>
            <select name="" id="" class="form-control" style="width: 33.33%">
                <option disabled selected value="">Select Subcategory</option>
                <option value="">Subcategory</option>

            </select>
            <select name="" id="" class="form-control" style="width: 33.33%">
                <option value="">trending</option>
                <option value="">hot topic</option>
            </select>
           </div>

           <div class="row" style="margin: 10px 0px;">
            <input type="file" name="image" class="form-control">
           </div>

            <div style="margin: 10px 0px;">
            <label> Write content</label>
           <textarea name="content" id="" cols="30" rows="10" class="form-control" style="height: 50px;">
           </textarea>
            </div>

           <div style="margin: 10px 0px;">
            <input type="text" placeholder="Hash tags" class="form-control">
           </div>
        </form>
    </div>
</div>

@endsection
