@extends('welcome')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Nos Menus</h1>
        <div class="row">
            @foreach ($menus as $menu)
                <div class="col-lg-3 col-md-6">
                    <div class="card mb-3">
                        <img src="{{ asset('imageMenu/'.$menu->imageMenu) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->nomMenu }}</h5>
                            <p class="card-text">
                                Categorie: <strong>{{ $menu->categorie->nomCat }}</strong><br><br>
                                {{ $menu->prixMenu }} FCFA
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
