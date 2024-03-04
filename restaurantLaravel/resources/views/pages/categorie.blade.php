@extends('welcome')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Nos Categories</h1>
        <div class="row d-flex justify-content-center">
            @foreach ($categories as $categorie)
                <div class="col-lg-3 col-md-6">
                    <div class="card mb-3">
                        <a href="{{ route('menuToCat',['id'=>$categorie->id]) }}">
                            <img src="{{ asset('imageCat/'.$categorie->imageCat) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $categorie->nomCat }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
