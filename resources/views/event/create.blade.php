@extends('layout.app')

<head>
<link href="{{ secure_asset('css/event.css') }}" rel="stylesheet">
</head>


@section('content')
    <div class="container">
        <div>
            <div>
                <div>
                    <h1>Create a New Event</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-container">
                            <div class="detail-input">
                                <label for="EventName">Event Name</label><br>
                                <input type="text" id="name" name="name" placeholder="Enter Event Name" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="Description">Event Description</label><br>
                                <textarea id="description" name="description" placeholder="Enter Event Description" rows="" required></textarea><br>
                            </div>
                            <div class="detail-input"> 
                                <label for="Location">Event Location</label><br>
                                <input type="text" id="location" name="location" placeholder="Enter Event Location" rows="" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="date">Event Date</label><br>
                                <input type="datetime-local" id="EventDate" name="date" placeholder="Enter Event Date" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="category_id">Event Category:</label><br>
                                <select name="category_id" id="category_id">
                                    <option value="1">Sport</option>
                                    <option value="2">Culture</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div class="detail-input">
                                <label for="Picture">Picture</label><br>
                                <input class="picture" type="file" accept="image/jpg, image/png, image/jpeg" id="picture" class="form-control" name="picture"
                                       placeholder="Enter Event Picture" required><br>
                            </div>
                        </div>
                        <div class="details-container"> 
                            <div>
                                <button id="btn-submit">Create Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection