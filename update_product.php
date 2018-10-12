<?php 
session_start();
if(!isset($_SESSION['isLogin'])){
  header('Location: http://localhost/webFinalProject/login.php');
}
include 'dbconnect.php';

if($_POST && isset($_GET['id'])){
    $user_id        = $_SESSION['user']['id'];
    $name           = $_POST['name'];
    $price          = $_POST['price'];
    $contact        = $_POST['contact'];
    $description    = $_POST['description'];        
    $modified       = date('Y-m-d H:i:s');
    $filename       = '';
    if($_FILES){
        $target_path = "uploads/";
        $filename = basename( $_FILES['image']['name']);
        $target_path = $target_path . $filename; 
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            //echo "The file ".  basename( $_FILES['image']['name']). " has been uploaded";
        } else{
            //echo "There was an error uploading the file, please try again!";
        }
    }

    if($filename!=''){
      $sql = "UPDATE products SET name =:name ,
            price =:price; 
            image =:image,
            contact =:contact,
            description =:description,
            modified =:modified
            WHERE id =:id AND user_id=:user_id";

            $query = $conn->prepare($sql);
            $query->bindParam(':id', $_GET['id']);
            $query->bindParam(':user_id', $user_id);
            $query->bindParam(':name', $name);
            $query->bindParam(':price', $price);
            $query->bindParam(':contact', $contact);
            $query->bindParam(':image', $filename);
            $query->bindParam(':description', $description);
            $query->bindParam(':modified', $modified);
            $query->execute();
    } else {
      $sql = "UPDATE products SET name =:name , price =:price,
            contact =:contact,
            description =:description,
            modified =:modified
            WHERE id =:id AND user_id=:user_id";
            
            $query = $conn->prepare($sql);
            $query->bindParam(':id', $_GET['id']);
            $query->bindParam(':user_id', $user_id);
            $query->bindParam(':name', $name);
            $query->bindParam(':price', $price);
            $query->bindParam(':contact', $contact);
            $query->bindParam(':description', $description);
            $query->bindParam(':modified', $modified);
            $query->execute();
    }
    
    

    $message = "product updated";
    header('Location: http://localhost/webFinalProject/user_products.php');
} else {
    $message = "Product value not found";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
          <link rel="stylesheet" href="css/bootstrap.css">
         <link rel="stylesheet" href="css/style.css">

          <script type="text/javascript" src="js/jquery.1.11.2.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>

    <body>           
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Product</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li ><a href="user_products.php"><i class="fa fa-home"></i> Home</a></li>
                 <li><a href="allusers.php"><i class="fa fa-flask"></i>Other Users</a></li>
                <li class="active"><a href="insert_product.php"><i class="fa fa-flask"></i>Insert product</a></li>                
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php"><i class="fa fa-link"></i>Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-link"></i>Logout</a></li>                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>

        <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-12">
                <?php echo $message; ?>
              </div> 
          </div>
        </div>

    </body>
</html>