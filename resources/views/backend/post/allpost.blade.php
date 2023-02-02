@extends('layouts.backendapp')

@section('content')


    <table class="table table-responsive">
        <div class="thead">
           <tr>
            <th>SL</th>
            <th>Image</th>
            <th>Title</th>
            <th>Actions</th>
           </tr>
        </div>
            <div class="tbody">
                
                    @forelse ($posts as $key=> $post)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img style="max-height: 120px" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"></td>
                        <td>{{ $post->title }}</td>
                        <td style="display: flex"><a class="btn btn-primary" href="">edit</a>
                        <a class="btn btn-danger" href="">delete</a></td>
                    </tr>
                    @empty
                        <div>
                            <span class="text-danger">Data not found!</span>
                        </div>
                    @endforelse
               
            </div>
    </table>


@endsection