@extends('layouts.backendapp')

@section('content')

<div class="card">
    <div class="card-header"><h2 style="font-size: 30px;">Add Post</h2></div>
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

           <div class="row" style="margin: 10px 0px;">
            <label for="">Post title
                <input required type="text" name="title" placeholder="post title" class="form-control">
            </label>

           </div>
           <div class="row" style="margin: 10px 0px;">
            <select required name="category_id" id="" class="form-control" style="width: 33.33%">
                <option disabled selected value="">Select Category</option>
                @foreach ($categries as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <select required name="subcategory_id" id="" class="form-control" style="width: 33.33%">
                <option disabled selected value="">Select Subcategory</option>
                @foreach ($sub_categories as $sub_category)
                <option value="{{ $sub_category->id }}">{{ $sub_category->title }}</option>
                @endforeach


            </select>
            <select required name="type" id="" class="form-control" style="width: 33.33%">
                <option value="trending">trending</option>
                <option value="hot">hot</option>
            </select>
           </div>

           <div class="row" style="margin: 10px 0px;">
            <input type="file" name="image" class="form-control">
           </div>

            <div style="margin: 10px 0px;">
           <textarea name="content" id="editor" cols="30" rows="10" class="form-control" style="height: 50px;">
           </textarea>
            </div>

           <div style="margin: 10px 0px;">
            <input name="hastag" type="text" placeholder="Hash tags" class="form-control">
           </div>
           <button class="btn btn-primary">submit</button>
        </form>
    </div>
</div>

@endsection



@push('customjs')

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
    
@endpush
