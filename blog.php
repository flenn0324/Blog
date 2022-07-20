<?php
session_start();
if (isset($_SESSION['login']) /*&& $_SESSION['fname']=="zakaria"*/) {
  $fname= $_SESSION['fname'];
  $lname= $_SESSION['lname'];
}
else
{
  header("location:login.php"); }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Les DZ à Sidi Abdellah - Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script -->
	<script type="text/javascript">
        $(document).ready(function () {

            $("#create").click(function () {

                title = $("#title").val();
                post = $("#post").val();

                $.ajax({
                    type: "POST",
                    url: "addpost.php",
                    data: "title=" + title + "&post=" + post ,
                    success: function (html) {
                        if (html == 'true') {

                            window.alert("thank you , your post was created , Press Ok to see it !");
                            window.location.href="blog.php";

                        } else if (html == 'title') {
                          window.alert("Title is too short !!");                    

                        } else if (html == 'post') {
                          window.alert("Post is too short !!");  

                        } else if (html == 'false') {
                          window.alert("your post was not created, try again please");;                    
                        } 
                    },
                    /*beforeSend: function () {
                        //$("#add_err2").html("loading...");
                        window.alert("Loading !!");
                    }*/
                });
                return false;
            });
        });
    </script>
    

</head>

<body>

    <div class="brand">Les DZ à Sidi Abdellah</div>
    <div class="address-bar">B 10 N 20 | ZERALDA, SIDI ABDELLAH | ALGER , ALGERIE</div>

    <!-- Navigation -->
    <?php require_once "nav.php"?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                  <h2 class="text-center">WELCOME <?php echo " $fname"; echo " "; echo"$lname";?> - <a href="logout.php">logout</a> </h2> 
                    
                    <hr>
                    <h2 class="intro-text text-center">Our
                        <strong>blog</strong>
                    </h2>
                    <hr>

                    <div class="col-lg-12 text-center">
                      <p style="font-size : 20px;">You want to create your own post ? Click here
                      <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal">Create Post</button></p>
                    </div>
                    
                </div>

                <?php 
                require_once "database.php";
                $sql = "SELECT idp, title, post, create_date,id FROM Posts";
                $result = mysqli_query($mysqli, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $id=$row["id"];
                    $sql2 = "SELECT firstname , lastname FROM MyGuests WHERE id=$id ";
                    $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
                    $row2=mysqli_fetch_array($result2);
                    $name=$row2["firstname"];
                    $lastname=$row2["lastname"];
                ?>
                   <div class="col-lg-12 text-center">
                    <h2> <?php echo $row["title"] ; ?>
                        <br>
                        <small> <?php echo $row["create_date"] ; echo " -  "; echo "By : "; echo " $name"; echo " "; echo"$lastname";?> </small>
                    </h2>
                    <p><?php echo $row["post"] ;?></p>
                    <hr>
                </div>
                <?php 
                  }
                }
                else{
                   echo "0 results";
                }
                ?>


                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Older</a>
                        </li>
                        <li class="next"><a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Modal 1 -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">NEW POST</h4>
		  </div>
		  <div class="modal-body">
			<form role="form">
        <div class="row">
          <div class="form-group col-lg-6">
            <label> Title</label>
            <input type="text" id="title" name="title" class="form-control" maxlength="250">
          </div>
                
          <div class="form-group col-lg-12">
            <label>Post</label>
            <textarea class="form-control" id="post" name="post" ></textarea>
          </div>
        </div>
      </form>
		  </div>
		  <div class="modal-footer">
      <button type="submit" id="create" class="btn btn-default">Create</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  </div>
		</div>

	  </div>
	</div>
	


  <?php require_once "footer.php" ?>

</body>

</html>

