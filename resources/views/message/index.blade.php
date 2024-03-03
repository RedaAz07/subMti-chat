
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="refresh" content="60">

</head>
<body>



<!-- Your HTML template -->
<form action="{{route("login.logout")}}" method="post">@csrf

    <button type="submit">log out</button>

    </form>







@auth




@foreach ($formateurs as $formateur)
    @if (auth()->user()->etudient && auth()->user()->etudient->id_classe === $formateur->classes)
        {{ $formateur->nom }}
    @endif
@endforeach









@if (auth()->user()->type === "etudient" )





<ul id="messages-container">
    <!-- Messages will be displayed here -->
    @foreach ($messages as $message)
        <li>


            <form action="{{route("message.destroy",["message"=>$message])}}" method="post" >
                @method("DELETE")
                @csrf
                <input type="submit" class="btn btn-danger" value="delete" onclick=" return confirm('are you sure ??')">

        </form>



            {{ $message->utilisateur->etudiant->nom }}
            <h1>{{ $message->contenu }}</h1>
            <img src="{{ asset("storage/".$message->file) }}" alt="">
        </li>
    @endforeach
</ul>


<!-- Form to send new messages -->

<form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="contenu">
    <input type="file" name="file">



    <button type="submit">send</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to fetch new messages
    function fetchNewMessages() {
        $.ajax({
            url: '{{ route("messages.fetch") }}',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update UI with new messages
                response.messages.forEach(function(message) {
                    $('#messages-container').append(`
                        <li>
                            ${message.utilisateur.nom}
                            <h1>${message.contenu}</h1>
                            <img src="{{ asset('storage/') }}/${message.file}" alt="">
                        </li>
                    `);
                });
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
            },
            error: function(xhr, status, error) {
                console.error('Error sending message:', error);
            }
        });
    });

    // Fetch new messages every 5 econds
    setInterval(fetchNewMessages, 1000);
</script>


@endif
@endauth

</body>
</html>
