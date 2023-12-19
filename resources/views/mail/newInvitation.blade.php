<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Драги Гости</title>
    <style>
        /* Add some basic button styling */
        .button {
            background-color: #427ccc;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            height: 15px;
        }
    </style>
</head>
<body>

<h3>Почитувани</h3>
<br>

<p>Вашата покана е креирана.</p>
<p>Истата можете да ја погледнете на линкот подолу.</p>
<br>
<br>
<a href="{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/email/{{$hash}}" class="button" target="_blank">Погледни</a>

<br>
<br>
<br>
<footer>
    <h3>Тимот на Драги Гости</h3>
    <img src="https://demo.dragigosti.com/dist/images/logo.svg" alt="Your Image" style="max-width: 170px; height: auto; display: block;">
</footer>
</body>

</html>

