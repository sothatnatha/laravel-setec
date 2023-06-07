<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @yield('cssfile')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oswald', sans-serif;
        }

        body {

            font-size: 16px;
        }

        #wrapper {
            display: flex;
            height: 100vh;
        }

        #left {
            width: 25%;
            background-color: rgb(17, 138, 199);
            min-height: 400px;
        }

        #right {
            width: 75%;
            background-color: rgb(221, 227, 230);
            min-height: 400px;
            padding: 20px;
        }

        nav ul li {
            list-style-type: none;
            border-bottom: 1px solid #ddd;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 8px 10px;
            display: block;
            text-transform: uppercase;
        }

        table {
            border-collapse: collapse;
            border-color: #f1f1f1;
        }

        table tr th {
            background: #0f92ca;
            color: #fff;
            padding: 10px;

        }

        table tr td {
            padding: 10px;

        }

        input {
            padding: 5px 10px;
        }


        #trash_link,
        #create_link,#gotomanage_Link {
            text-decoration: none;
            color: rgb(17, 138, 199)
        }

        #trash_link:hover,
        #create_link:hover {
            text-decoration: underline;
            color: blueviolet;
        }

        .form-group {
            margin: 10px 0;
        }

        textarea {
            padding: 10px;
        }

        .btn-submit {
            background: #128ac791;
            padding: 5px 20px;
            border-radius: 20px;
            border: 1px solid #ddd;
            color: #333;
            cursor: pointer;
        }
        select {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="left">
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/admin/articles/create">Articles</a></li>
                    <li><a href="/admin/categories">Categories</a></li>
                    <li><a href="#">Users</a></li>
                </ul>
            </nav>
        </div>
        <div id="right">
            @yield('right')
        </div>
    </div>
</body>

</html>
