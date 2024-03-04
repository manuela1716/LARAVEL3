@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Vos Reservations</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Personne</th>
                            <th scope="col">Table</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <th scope="row">{{ $reservation->id }}</th>
                                    <td>{{ $reservation->client->nomCli }}</td>
                                    <td>{{ $reservation->client->emailCli }}</td>
                                    <td>{{ $reservation->client->telCli }}</td>
                                    <td>{{ $reservation->dateReserv }}</td>
                                    <td>{{ $reservation->heureReserv }}</td>
                                    <td>{{ $reservation->nbrePer }}</td>
                                    <td>{{ $reservation->table->nomTab }}</td>
                                    <td>
                                        <a href="{{ route('delRes',['id'=>$reservation->id]) }}">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
