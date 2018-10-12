<?php 
session_start();
if(!isset($_SESSION['isLogin'])){
  header('Location: http://localhost/webFinalProject/index.php');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>



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
              <div class="col-md-6 col-md-offset-3">
                <h3> Product Form </h1>
                    <form action="submit_product.php" method="post" enctype="multipart/form-data"> <br>
                       

                        <div class="dropdown">
                         <label for="category">Product category </label>                 
                           <select type="text" name="category" id="category">
                               <option value="cloths" name="cloths">Cloths</option>
                              <option value="mobile" name="mobile">Mobile</option>
                              <option value="accessories" name="accessories">Accessories</option>      
                           </select> 
                        </div><br>

                         <div class="form-group">
                          <label for="name">Product Name</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                        </div>

                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" name="image" id="image" placeholder="image">
                        </div>
                        

                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                                                
                      
                        <div class="form-group">
                          <label for="contact">Contact Number</label>
                          <input type="contact" required class="form-control"  name="contact" id="contact" placeholder="Contact no" onblur="contactNoCheck()"  onkeyup="contactNoCheckAnother()">  <p id="uid5" style="color:red"> </p> <p id="uid6" style="color:green"> </p>
                        </div>

                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
              </div> 
          </div>
        </div>

    </body>
    
          <script type="text/javascript">
            function contactNoCheckAnother(){

                    var x = document.getElementById("contact");

                      if(x.value.length < 11 || x.value.length >11 ) {
                          
                          document.getElementById("uid5").innerHTML="Please Enter Valid Contact Number";
                      }else{
                        document.getElementById("uid5").innerHTML="";
                      }
                  }
</script>
</html>