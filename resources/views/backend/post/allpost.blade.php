@extends('layouts.backendapp')

@section('content')


    <table class="table table-responsive">
        <div class="thead">
           <tr>
            <th>SL</th>
            <th>Image</th>
             <th>Title</th>
            <th>Category</th>
            <th>Sub_category</th>
            <th>Actions</th>
           </tr>
        </div>
            <div class="tbody">
                
                    @forelse ($posts as $key=> $post)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img style="max-height: 100px" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ $post->subcategory->title }}</td>
                        <td style="display: flex"><a class="btn btn-primary" href="{{ route('post.edit', $post) }}">edit</a>
                    

                            <a class="btn btn-danger deletebtn" href="#">delete</a>


                            <form action="{{ route('post.delete', $post) }}" method="post" id="myForm">
                            @csrf
                            @method('delete')
                           
                            </form>
                                </td>
                    </tr>
                    @empty
                        <div>
                            <span class="text-danger">Data not found!</span>
                        </div>
                    @endforelse
               
            </div>
    </table>

    @push('customjs')

        <script>

           $('.deletebtn').click(function(){
                
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   
    $(this).next('form').submit();

  }
})
           })

        </script>
        
    @endpush

@endsection