<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email verification</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .upload-area {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }
        .upload-area:hover {
            background-color: #f9f9f9;
        }
        .upload-area input[type=file] {
            display: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Email verification</h1>
            <div class="card">
                <div class="card-header text-center">An unique code has been sent to your email.</div>
                <p></p>

                <div class="card-body">
                    @if ($errors->has('wrong_credentials'))
                        <div class="alert alert-danger">{{ $errors->first('wrong_credentials') }}</div>
                    @endif


                    <form action="{{route('auth.otp.submit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="otp">Email</label>
                            <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" >
                            @error('otp')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </div>
                        <p style="text-align: center;" >Don't have an account? <a href="{{route('auth.register')}}">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
