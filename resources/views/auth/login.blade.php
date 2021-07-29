@extends('layout.app')

<head>
<link href="{{ secure_asset('css/registration.css') }}" rel="stylesheet">
</head>


@section('content')
    <div>
        <div>
            <div>
                <div class="details-container">
                    <h1>Login</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="detail-input">
                            <input type="text" placeholder="Email" id="email" name="email" required autofocus>
                        </div>
                        <div class="detail-input">
                            <input type="password" placeholder="Password" id="password" name="password" required>
                        </div>
                        <div>
                            <div>
                                <button id="btn-submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection