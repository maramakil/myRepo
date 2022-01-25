@extends('layout.app')
@section('content')
    <section>
      <div class="container" style="margin-top: 2%">
       <div class="row">
{{--          <div class="col-md-3 col-lg-3 col-xl-3">--}}
          @foreach($articles as $article)
               <div class="card" style="width: 18rem;" >
                   <img style="height: 200px;width: 270px" src="/cover/{{$article->image}}" class="card-img-top" alt="...">
                   <div class="card-body">
                       <h5 class="card-title">{{$article->title}}</h5>
                       <p class="card-text">{{$article->description}}</p>
                       <a href="{{route('details' , $article->id)}}" class="btn btn-primary">Details</a>
                   </div>
               </div>
           @endforeach
{{--              <div class="card" style="width: 18rem;">--}}
{{--                  <img style="height: 200px;width: 270px" src="{{asset('images/1_image.jpg')}}" class="card-img-top" alt="...">--}}
{{--                  <div class="card-body">--}}
{{--                      <h5 class="card-title">Card title</h5>--}}
{{--                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                      <a href="#" class="btn btn-primary">Details</a>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--              <div class="card" style="width: 18rem;">--}}
{{--                  <img style="height: 200px;width: 270px" src="{{asset('images/1_image.jpg')}}" class="card-img-top" alt="...">--}}
{{--                  <div class="card-body">--}}
{{--                      <h5 class="card-title">Card title</h5>--}}
{{--                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                      <a href="#" class="btn btn-primary">Details</a>--}}
{{--                  </div>--}}
{{--              </div>--}}
          </div>
{{--       </div>--}}
      </div>
    </section>

@endsection
