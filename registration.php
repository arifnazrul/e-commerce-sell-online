<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
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
			<form class="form-inline" action="login.php" method="post">  
			  <button type="submit" class="btn btn-default">Sign in </button> OR 
			 </form>
		</li>
 
       	<li>
	      	<form class="form-inline" action="registration.php" method="post" >
	      		<button type="submit" class="btn btn-primary"> Sign up</button>	
	      	</form>
      	</li>

	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3">
                    <h3> Registration Form </h1>
                    <form action="submit_registration.php" method="post" >

                        <div class="form-group">
                          <label for="fullname">Full Name</label>
                          <input type="text" required class="form-control" placeholder="Fullname" name="fullname"  id="fullname" onblur="usernameCheck()" onkeyup="usernameCheckAnother()"> <p id="uid" style="color:red"> </p><p id="uid2" style="color:green"> </p>
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" required class="form-control" placeholder="Email" name="email" type="email" id="email" onblur="mailCheck()"  onkeyup="mailCheckAnother()">  <p id="uid7" style="color:red"> </p> <p id="uid8" style="color:green"> </p>
                        </div>

                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" placeholder="Password" name="password" id="pid" onblur="passCheck()" onkeyup="passwordCheckAnother()">  <p id="uid3" style="color:red"> </p><p id="uid4" style="color:green"> </p>                         
                         </div>

                        <div class="form-group">
                          <label for="contact">Contact Number</label>
                          <input type="contact" required class="form-control"  name="contact" id="contact" placeholder="Contact no" onblur="contactNoCheck()"  onkeyup="contactNoCheckAnother()">  <p id="uid5" style="color:red"> </p> <p id="uid6" style="color:green"> </p>
                        </div>
                        
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
              </div>
            </div>
     </div>

     <script type="text/javascript">
     	   		
   		var pass_chk;
 		
   		 function usernameCheckAnother(){
            var x = document.getElementById("fullname");

            if(x.value.length < 8){               
                document.getElementById("uid").innerHTML="Leanth must be greater than 8";
            }

            if(x.value.length >= 8){
                document.getElementById("uid").innerHTML="";
            }            
    }

   		 function mailCheckAnother(){

                var x = document.getElementById("email"); 

                if (x.value!= null || x.value!= "") { 
                    document.getElementById("uid7").innerHTML=""; 
                }   

                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

                if(re.test(x.value)){
                      document.getElementById("uid7").innerHTML="";                                
                }else{
                      document.getElementById("uid7").innerHTML="Invalid Mail";                                 
                }
        }

        function passCheck(){
          
			pass_chk=document.getElementById("pid").value;
			var x = document.getElementById("pid");
			
			if(pass_chk.length<4)
                    {
                                
                        document.getElementById("uid3").innerHTML="Password must be greater than 4";
                        document.getElementById("uid6").innerHTML="";  
													
                    }
                    else
                    {
                        document.getElementById("uid3").innerHTML=""; 
                        document.getElementById("uid6").innerHTML="";                                       
                    }
   		 }


        function passwordCheckAnother(){

        	
            var x = document.getElementById("pid");

            pass_chk=document.getElementById("pid").value;

                 document.getElementById("uid5").innerHTML="";
                     
                    var numberExistenceCheck=new RegExp("[0-9]"); ;
                    var upperCaseCheck = new RegExp("[A-Z]");
                    var lowerCaseCheck = new RegExp("[a-z]"); 
                    if(lowerCaseCheck.test(pass_chk) && upperCaseCheck.test(pass_chk) && numberExistenceCheck.test(pass_chk))
                    {
                        document.getElementById("uid4").innerHTML="Strong password";                          
                    } 

                    else if(pass_chk!=""){
                        document.getElementById("uid4").innerHTML="Weak password";
                    }
            
               }
		

        function contactNoCheckAnother(){

        	var x = document.getElementById("contact");

            if(x.value.length < 11 || x.value.length >11 ) {
                
                document.getElementById("uid5").innerHTML="Please Enter Valid Contact Number";
            }else{
            	document.getElementById("uid5").innerHTML="";
            }
        }

     </script>

</body>
</html>