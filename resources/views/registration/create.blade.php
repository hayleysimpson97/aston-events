@extends('layout.app')

<head>
<link href="{{ secure_asset('css/registration.css') }}" rel="stylesheet">
</head>


@section('content')
    <div>
        <div>
            <div>
                <div>
                    <h1>Register New User</h1>
                    <form action="" method="POST" enctype="multipart/form-data" onSubmit = "return checkPassword(this)">
                        @csrf
                        <div class="details-container">
                            <div class="detail-input">
                                <label for="name">Name</label><br>
                                <input type="text" id="name" name="name" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="email">Email</label><br>
                                <input type="email" id="email" name="email" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="password">Password</label><br>
                                <input type="password" id="password" name="password" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="confirm_password">Confirm Password</label><br>
                                <input type="password" id="confirm_password" name="confirm_password"  required><br>
                            </div>
                            <div class="detail-input">
                                <label for="phone_number">Contact Number</label><br>
                                <input type="text" id="phone_number" name="phone_number" required><br>
                            </div>
                            <div>
                                <button onClick="matchPassword()">Create User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
function matchPassword() {  
  var pw1 = document.getElementById("password");  
  var pw2 = document.getElementById("confirm_password");  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    alert("Password created successfully");  
  }  
}  
</script>  