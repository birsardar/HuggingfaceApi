@extends('homelayouts.main')
@section('content')
    <div class="container my-3">
        <div class=" btn btn-primary">
            <a href="{{ route('huggingface.query.create') }}" class="text-white">Back</a>
        </div>
        <h1>Huggingface API Result:</h1>
        <!-- Convert the binary data to base64 and embed it as an image -->
        <div class="img">
            <img src="data:image/jpeg;base64,{{ base64_encode($result) }}" alt="Result Image">
        </div>
    </div>
@endsection
