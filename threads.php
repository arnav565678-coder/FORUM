<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <style>
        #ques{
            min-height: 433px;
        }
    </style>
    <title>LET'S DISCUSS</title>
</head>

<body>
    <?php
    include 'imp/header.php';
    include 'imp/dbconnect.php';
    ?>

    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
              //echo $row['category_id'];
              $cat_name=$row['category_name'];
              $cat_desc=$row['category_description'];}





?>


<?php
$showlalert="false";
$method=$_SERVER['REQUEST_METHOD'];
IF($method=='POST'){
  $th_title=$_POST['title'];
  $th_desc=$_POST['desc'];
  $login_id=$_POST['login_id'];
 

$sql="INSERT INTO `threads` (`thread_title`, `thread_desc`,`thread_user_id`,`thread_cat_id`,`timestamp`) VALUES ('$th_title', '$th_desc','$login_id','$id',CURRENT_TIMESTAMP)";
//INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES (NULL, 'why is oop so imp?', 'why should i learn oop..is it very imp for placement purpose', '0', '2', CURRENT_TIMESTAMP);
$result=mysqli_query($conn,$sql);
$showlalert="true";
if($showlalert){
  echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations.!</strong> Your Question has been succesfully added,Hope your query gets solved soon.Thank You.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  }
}


?>










    <div class="container-fluid">
        <!-- Jumbotron -->
        <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
            <div class="text-center">
                <h2>Welcome to <?php echo $cat_name?> Forum</h2>
                <p>
                    <?php echo $cat_desc?>

                </p>

                <hr class="my-4" />

                <p>
                <ul>
                    <li>No Spam / Advertising / Self-promote in the forums.</li>
                    <li>Do not post copyright-infringing material.</li>
                    <li>Do not post “offensive” posts, links or images.</li>
                    <li>Remain respectful of other members at all times.</li>
                </ul>

                </p>

                <a href="https://opentuition.com/forums/forum-rules/" class="btn btn-info" role="button">Learn more</a>




            </div>
        </div>

    </div>



    <div class="container my-3" id="ques">


<br>


        <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
    $result=mysqli_query($conn,$sql);
    $g=true;

    $row=mysqli_num_rows($result);

    
    if($row>0){
      $g=false;
      echo '<h2 class="py-3">Browse Questions</h2>  ';
      
}
            while($row=mysqli_fetch_assoc($result)){
            //  $g=false;


              //echo $row['category_id'];
              $title=$row['thread_title'];
              $desc=$row['thread_desc'];
              $t_id=$row['thread_id'];
              $timestamp=$row['timestamp'];
              $t_u_id=$row['thread_user_id'];
              $sql1="SELECT email FROM loginid WHERE login_id='$t_u_id'";
              $result1=mysqli_query($conn,$sql1);
              $row2=mysqli_fetch_assoc($result1);
              
               echo' <div class="d-flex align-items-center my-4">
                      <div class="flex-shrink-0">
                        <img src="user.png" alt="..." width="60px">
                      </div>
                      

                      
                      <div class="flex-grow-1 ms-3">
                      <h6> <p class="font-weight-bold my-0">'.$row2['email'].' at '.$timestamp.'</p></h6>
                      <h4 class="mt-0" >'.$title.'</h4>
                        '.$desc.'
                        <br>

                        <br>
                       
                        <a href="comments.php?threadid='.$t_id.'" class="btn btn-info" role="button">Check Discussion</a>
                      </div>
                    </div>
                    <br>'
                    
              ;

            }

            if($g){
              echo "<h4><b>Be the first one to start a thread...</b></h4>";
            }
            






    ?>


<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

echo '
<div class="container-fluid">
        
        <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
            <div class="text-center">
              

<form action="'.$_SERVER["REQUEST_URI"].'"  method="post">
  <div class="mb-3">
    <label for="title" class="form-label"><b>Please enter your question.</b></label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
    <div id="emailHelp" class="form-text">Hope your query gets resolved.</div>
  </div>
 
  <div class="mb-3"">
    <label for="desc" class="form-label"><b>Elaborate your concern in detail</b></label>
    <textarea class="form-control" id="desc" name="desc"></textarea>
  </div>
  <input type="hidden" name="login_id" value="'.$_SESSION["login_id"].'">

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                
                
              
            </div>
        </div>

    </div>



          </div>';}
          else{
            echo "Please Log in to add your query.";

          }
          ?>
          </div>

    <?php
    include 'imp/footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>