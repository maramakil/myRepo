@extends('layout.app')
@section('content')
    <section>
        <div class="container" style="margin-top: 50px;">

            <h3 class="text-center text-danger"><b>Laravel CRUD With Multiple Image Upload</b> </h3>
            <a href="/admin/create" class="btn btn-outline-success">Add New Article</a>

            <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($articles as $article)
                 <tr>
                       <th scope="row">{{ $article->id }}</th>
                       <td>{{ $article->title }}</td>
                       <td>{{ $article->author }}</td>
                       <td>{{ $article->description }}</td>
                       <td><img src="cover/{{ $article->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                       <td><a href="/admin/edit/{{ $article->id }}" class="btn btn-outline-primary">Update</a></td>
                       <td>
                           <form action="/admin/delete/{{ $article->id }}" method="post">
                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                            @csrf
                            @method('delete')
                        </form>
                       </td>

                   </tr>
                   @endforeach

                </tbody>
              </table>
        </div>
    </section>
@endsection
