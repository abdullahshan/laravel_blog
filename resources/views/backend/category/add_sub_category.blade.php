@extends('layouts.backendapp')


@section('content')

    <div class="row">
        <div class="col-lg-4">
           
            @if (isset($categories))


            <div class="card">
               
                <div class="card-header"><h2>edit Sub_Category</h2></div>
                <div class="card-body">
                    <form action="{{ route('category.sub.update', $categories) }}" method="POST">
                        @csrf
                        @method('put')
                        <select name="cat_id">
                            <option selected disabled>Select Category</option>
                            @foreach ($category as $scategory)
                              <option value="{{ $scategory->id }}">{{ $scategory->title }}</option>
                          @endforeach
                          </select>
                          @error('cat_id')
                          <span style="color:red;"> {{ $message }}</span>
                       @enderror
                        <input type="text" value="{{ $categories->title }}" name="title" class="form-control mt-2">
                        @error('title')
                           <span style="color:red;"> {{ $message }}</span>
                        @enderror
                        <input type="text" value="" name="slug" class="form-control mt-2 mb-2" >
                        <button name="submit" class="btn btn-primary">add-category</button>
                    </form>
                </div>
            </div>

            @else

            <div class="card">
                <div class="card-header"><h1 style="font-size: 20px;">Add_Sub Category</h1></div>
                <div class="card-body">
                    <form action="{{ route('category.sub.store') }}" method="POST">
                        @csrf
                        <select name="cat_id">
                            <option selected disabled>Select Category</option>
                            @foreach ($category as $scategory)
                              <option value="{{ $scategory->id }}">{{ $scategory->title }}</option>
                          @endforeach
                          </select>
                          @error('cat_id')
                          <span style="color:red;"> {{ $message }}</span>
                       @enderror
                        <input type="text"  name="title" class="form-control mt-2" placeholder="sub_category title">
                        @error('title')
                           <span style="color:red;"> {{ $message }}</span>
                        @enderror
                        <input type="text"  name="slug" placeholder="slug" class="form-control mt-2 mb-2" >
                        <button name="submit" class="btn btn-primary">add-category</button>
                    </form>
                </div>
            </div>
            @endif

        </div>
    
        <div class="col-lg-8">
            <table class="table">
                    <tr>
                        <td>#</td>
                        <td>Category title</td>
                         <td>slug</td>
                        <td>parent</td>
                        <td>Actions</td>
                    </tr>
                    @forelse ($data as $key => $sdata)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $sdata->title }}</td>
                          <td>{{ $sdata->slug }}</td>
                        <td>{{ $sdata->category->title }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('category.sub.edit', $sdata) }}" class="btn btn-primary btn-sm">edit</a>
                             
                             <form action="{{ route('category.sub.delete', $sdata) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                
                            </div>
                        </td>
                    </tr>
                   
                       
                   @empty
                   <tr>
                    <td colspan="5" style="color:red; font-size:30px;">Data not found!</td>
                   </tr>
                   @endforelse
            </table>
        </div>
    </div>

@endsection




