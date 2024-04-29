<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
            <div class="card">
                <div class="card-header text-center">Register your account</div>

                <div class="card-body">
                    <form action="{{route('auth.register.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" >
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" id="address" name="address" >
                            @error('address')
                                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group  col-md-6">
                                <label for="phone">Phone</label>
                                <input type="tel" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="email">Email</label>
                                <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" value="{{old('date_of_birth')}}" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" >
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <label for="profilePicture" class="upload-area">
                                <div>Upload NID/Office ID for verification</div>
                                <input type="file" class="form-control-file" id="profilePicture" name="profilePicture">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <p style="text-align: center;" >Already have an account? <a href="{{route('auth.login')}}">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<!-- jQuery -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#email').keyup(function() {
            var email = $(this).val();
            if(email == '' ){
                $('#email').removeClass('is-valid');
                $('#email-feedback').removeClass('valid-feedback');
                $('#email').removeClass('is-invalid');
                $('#email-feedback').removeClass('invalid-feedback');
                return;
            }
            if(email != '' && !isEmail(email)) {
                $('#email').removeClass('is-valid');
                $('#email').addClass('is-invalid');
                $('#email-feedback').removeClass('valid-feedback');
                $('#email-feedback').addClass('invalid-feedback');
                return;
            }
            $.ajax({
                url: '/email/availability',
                type: 'GET',
                data: {'email': email},
                success: function(response) {
                    if(response.available) {
                        $('#email').removeClass('is-invalid');
                        $('#email').addClass('is-valid');
                        $('#email-feedback').removeClass('invalid-feedback');
                        $('#email-feedback').addClass('valid-feedback');
                        $('#email-feedback').text(response.message);
                    } else {
                        $('#email').removeClass('is-valid');
                        $('#email').addClass('is-invalid');
                        $('#email-feedback').removeClass('valid-feedback');
                        $('#email-feedback').addClass('invalid-feedback');
                        $('#email-feedback').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    function isEmail(emailAdress){
        let regex =  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,}))$/;
        return !!emailAdress.match(regex);
    }
</script>



</body>
</html>
