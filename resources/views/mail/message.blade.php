<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Драги Гости</title>
</head>

<body>
<h3>Почитувани</h3>
<br>

<p>{{$msg}}</p>

<br>
<footer>
    <h3>{{ $sender['firstName'] }}</h3>
    <h4>{{ $sender['email'] }}</h4>
    <h4>{{ $sender['phone'] }}</h4>
</footer>
</body>

</html>
