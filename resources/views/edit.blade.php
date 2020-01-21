@extends('layouts.main')


@section('content')

<div class="container mb-4">

    @if($errors->any())

        @foreach ($errors->all() as $error)

            <div class="alert alert-danger" role="alert">
            {{ $error }}
          </div>

        @endforeach

    @endif

        <h1>Welcome to Update</h1>

        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="{{ route('update', ['id' => $student->id]) }}" method="POST">

            @csrf

            <p class="h4 mb-4">Add Student</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="{{ $student->first_name }}">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="{{ $student->last_name }}">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" value="{{ $student->email }}">

            <!-- Phone number -->
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number" value="{{ $student->phone }}">

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Update Data</button>


        </form>
<!-- Default form register -->

</div>

@endsection
