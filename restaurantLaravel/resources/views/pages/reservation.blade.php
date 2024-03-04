@extends('welcome')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Reserver Votre Table</h1>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <!-- ======= Book A Table Section ======= -->
                <section id="book-a-table" class="book-a-table">
                    <div class="container" data-aos="fade-up">
                        @if (session()->has('succes'))
                        <div class="alert alert-success">
                            {{ session()->get('succes') }}
                        </div>
                        @endif
                    <div class="row g-0">

                        <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

                        <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form action="{{ route('reservation') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row gy-4">
                            <div class="col-lg-4 col-md-6">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" value="{{ old('date') }}" min="2023-06-30" max="2023-07-07" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" id="time" value="{{ old('time') }}" min="08:00" max="18:00" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                @error('time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="number" class="form-control @error('people') is-invalid @enderror" name="people" min="1" max="4" id="people" value="{{ old('people') }}" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                @error('people')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-select @error('table') is-invalid @enderror" aria-label="Default select example"  name="table">
                                    <option value="">Choisir Votre Table</option>
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->nomTab }}</option>
                                    @endforeach
                                </select>
                                @error('table')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center mt-3"><button type="submit">Book a Table</button></div>
                        </form>
                        </div><!-- End Reservation Form -->

                    </div>

                    </div>
                </section><!-- End Book A Table Section -->
            </div>
        </div>
    </div>
@endsection
