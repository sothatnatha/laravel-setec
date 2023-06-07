<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Dashboard | @yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Kantumruy Pro', sans-serif;
        }

        body {
            line-height: 1.5;
            background-color: #f4f4f4;
        }

        .wrapper {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
        }

        .sidebar {
            width: 350px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            transition: all 0.3s;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sub-menu {
            display: none;
            list-style: none;
            padding: 0;
            margin: 10px;

        }


        .sub-menu a {
            color: #fff;
        }

        .content {
            padding: 20px;
            flex: 1;
        }

        .btn-menu {
            display: none;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
        }


        .show {
            display: block !important;
            margin: 10px;
        }


        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .content {
                flex: 100%;
            }

            .btn-menu {
                display: block;
            }

            .sidebar.active {
                width: 200px;
            }
        }

        table {
            border-collapse: collapse;
        }


        table tr th {
            background: #0f92ca;
            color: #fff;
            padding: 10px;



        }

        table {
            border: 1px solid #ddd;
            box-shadow: 0 0 20px #ddd;
        }

        table tr td {
            padding: 2px 5px;
            font-size: 13px;

        }

        input {
            width: 100%;
            border: 1px solid #ddd;
            padding: 8px 10px;

        }


        #trash_link,
        #create_link,
        #gotomanage_Link,
        #listing_Links {
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
            width: 100%;

            padding: 10px;
            border: 1px solid #ddd;
        }

        .btn-submit {
            widows: 250px !important;
            background: #128ac791;
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            color: #fff;
            cursor: pointer;
        }

        ::placeholder {
            font-family: Arial, sans-serif;
        }

        select {
            width: 100%;

            padding: 8px 10px;
            border: 1px solid #ddd;

        }

        .btn-edit-action {
            text-decoration: none;
            color: #1b5db4a0;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-edit-action:hover {
            color: #0f4c9ccd;
            text-decoration: underline;

        }

        .news-description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .news-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .fa-earth-americas {
            color: #464444;
        }

        .fa-lock {
            color: rgba(226, 42, 42, 0.754);
        }

        #delte-success-message {
            color: green;
        }

        .btn-show-action {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }

        #action-list,
        #action-list-in-trash {
            display: flex;
            justify-content: space-evenly;
            gap: 10px;
            align-items: center;
        }

        #btnMoveToTrash {
            border-radius: 50px;
            background: transparent;
            color: #1b5db4a0;
            font-weight: bold;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: ease 0.25s;
        }

        #btnMoveToTrash:hover {
            background: rgba(226, 42, 42, 0.754);
            color: #fff;
            transition: ease 0.25s;

        }

        #move-to-trash-success-message {
            color: green;

        }

        #not-check-message {
            color: rgb(246, 52, 52);
        }

        #btnPutBack {
            border-radius: 50px;
        }
        .article-main-action-wrapper {
            display: flex;
            justify-content: flex-start;
            width: 200px;
            margin-bottom: 20px;
            gap: 15px;
        }

        #put-back-success-message , #move-trash-success-message{
            color: green;
        }

        #_article_description-link {
            text-decoration: none;
            color: #333
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Administrator</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li>
                    <a class="menu-item">Articles &#9662;</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/articles/create">Create</a></li>
                        <li><a href="/admin/articles">Mange Articles</a></li>
                        <li><a href="/admin/article/trash">Trash</a></li>
                    </ul>
                </li>

                <li>
                    <a class="menu-item">Categories &#9662;</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/categories/create">Create</a></li>
                        <li><a href="/admin/categories">Listing</a></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>

                <li>
                    <a class="menu-item">Employees &#9662;</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/employees">Listing</a></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>

                <li>
                    <a class="menu-item">Users &#9662;</a>
                    <ul class="sub-menu">
                        <li><a href="#">Listing</a></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <button class="btn-menu">&#9776; Menu</button>
            @yield('right')
        </div>
    </div>
    <script>
        const btnMenu = document.querySelector(".btn-menu");
        const sidebar = document.querySelector(".sidebar");
        const menuItem = document.querySelectorAll(".menu-item");

        btnMenu.addEventListener("click", function() {
            sidebar.classList.toggle("active");
        });

        menuItem.forEach(function(item) {
            item.addEventListener("click", function() {
                item.nextElementSibling.classList.toggle("show");
            });
        });

        // checkbox select all
        function selects() {
            var ele = document.getElementsByName('chk_ids[]');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = true;
            }
        }

        function deSelect() {
            var ele = document.getElementsByName('chk_ids[]');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = false;

            }
        }
    </script>
</body>

</html>
