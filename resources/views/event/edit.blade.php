@extends('layout.app')

<head>
<link href="{{ secure_asset('css/event.css') }}" rel="stylesheet">
</head>


@section('content')
    <div>
        <div>
            <div>
                <h1>Edit Event</h1>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-container">
                            <div class="detail-input">
                                <label for="EventName">Event Name</label><br>
                                <input type="text" id="name" name="name" placeholder="Enter Event Name" value="{{ $event->name }}" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="Description">Event Description</label><br>
                                <input type="text" name="description" placeholder="Enter Event Description" rows=""  value="{{ $event->description }}" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="Location">Event Location</label><br>
                                <input type="text" id="location" name="location" placeholder="Enter Event Location" rows="" value="{{ $event->location }}" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="EventDate">Event Date</label><br>
                                <input type="DateTime" id="date" name="date" placeholder="Enter Event Date" value="{{ $event->date }}" required><br>
                            </div>
                            <div class="detail-input">
                                <label for="category">Event Category:</label><br>
                                <select name="category" id="category">
                                    <option value="Sport">Sport</option>
                                    <option value="Culture">Culture</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="detail-input">
                                <label for="Picture">Picture</label><br>
                                <input class="picture" type="file" accept="image/png, image/jpeg" name="picture" placeholder="Enter Event Picture" required><br>
                            </div>
                        <div>
                            <div class="details-container">
                                <button id="btn-submit">Update Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
