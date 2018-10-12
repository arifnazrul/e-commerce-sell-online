<?php 
session_start();
if(!isset($_SESSION['isLogin'])){
  header('Location: http://localhost/webFinalProject/login.php');
}
include 'dbconnect.php';
if($_GET['id']){
  $product_id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE user_id=:user_id AND id=:id";
  $query = $conn->prepare($sql);
  $query->bindParam(':user_id',$_SESSION['user']['id']);
  $query->bindParam(':id',$product_id);
  $query->execute();
  $product = $query->fetch();
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
                <h3> Product Update Form </h1>
                  <?php if(!empty($product)): ?>
                    <form action="update_product.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <input value="<?php echo $product['name'];?>" type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                        </div>

                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" name="image" id="image" placeholder="image">
                        </div>
                        
                        <div class="form-group">
                          <label for="price">Price</label>
                          <textarea name="price" id="price" class="form-control" placeholder="Price"><?php echo $product['price'];?></textarea>
                        </div>
                        

                        <div class="form-group">
                          <label for="contact">Contact</label>
                          <textarea name="contact" id="contact" class="form-control" placeholder="Contact No"><?php echo $product['contact'];?></textarea>
                        </div>
                        

                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea name="description" id="description" class="form-control" placeholder="Description"><?php echo $product['name'];?></textarea>
                        </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                  <?php endif; ?>
              </div> 
          </div>
        </div>

    </body>
</html>