<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My App | Home</title>
</head>

<body>
    <h1>Hello {{ auth()->user()->name }}</h1>
    <a href="/user/edit">Edit</a>
    <br /><br />
    <form action="/user/logout" method="GET">
        <button type="submit">Logout</button>
    </form>
</body>

</html>
