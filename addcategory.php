<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>

  <!-- font awesome cdn link  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/addProduct.css">
</head>

<body>
  <?php
  $error = json_decode(@$_GET["errors"]);
  $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;'; #port number
  $user = 'root';
  $password = '';
  $conn = new PDO($dsn, $user, $password);
  ?>

  <div class="container w-50 mt-5 border rounded-3">
    <div class="row mt-4">

      <form class="row" method="post" action="addcategory2.php">

        <div class="col-11">
          <label for="name" class="form-label">category</label>
          <input type="text" class="form-control" id="name" name="bname">
          <?php
          if (isset($error->empty_name)) {
            echo "<p style='color:red'> please enter your category</p>";
          }
          ?>

        </div>



        <div class="col-11  btn-content">
          <button type="submit" class="btn btn-outline-primary btn1" id="submit">Save</button>

        </div>
      </form>
    </div>

  </div>

  <!-- font awesome cdn link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>