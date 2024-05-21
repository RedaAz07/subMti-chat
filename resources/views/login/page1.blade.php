<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>

    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>

<form action="{{ route('login.logout') }}" method="post">
    @csrf
    <button type="submit">Log out</button>
</form>

@if (auth()->check() && auth()->user()->type === "etudient")
    <ul class="chat-box">
        <!-- Messages will be displayed here -->
        @foreach ($messages as $message)
            <li>
                <h1>{{ $message->contenu }}</h1>
                <img src="{{ asset('storage/'.$message->file) }}" alt="" width="30px">
            </li>
        @endforeach
    </ul>

    <!-- Form to send new messages -->
    <form id="message-form" action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="contenu" class="input-field" placeholder="Type a message...">
        <input type="file" name="file">
        <button type="submit">Send</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch new messages
            function fetchNewMessages() {
                $.ajax({
                    url: '{{ route("messages.fetch") }}',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Update UI with new messages
                        $('.chat-box').html(response.html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching messages:', error);
                    }
                });
            }

            // Submit form via AJAX
            $('#message-form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Clear form fields after successful submission
                        $('#message-form')[0].reset();
                        // Fetch new messages after sending a message
                        fetchNewMessages();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending message:', error);
                    }
                });
            });

            // Fetch new messages every 5 seconds
            setInterval(fetchNewMessages, 5000);
        });
    </script>
@endif

</body>
</html>
