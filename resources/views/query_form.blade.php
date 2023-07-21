@extends('homelayouts.main')
@section('content')
    <div class="container mt-4">
        <h1>Huggingface API Query:</h1>
        <p>Enter a value and click the submit button to make an API request.</p>
        <p> Enter value will take cat or dog or any other value and it will return the image of cat or dog or any other
            image.</p>
        <form id="apiForm" action="/huggingface/query/result" method="post">
            @csrf
            <label for="input_value">Enter Input Value:</label>
            <input type="text" id="input_value" name="input_value">
            <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
            <!-- Spinner element (hidden by default) -->
            <div class="spinner-border text-primary mt-2" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div>
        </form>
        <!-- Display the message with red text -->
        <span class="red mt-2">The API request will take 3 seconds to complete.</span>
    </div>

    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add Bootstrap JS (jQuery, Popper.js, Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        /* Custom CSS to define the red class */
        .red {
            color: red;
        }
    </style>

    <script>
        // Add event listener for form submit
        document.getElementById('apiForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Hide the submit button and display the spinner
            document.getElementById('submitButton').style.display = 'none';
            document.querySelector('.spinner-border').style.display = 'block';

            // Simulate an API request delay for 3 seconds (replace this with your actual API fetch code)
            setTimeout(function() {
                // Once the API request is complete, submit the form
                document.getElementById('apiForm').submit();
            }, 3000); // Adjust the delay time as needed
        });
    </script>
@endsection
