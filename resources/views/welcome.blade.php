<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello React in Laravel</title>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
</head>
<body>
    <div id="Hello-react"></div>

    <!-- Include React and ReactDOM -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

    <!-- Your HelloReact component rendering code -->
    <script>
        // Define your React component
        function HelloReact() {
            return (
                <h1>Hello React</h1>
            );
        }

        // Render the component
        const container = document.getElementById("Hello-react");
        ReactDOM.render(<HelloReact />, container);
    </script>
</body>
</html>
