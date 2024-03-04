@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Ajouter une Catégorie</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <button class="btn btn-primary w-25 my-3" data-bs-toggle="modal" data-bs-target="#categorie">Add Categorie</button>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Categorie</th>
                        <th scope="col">Image Categorie</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $categorie)
                      <tr>
                            <th scope="row">{{ $categorie->id }}</th>
                            <td>{{ $categorie->nomCat }}</td>
                            <td>
                                <img src="{{ asset('imageCat/'.$categorie->imageCat) }}" width="50" height="50" class="rounded-circle" alt="">
                            </td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#{{ $categorie->id }}">
                                    <i class="fa fa-edit text-primary"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('delCat',['id'=>$categorie->id]) }}">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>

                          <!-- Modal -->
                        <div class="modal fade" id="{{ $categorie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Categorie</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('updateCat',['id'=>$categorie->id]) }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nomCat" class="form-label">Nom</label>
                                            <input value="{{ $categorie->nomCat }}" type="text" class="form-control" id="nomCat" name="nomCat">
                                        </div>
                                        <button class="btn btn-primary w-100">Update</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                  </table>

                   <!-- Modal -->
                <div class="modal fade" id="categorie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Categorie</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addcategorie') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nomCat" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nomCat" name="nomCat">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="formFile" name="formFile">
                                </div>
                                <button class="btn btn-primary w-100">Ajouter</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
