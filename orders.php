<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="adminorders.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <h1>Orders</h1>

    <?php
    $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
    $user = 'root';
    $password = '';
    try {
        $conn = new PDO($dsn, $user, $password);
        $sql_user = 'SELECT o.order_id  , o.date as date, u.user_name as name
        , o.room, o.staus, o.total as total
            FROM orders o join users u  on o.user_id= u.user_id
             WHERE o.staus != "Delivered";
             ';
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->execute();
        $result_user = $stmt_user->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result_user);
        foreach ($result_user as $row_user) {
            echo '<div class="order">';
            echo '<div class="header">';
            echo '<table class="table table-dark table-bordered text-center">';
            echo '<tr>
                <th>Order Date</th>
                <th>Name</th>
                <th>Room</th>
                <th>Status</th>
                </tr>';
            echo '<tr>';
            echo '<td>' . $row_user['date'] . '</td>';
            echo '<td>' . $row_user['name'] . '</td>';
            echo '<td>' . $row_user['room'] . '</td>';
            echo '<td>' . $row_user['staus'] . '<a data-status="' . $row_user['staus'] . '" data-id="' . $row_user['order_id'] . '" class="btn btn-warning ms-3" 
            onclick="updateStatus(event)">' . $row_user["staus"] . '</a>' . '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '<div class="body">';

            $id = $row_user['order_id'];
            $sql_product = "SELECT * from orders
                where order_id = $id
                ";
            $stmt_product = $conn->prepare($sql_product);
            $stmt_product->execute();
            $result_product = $stmt_product->fetchAll(PDO::FETCH_ASSOC);
            //$total = 0;
            foreach ($result_product as $row_product) {
                if ($row_product['tea'] > 0) {
                    // echo "<img src='https://fakeimg.pl/100x50/adb5bd/' class='card-img-top'>";
                    echo "tea: " . $row_product['tea'] . "  Total: " . $row_product['tea'] * 7 . "<br>";
                }
                if ($row_product['coffe'] > 0) {
                    //echo "<img src='https://fakeimg.pl/100x50/adb5bd/' class='card-img-top'>";
                    echo "coffe: " . $row_product['coffe'] . "  Total: " . $row_product['coffe'] * 20 . "<br>";
                }
                if ($row_product['soft'] > 0) {
                    // echo "<img src='https://fakeimg.pl/100x50/adb5bd/' class='card-img-top'>";
                    echo "soft drink: " . $row_product['soft'] . "  Total: " . $row_product['soft'] * 7 . "<br>";
                }
                if ($row_product['french'] > 0) {
                    // echo "<img src='https://fakeimg.pl/100x50/adb5bd/' class='card-img-top'>";
                    echo "french: " . $row_product['french'] . "  Total: " . $row_product['french'] * 30 . "<br>";
                }
                echo '</div>
                <div class="footer">
                    <span style="bold">Total Price: EGP ';
                echo $row_product['total'];
                echo '</span>
                </div>';
                echo '</div>';
            }
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    <script>
        async function updateStatus(e) {
            let staus = e.target.dataset.staus == "processing" ? "On Delivery" : "Delivered";
            let id = e.target.dataset.id;
            console.log(staus, id);
            fetch(`./controllers/changeOrderStatus.php?orderId=${id}&staus=${staus}`)
                .then(() => {
                    if (staus == "On Delivery")
                        e.target.parentElement.innerHTML = `
                        <td>${staus}<button data-status="${staus}" data-id="${id}"
                         class="btn btn-success ms-3" onclick="updateStatus(event)">Done</button></td>`
                    else
                        e.target.parentElement.innerHTML = `<td>${staus}</td>`
                })

        }
    </script>
</body>

</html>