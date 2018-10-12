<?php
include 'dbconnect.php';

$sql="SELECT name, image, price, contact, description FROM products where category='mobile' ORDER BY id DESC";

$query=$conn->prepare($sql);
$query->execute();

$products=$query->fetchAll();


?>


<!DOCTYPE html>
<html>
<head>
	<title>Web Final Project</title>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <script type="text/javascript" src="js/jquery.1.11.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <!--  <span class="sr-only">Toggle navigation</span> -->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Product</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>

          </ul>
      
          <ul class="nav navbar-nav navbar-right">
    
     
            <li>
              <form class="form-inline" action="login.php" method="post" >
                <button type="submit" class="btn btn-danger">Post your add</button>  
              </form>
            </li>
     
            
     
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
        

    <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-12">
                <h1 id="header">Product List</h1>
                <div class="dropdown">
                    <label for="category"> Product category </label>                 
                        <select type="text" name="category" id="category" onchange="location = this.options[this.selectedIndex].value;">
                           

                            <option value="mobile.php" name="mobile">Mobile</option>
                            <option value="accessories.php" name="accessories">Accessories</option>
                            <option value="index.php" name="cloths">All</option>
                             <option value="cloths.php" name="cloths">Cloths</option>
                             
                             

                        </select> 
                </div>


                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Contact Number</th>
                            <th>Description</th>
                           
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
                    
                        </tr>
                        <?php
                            }                         
                         endif; ?>
                    
                    </tbody>
                </table>
              </div> 
          </div>
        </div>
</body>

</html>