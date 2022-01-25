@extends('layout.app')
@section('content')
    <section>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3">
                    <p>Cover:</p>
                    <form action="/admin/deletecover/{{ $articles->id }}" method="post">
                    <button class="btn text-danger">X</button>
                    @csrf
                    @method('delete')
                    </form>
                    <img src="/cover/{{ $articles->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                    <br>



                     @if (count($articles->images)>0)
                     <p>Images:</p>
                     @foreach ($articles->images as $img)
                     <form action="/admin/deleteimage/{{ $img->id }}" method="post">
                         <button class="btn text-danger">X</button>
                         @csrf
                         @method('delete')
                         </form>
                     <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                     @endforeach
                     @endif

                </div>


                <div class="col-lg-6">
                    <h3 class="text-center text-danger"><b>Udate Article</b> </h3>
				    <div class="form-group">
                        <form action="/admin/update/{{ $articles->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                         <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $articles->title }}">
        				 <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $articles->author }}">
                         <Textarea name="description" cols="20" rows="4" class="form-control m-2" placeholder="description">{{ $articles->description }}</Textarea>
                         <label class="m-2">Main Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="main_image">

                         <label class="m-2">Images</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>
                   </div>
                </div>
            </div>

        </div>

    </section>
@endsection








