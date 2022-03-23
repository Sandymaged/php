<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- container -->
            <a class="navbar-brand" href="#">ITI Cafeteria</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="allproducts.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alluser.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manual Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Checks</a>
                    </li>
                </ul>
                <div style="display:inline; margin-left:700px">
                    <div class="my-2 my-sm-0">
                        <img src="an6.jpeg" width="50" height="50" alt="userAvatar" />
                        <span>Admin</span>
                    </div>
                </div>
            </div>
            <!-- ./container -->
        </nav>
    </header>
    <div class="container">
        <h2 style="margin-top: 20px;">All Users</h2>
        <a href="users.php" style="float: right;">Add User</a>
        <?php

        $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;'; #port number
        $user = 'root';
        $password = '';
        $db = new PDO($dsn, $user, $password);

        if ($db) {
            $select_query = 'select * from users';

            $stmt = $db->prepare($select_query);
            $resobj = $stmt->execute();

            echo "<table class='table'> 
            <tr>
            <th scope='col'>Name</th>
             <th scope='col'>room</th>
             <th scope='col'>ext</th>
             <th scope='col'>Action</th>
             </tr> ";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row["user_name"]}</td> 
                         <td>{$row["user_room"]}</td>
                         <td>{$row["user_ext"]}</td>
                         <td><a href='#'>Edit</a> <a href='#'>Delete</a></td>
                         </tr>";
            }
            echo "</table>";
        }
        ?>
    </div>