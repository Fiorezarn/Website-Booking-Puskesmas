<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Message</h1>
    <p>Name : {{$data['name']}}</p>
    <p>Email : {{$data['email']}}</p>
    <p>Subject : {{$data['subject']}}</p>
    <p>Message : {{$data['message']}}</p>
    
</body>
</html>