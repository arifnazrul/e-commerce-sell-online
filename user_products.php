<?php 
    session_start();
    if(!isset($_SESSION['isLogin'])){
      header('Location: http://localhost/webFinalProject/login.php');
    }

    include 'dbconnect.php';

    $sql = "SELECT * FROM products where user_id=:user_id ORDER BY id DESC";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id',$_SESSION['user']['id']);
    $query->execute();
    $products = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
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
                <li><a href="allusers.php"><i class="fa fa-flask"></i>Other Users</a></li> 
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
                <h1 id="header">Product List</h1>
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price(Tk)</th>
                            <th>Contact</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($products)):
                        foreach ($products as $key => $value) {
                         ?>
                        <tr>
                            <td><?php echo $value['name']; ?></td>
                            <td>
                              <?php if($value['image']):?>
                              <img height="150" width="110" src="uploads/<?php echo $value['image']; ?>">
                              <?php else : echo 'No Image'; endif; ?>
                            </td>
                            <td><?php echo $value['price']; ?></td>
                            <td><?php echo $value['contact']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo $value['created']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_product_form.php?id=<?php echo $value['id']; ?>">Update</a>
                                <a class="btn btn-danger" href="remove_product.php?id=<?php echo $value['id']; ?>">Remove</a>
                            </td>
                        </tr>
                        <?php
                            }                         
                         endif;?>
                    
                    </tbody>
                </table>
              </div> 
          </div>
        </div>
</body>
</html>