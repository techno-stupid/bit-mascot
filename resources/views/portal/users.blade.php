@extends('portal.master')

@section('title', 'Users List')

@section('content')
    <h1 class="text-center">User List</h1>
    <table id="users" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">ID Verification</th>
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
                <td><a href="{{ $user->id_verification }}" class="btn btn-primary">Download NID/Office ID</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#users').DataTable();
        });
    </script>
@endsection
