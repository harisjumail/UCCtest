
<!doctype html>
<html lang="en">

 
<?php 

include('../config/declaration.php'); 
?>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>UCCTest </title>
  </head>
  <body>


<?php 
 
?>


<?php 

 // $a = "SELECT * FROM t_main"; 
//	$db->query($a);


?>

<div class="row">

<div class = "col-md-6">

<h4><a href= "<?php echo $base_url ?>public/index.php">  List Of Data </a> </h4>

<h4><a href= "<?php echo $base_url ?>public/index.php">  New Data </a> </h4>

    <table class="table">
  <thead class="thead-dark">


<?php 

 $content=file_get_contents("".$base_url."/api/read.php");

 $content=utf8_encode($content);

 $result=json_decode($content,true);


?>

  
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Engined Displacement</th>
      <th scope="col">Engined Power</th>
      <th scope="col">Price</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  <tbody>

  <?php 

 $no = 0;
 foreach ($result as $r) {
  
  $no++
  
  ?>


    <tr>
      <th scope="row"><?php echo $no ?></th>
      
      <td><a href="<?php echo $base_url; ?>public/index.php?ac=see&id=<?php echo $r['v_id'] ?>"><?php echo $r['v_id'] ?></a></td>
      <td><?php echo $r['v_nama'] ?></td>
      <td><?php echo $r['v_engined'] ?></td>
      <td><?php echo $r['v_enginep'] ?></td>
      <td><?php echo $r['v_price'] ?></td>
      <td><?php echo $r['v_location'] ?></td>
    </tr>

    <?php 
      }
    ?>
    
  </tbody>
</table>


</div>



<div class = "col-md-6">




<?php 

$ac = $_GET['ac'];
$id = $_GET['id'];

if($ac=="see"){

  

?>

<div id="edit">


<h4>Edited </h4>

<?php 

//get single id from api

$content=file_get_contents("".$base_url."/api/single_read.php?id=".$id."");

$content=utf8_encode($content);

$row=json_decode($content,true);


?>

    <form action = "<?php echo $base_url;?>public/index.php?ac=savechange"  method = "post">
    
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" name="id" value = "<?php echo $row['v_id']; ?>" placeholder="ID">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $row['v_nama']; ?>" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="name">Engine Displacement</label>
        <input type="text" class="form-control" id="engined" name="engined" value = "<?php echo $row['v_engined']; ?>" placeholder="displacement">
    </div>

    <div class="form-group">
        <label for="enginepower">Engine Power</label>
        <input type="text" class="form-control" id="enginep" name="enginep" value = "<?php echo $row['v_enginep']; ?>" placeholder="power">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" value = "<?php echo $row['v_price'];; ?>" placeholder="price">
    </div>


    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" value = "<?php echo $row['v_location']; ?>" name="location" placeholder="Name">
    </div>

    <button type="submit" name = "save" value = "savechange" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php  } else{//end if seee ?>


<div id="input">

<h4>Input </h4>

    <form action = "<?php echo $base_url;?>public/index.php?ac=save"  method = "post">
    
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" name="id" placeholder="ID">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="name">Engine Displacement</label>
        <input type="text" class="form-control" id="engined" name="engined" placeholder="displacement">
    </div>

    <div class="form-group">
        <label for="enginepower">Engine Power</label>
        <input type="text" class="form-control" id="enginep" name="enginep" placeholder="power">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="price">
    </div>


    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Name">
    </div>

    <button type="submit" name = "save" value = "save" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php } // end if else see ?>



    <?php 
    
        $ac = $_GET['ac'];
        $subac = $_POST['save'];

        if($ac == "save")
        {
            if($subac =="save"){

              
              $id = $_POST['id'];
              $name = $_POST['name'];
              $engined = $_POST['engined'];
              $enginep = $_POST['enginep'];
              $price = $_POST['price'];
              $location = $_POST['location'];
              

              //require_once(__ROOT__.'/api/create.php');
              
              include('../api/create.php');

              
              //redirect to index.php
              echo " <script type=\"text/javascript\">
              window.location.href = '".$base_url."public/index.php';
             </script>
              ";

                }

               

        }
        elseif($ac == "savechange")
        {
            if($subac =="savechange"){
              $id = $_POST['id'];
              $name = $_POST['name'];
              $engined = $_POST['engined'];
              $enginep = $_POST['enginep'];
              $price = $_POST['price'];
              $location = $_POST['location'];

             // $a = "UPDATE t_main 
               //     SET v_nama = '$name', v_engined = '$engined', v_enginep = '$enginep',
                 //   v_price = '$price',v_location = '$location' 
                 //   WHERE v_id = '$id' ";

              include('../api/create.php');

              $db->query($a);	

              //echo " <script type=\"text/javascript\">
              //window.location.href = '".$base_url."public/index.php';
              //</script>
              //";

          }

               

        }


    ?>

  </div>  

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php 

$db->close();

?>