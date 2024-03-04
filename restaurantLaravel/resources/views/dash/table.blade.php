@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Ajouter une Table</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <button class="btn btn-primary w-25 my-3" data-bs-toggle="modal" data-bs-target="#table">Add Table</button>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Table</th>
                        <th scope="col">Disonibilite</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr>
                                <th scope="row">{{ $table->id }}</th>
                                <td>{{ $table->nomTab }}</td>
                                <td>{{ $table->status }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#{{ $table->id }}">
                                        <i class="fa fa-edit text-primary"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delTable',['id'=>$table->id]) }}">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="{{ $table->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Table</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('updateTable',['id'=>$table->id]) }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nomTab" class="form-label">Nom</label>
                                                <input value="{{ $table->nomTab }}" type="text" class="form-control" id="nomTab" name="nomTab">
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" aria-label="Default select example" name="status">
                                                    <option value="">Statut de la Table</option>
                                                    <option value="1">Disponibe</option>
                                                    <option value="0">Indisponible</option>
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
                <div class="modal fade" id="table" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Categorie</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addtable') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nomTab" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nomTab" name="nomTab">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option value="">Statut de la Table</option>
                                        <option value="1">Disponibe</option>
                                        <option value="0">Indisponible</option>
                                      </select>
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
