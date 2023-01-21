@extends('layouts.backendapp')


@section('content')

    <div class="row">
        <div class="col-lg-4">
           
            @if (isset($category))


            <div class="card">
               
                <div class="card-header"><h2>edit Category</h2></div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" value="{{ $category->title }}" name="title" class="form-control mt-2">
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
                <div class="card-header"><h2>Add Category</h2></div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <input type="text"  name="title" class="form-control mt-2">
                        @error('title')
                           <span style="color:red;"> {{ $message }}</span>
                        @enderror
                        <input type="text"  name="slug" class="form-control mt-2 mb-2" >
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
                        <td>Slug</td>
                        <td>Actions</td>
                    </tr>
                   @forelse ($data as $key => $sdata)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $sdata->title }}</td>
                        <td>{{ $sdata->slug }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('category.edit', $sdata) }}" class="btn btn-primary btn-sm">edit</a>
                             
                             <form action="{{ route('category.delete', $sdata) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                
                            </div>
                        </td>
                    </tr>
                   
                      @forelse ($sdata->categories as $sub)
                    <tr>
                        <td>{{ "" }}</td>
                        <td>{{ $sub->title }}</td>
                        <td >{{ $sub->slug }}</td>
                       
                    </tr>
                      @empty
                      <td colspan="4" style="color:red; font-size:18px;">sub_category not found!</td>
                      @endforelse 
                   @empty
                       <tr>
                        <td colspan="4" style="color:red; font-size:30px;">Data not found!</td>
                       </tr>
                   @endforelse
            </table>
        </div>
    </div>

@endsection




