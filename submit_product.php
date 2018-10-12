<?php 
session_start();
if(!isset($_SESSION['isLogin'])){
  header('Location: http://localhost/webFinalProject/index.php');
}
include 'dbconnect.php';

if($_POST){
    $user_id        = $_SESSION['user']['id'];
    $name           = $_POST['name'];
    $category       = $_POST['category'];
    $contact        = $_POST['contact'];
    $price          = $_POST['price'];
    $description    = $_POST['description'];    
    $created        = date('Y-m-d H:i:s');
    $modified       = date('Y-m-d H:i:s');
    $filename       = '';

   
    if($_FILES){
        $target_path = "uploads/";
        $filename = basename( $_FILES['image']['name']);
        $target_path = $target_path . $filename; 
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            echo "The file ".  basename( $_FILES['image']['name']). " has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }

    $sql = "INSERT into products (user_id, name, category, price, image,contact, description, created, modified)
            VALUES(:user_id, :name, :category, :price, :image, :contact, :description, :created, :modified)";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id', $user_id);
    $query->bindParam(':name', $name);
    $query->bindParam(':category', $category);
    $query->bindParam(':image', $filename);
    $query->bindParam(':contact', $contact);
    $query->bindParam(':price', $price);
    $query->bindParam(':description', $description);
    $query->bindParam(':created', $created);
    $query->bindParam(':modified', $modified);
    $query->execute();

    $message = "new product added";

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
                <li class="active"><a href="user_products.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="insert_product.php"><i class="fa fa-flask"></i>Insert product</a></li>                
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
                <?php echo $message;
                 header('Location: http://localhost/webFinalProject/user_products.php');
                 ?>

              </div> 
          </div>
        </div>
</body>
</html>