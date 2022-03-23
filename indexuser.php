<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #tea {
            display: none;
            color: green;
            font-size: 20px;

        }

        #coffe {
            display: none;
            color: green;
            font-size: 20px;
        }

        #sd {
            display: none;
            color: green;
            font-size: 20px;
        }

        #fc {
            display: none;
            color: green;
            font-size: 20px;
        }
    </style>
</head>

<body class="row">

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
                        <a class="nav-link" href="indexuser.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>

                </ul>

            </div>
            <!-- ./container -->
        </nav>
    </header>
    <?php

    $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
    $user = 'root';
    $password = '';
    $db = new PDO($dsn, $user, $password);

    $select_query = "select * from products";
    $stmt = $db->prepare($select_query);
    $resobj = $stmt->execute();

    echo "<div class='col-9'><div class='row row-cols-3 row-cols-md-3 g-4'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $x = $row["product_name"];
        $y = $row["product_price"];
        echo "<div class='col'><div class='card'>
            <img src='https://fakeimg.pl/250x100/adb5bd/' class='card-img-top'>
            <div class='card-body'>
                <h4 class='card-title'>{$row["product_name"]}</h4>
                <h6 class='card-text'>Price: {$row["product_price"]}L.E</h6>
                <button class='btn btn-success' onclick='d(`$x`,`$y`)'>ADD</button>
            </div>
        </div></div>";
    }
    echo "</div></div>";
    ?>
    <form method="post" action="addorderuser.php" class="col-3" style="border:1px solid grey; height:500px">
        <div style="margin-top:20px ;">
            <div id="tea">
                tea: <span id="t"></span>L.E
                <a href="#" id="plus"><i class="fa fa-plus"></i></a>
                <a href="#" id="mins"><i class="fa fa-minus"></i>
                </a>
            </div>
            <div id="coffe">coffe: <span id="c"></span>L.E
                <a href="#" id="pluss"><i class="fa fa-plus"></i></a>
                <a href="#" id="minss"><i class="fa fa-minus"></i></a>
            </div>
            <div id="sd">soft drink: <span id="s"></span>L.E
                <a href="#" id="pluss1"><i class="fa fa-plus"></i></a>
                <a href="#" id="minss1"><i class="fa fa-minus"></i></a>
            </div>
            <div id="fc">french coffe: <span id="f"></span>L.E
                <a href="#" id="pluss2"><i class="fa fa-plus"></i></a>
                <a href="#" id="minss2"><i class="fa fa-minus"></i></a>
            </div>
            <br>
            <h5>Notes:</h5>
            <textarea name="note" class="form-control"></textarea><br>
            <h5>Room:</h5>
            <input name="room" type="number" class="form-control"><br>

            <p style="font-size:30px;"><textarea id="tp" name="total" style="width: 60px; height:50px">0 </textarea><span>EGP</span></p>
            <input type="submit" value="CheckOut" class="btn btn-success" style="float:right;">

        </div>
    </form>
    <script>
        console.log("done");
        let a;
        let totalprice = 0;

        function d(x, y) {
            if (x == "tea") {
                document.getElementById("tea").style.display = "block";
                a = parseInt(y);
                document.getElementById("t").textContent = a;
                document.getElementById("plus").addEventListener("click", function() {
                    totalprice = totalprice + 100;
                    console.log(totalprice);
                    document.getElementById("tp").textContent = totalprice;
                });
                document.getElementById("mins").addEventListener("click", function() {
                    if (totalprice > 0) {
                        totalprice = totalprice - 100;
                        console.log(totalprice);
                        document.getElementById("tp").textContent = totalprice;
                    }
                });
            }
            if (x == "coffe") {
                document.getElementById("coffe").style.display = "block";
                a = parseInt(y);
                document.getElementById("c").textContent = a;
                document.getElementById("pluss").addEventListener("click", function() {
                    totalprice = totalprice + 22;
                    console.log(totalprice);
                    document.getElementById("tp").textContent = totalprice;
                });
                document.getElementById("minss").addEventListener("click", function() {
                    if (totalprice > 0) {
                        totalprice = totalprice - 22;
                        console.log(totalprice);
                        document.getElementById("tp").textContent = totalprice;
                    }
                });
            }
            if (x == "soft drink") {
                document.getElementById("sd").style.display = "block";
                a = parseInt(y);
                document.getElementById("s").textContent = a;
                document.getElementById("pluss1").addEventListener("click", function() {
                    totalprice = totalprice + 7;
                    console.log(totalprice);
                    document.getElementById("tp").textContent = totalprice;
                });
                document.getElementById("minss1").addEventListener("click", function() {
                    if (totalprice > 0) {
                        totalprice = totalprice - 7;
                        console.log(totalprice);
                        document.getElementById("tp").textContent = totalprice;
                    }
                });
            }
            if (x == "french coffe") {
                document.getElementById("fc").style.display = "block";
                a = parseInt(y);
                document.getElementById("f").textContent = a;
                document.getElementById("pluss2").addEventListener("click", function() {
                    totalprice = totalprice + 30;
                    console.log(totalprice);
                    document.getElementById("tp").textContent = totalprice;
                });
                document.getElementById("minss2").addEventListener("click", function() {
                    if (totalprice > 0) {
                        totalprice = totalprice - 30;
                        console.log(totalprice);
                        document.getElementById("tp").textContent = totalprice;
                    }
                });
            }

        }
    </script>

</body>

</html>