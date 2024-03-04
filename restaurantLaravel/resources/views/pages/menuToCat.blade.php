@extends('welcome')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($menuToCat as $menuTo)
                <div class="col-lg-3 col-md-6">
                    <div class="card mb-3">
                        <img src="{{ asset('imageMenu/'.$menuTo->imageMenu) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menuTo->nomMenu }}</h5>
                            <p class="card-text">{{ $menuTo->prixMenu }} FCFA</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
