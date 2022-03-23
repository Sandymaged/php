<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
<?php
$error=json_decode(@$_GET["errors"]);
  // var_dump($error);
   $old=json_decode(@$_GET["old"]);
   $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;'; #port number
  $user = 'root';
  $password = '';
  $conn = new PDO($dsn, $user, $password);
  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<h1  style="color: rebeccapurple; size: 50px; margin-left: 300px;">Add product</h1>
 <div class="container w-50 mt-5 border rounded-3">
      <div class="row mt-4">
    <form  method="post" enctype="multipart/form-data" action="validation.php" >


    <div class="col-11">
        <label class="form-label">Name of product</label>
        <input type="text" name="name" class="form-control"  value="<?php if (isset($old -> name)){echo $old -> name;}?>">
        <?php
        if(isset($error->empty_name))
        {
            echo"<p style='color:red'> please enter your product name </p>";
        }
        ?>
    </div>


        <br>
        <div class="col-11">
        <label class="form-label">price</label>
        <input type="number" name="price" class="form-control"  value="<?php if (isset($old -> price)){echo $old -> price;}?>">
        <?php
        if(isset($error->empty_price))
        {
            echo"<p style='color:red'> please enter your price</p>";
        }
        ?>
        </div>



        <br>
        <div class="col-11">
        <label  class="form-label" for="cat">Choose a category:</label>

<!-- <select name="cat" id="cat">
>

  <option value="hdrinks"> hot drinks</option>
  <option value="cdrinks">cold drinks</option> -->
  <select class="form-label" name="select" value="cat">
    <?php
 $select_query="select * from categories ";
 $stm=$conn->prepare($select_query);
 $resobj=$stm->execute();
 while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
  echo "<option>{$row["category_name"]}</option> ";
 }
 
    ?>
</select>

<a href="addcategory.php">add category</a>


        </div>
<br>


<div class="col-11">
        <label class="form-label">amount</label>
        <input type="number" name="amount"  class="form-control" value="<?php if (isset($old -> amount)){echo $old -> amount;}?>">
        <?php
        if(isset($error->empty_amount))
        {
            echo"<p style='color:red'> please enter your amount</p>";
        }
        ?>
        <br>
</div>


<div class="col-11">
        <label class="form-label">Please choose your image</label>
    <input type="file" name="photo" multiple accept="image/*" class="form-control"  >
    <br>
    <?php if(isset($error->empty_photo)){echo "<span style='color:red'> try invaild photo format </span> ";} ?><br>
</div>



    <div class="col-11  btn-content">
       <input type="submit"  class="btn btn-outline-primary btn1" value="submit"> 
    <input type="reset" class="btn btn-outline-primary btn2" >
    </div>
    
    </form>
      </div>
 </div>
    <?php  ?>
</body>
</html>