<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR System</title>
</head>
<body>
    <header>
        @section('header')
            <h1>Welcome</h1>    
        @show
        
    </header>
    <div class="container">
        @yield("content")
    </div>
    <footer>
        @yield('name')
        <hr>
        {{$data ?? "Contacts"}}
    </footer>    
</body>
</html>


