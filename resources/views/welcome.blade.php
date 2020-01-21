@extends('layouts.main')


@section('content')


@if(session('successMsg'))

<div class="alert alert-primary" role="alert">
    {{ session('successMsg') }}
  </div>

@endif

<div class="container">

    <h1>Welcome to Page</h1>

    <table class="table">
        <thead class="black white-text">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)

                <tr>
                    <th scope="row">{{ $student->id }}.</th>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="{{ route('edit', $student->id) }}" class="btn btn-primary btn-raised btn-sm"><i class="fas fa-edit"></i> </a>
                        |
                        <form id="delete-form-{{ $student->id }}" action="{{ route('delete', $student->id) }}" method="post" style="display:none;">
                            @method('delete')
                            @csrf
                        </form>
                        <button onclick="if(confirm('Are you sure to delete ?')) {
                            event.preventDefault(); document.getElementById('delete-form-{{ $student->id }}').submit();
                            }
                            else
                            {
                                event.preventDefault();
                            }" class="btn btn-danger btn-raised btn-sm"><i class="fas fa-trash-alt"></i> </button>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    {{ $students->links(0) }}

</div>

@endsection
