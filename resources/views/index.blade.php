<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="site-under-construct-wrapper">
            <h1>Site is under construction</h1>
            {{-- <img src="{{ asset('img/maintenance.png') }}" alt="" width="200px"> --}}
            <iframe src="https://giphy.com/embed/QNFhOolVeCzPQ2Mx85" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/checkmatedigital-code-coding-monkey-QNFhOolVeCzPQ2Mx85"></a></p>
            <a href="/admin">Go Admin</a>
        </div>
    </div>
</body>
</html>
