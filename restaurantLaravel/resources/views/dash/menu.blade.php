@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Ajouter un menu</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <button class="btn btn-primary w-25 my-3" data-bs-toggle="modal" data-bs-target="#menu">Add menu</button>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Menu</th>
                        <th scope="col">Prix Menu</th>
                        <th scope="col">Image Menu</th>
                        <th scope="col">Categorie</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <th scope="row">{{ $menu->id }}</th>
                                <td>{{ $menu->nomMenu }}</td>
                                <td>{{ $menu->prixMenu }}</td>
                                <td>
                                    <img src="{{ asset('imageMenu/'.$menu->imageMenu) }}" alt="" width="50" height="50" class="rounded-circle">
                                </td>
                                <td class="fw-bold">{{ $menu->categorie->nomCat }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#{{ $menu->id }}">
                                        <i class="fa fa-edit text-primary"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delMenu',['id'=>$menu->id]) }}">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="{{ $menu->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('updateMenu',['id'=>$menu->id]) }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nomMenu" class="form-label">Nom</label>
                                                <input value="{{ $menu->nomMenu }}" type="text" class="form-control" id="nomMenu" name="nomMenu">
                                            </div>
                                            <div class="mb-3">
                                                <label for="prixMenu" class="form-label">¨Prix</label>
                                                <input type="number" value="{{ $menu->prixMenu }}" class="form-control" id="prixMenu" name="prixMenu">
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" aria-label="Default select example" name="idCat">
                                                    <option value="">Choisir une categorie</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->nomCat }}</option>
                                                    @endforeach
                                                </select>
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
                <div class="modal fade" id="menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addmenu') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nomMenu" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nomMenu" name="nomMenu">
                                </div>
                                <div class="mb-3">
                                    <label for="prixMenu" class="form-label">¨Prix</label>
                                    <input type="number" class="form-control" id="prixMenu" name="prixMenu">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="idCat">
                                        <option value="">Choisir une categorie</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nomCat }}</option>
                                        @endforeach
                                    </select>
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
