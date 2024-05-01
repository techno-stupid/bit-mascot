@extends('panel.master')

@section('title', 'Users List')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col-md-4 text-right">
            <input type="text" class="form-control" placeholder="Search...">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Date of Birth</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $index=>$user)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->date_of_birth }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="col-md-4 text-right">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection


@section('styles')
@endsection
