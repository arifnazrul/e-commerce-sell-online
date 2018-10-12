<?php
	session_start();
	if(!isset($_SESSION['isLogin'])){
	  header('Location: http://localhost/webFinalProject/login.php');
	}

	include 'dbconnect.php';


   $sql = "SELECT fullname, email, contact_no, address  FROM users where id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id',$_SESSION['user']['id']);
    $query->execute();
    $users = $query->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
               
                        <ul class="list-group"> 

                            <?php if(!empty($users)):
                             //foreach ($users as $key => $value) {
                            ?> 
                            <li class="list-group-item list-group-item-info"><?php echo $users['fullname']; ?></li>
                            <li class="list-group-item list-group-item-success"><?php echo $users['email']; ?></li>
                            <li class="list-group-item list-group-item-warning"><?php echo $users['contact_no']; ?></li>
                            <li class="list-group-item list-group-item"><?php echo $users['address']; ?></li>
                              
                        </ul>
                       <?php
                           // }                         
                         endif;?> 
              </div> 
          </div>
        </div>
</body>
</html>