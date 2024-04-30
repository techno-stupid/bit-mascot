@extends('panel.master')

@section('title', 'My Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="profile-section">
                <div class="title text-center mb-4">User Profile</div>
                <table class="table table-bordered">
{{--                    <tr>--}}
{{--                        <th>Field</th>--}}
{{--                        <th>Details</th>--}}
{{--                    </tr>--}}
                    <tr>
                        <td>First Name</td>
                        <td>{{ $user->first_name }}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{ $user->last_name }}</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>{{ $user->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td>ID Verification</td>
                        <td>--</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('styles')
    <style>
        .profile-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .profile-section .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .profile-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .profile-section table th,
        .profile-section table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        .profile-section table th {
            background-color: #f8f9fa;
            font-weight: bold;
            border-top: 2px solid #dee2e6;
        }
    </style>
@endsection
