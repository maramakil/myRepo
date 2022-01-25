@extends('layout.app')
@section('content')
    <section>
        <div class="container" style="margin-top: 2%">
            <div class="row">
                <div class="card" style="width: 18rem;" >
{{--                    <img style="height: 200px;width: 270px" src="/cover/{{$article->image}}" class="card-img-top" alt="...">--}}
                    <div class="card-body">
{{--                        <h5 class="card-title">{{$article->title}}</h5>--}}
                        <p class="card-text">{{$article->description}}</p>
{{--                        <a href="{{route('details' , $article->id)}}" class="btn btn-primary">Details</a>--}}
                    </div>
                </div>
{{--               @foreach($article->images as $$article)--}}
{{--                   --}}
{{--                @endforeach--}}
            </div>
        </div>
    </section>

@endsection
