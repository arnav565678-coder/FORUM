<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LET'S DISCUSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
        #ques{
            min-height: 433px;
        }
    </style>
</head>

<body>
    <?php
    include 'imp/header.php';
    include 'imp/dbconnect.php';
    ?>

    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
              //echo $row['category_id'];
              $title=$row['thread_title'];
              $desc=$row['thread_desc'];}





?>
    <?php
$showlalert="false";
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST'){
  $comment=$_POST['comment'];
  $login_id=$_POST['login_id'];
 // echo $comment;
 
$sql="INSERT INTO `comments` (`comment_content`, `timestamp`, `thread_id`, `user_id`) VALUES ('$comment', CURRENT_TIMESTAMP, '$id', '$login_id')";

//INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES (NULL, 'why is oop so imp?', 'why should i learn oop..is it very imp for placement purpose', '0', '2', CURRENT_TIMESTAMP);
$result=mysqli_query($conn,$sql);
$showlalert="true";
if($showlalert){
  echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations.!</strong> Your comment has been succesfully added.Thank You.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  }
}


?>


    <div class="container-fluid">
        <!-- Jumbotron -->
        <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
            <div class="text-center">

                <p>
                <h2><?php echo $title;?></h2>

                </p>

                <hr class="my-4" />

                <p>
                    <?php
  echo $desc;
  ?>
                </p>
               






            </div>
        </div>

    </div>

    <br>
    <br>




    <div class="container" id="ques">
        <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    $g=true;

    $row=mysqli_num_rows($result);

    
    if($row>0){
      $g=false;
      echo '<h2 class="py-3">Let us Discuss</h2>  ';
      
}
            while($row=mysqli_fetch_assoc($result)){
            //  $g=false;


              //echo $row['category_id'];
              //$title=$row['thread_title'];
              $comment=$row['comment_content'];
              $c_id=$row['comment_id'];
              $timestamp=$row['timestamp'];

              $t_u_id=$row['user_id'];
              $sql1="SELECT email FROM loginid WHERE login_id='$t_u_id'";
              $result1=mysqli_query($conn,$sql1);
              $row2=mysqli_fetch_assoc($result1);
               echo' <div class="d-flex align-items-center my-4">
                      <div class="flex-shrink-0">
                        <img src="user.png" alt="..." width="60px">
                      </div>

                      
                      <div class="flex-grow-1 ms-3">
                      <br>
                      <div class="container">
                      
                      <h5> <p class="font-weight-bold my-0">'.$row2['email'].' at '.$timestamp.'</p></h5>
                       '.$comment.'
                     
                      <br>
                      </div>
                      </div>
                    </div>'
              ;

            }

            if($g){
              echo "<h4><b>Be the first one to start a Thread.</b></h4>";
            }
            






if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo '
 

    
    <form action="'.$_SERVER["REQUEST_URI"].'" method="post">

  <div class="mb-3">
    <label for="comment" class="form-label">Do you like to comment?</label>
    <textarea class="form-control" id="comment" name="comment"></textarea>
  </div>

  <input type="hidden" name="login_id" value="'.$_SESSION["login_id"].'">

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<br>
';
}
else{
  echo '
  Please log in to give your insights<br>';
  
}

   
?>
        </div>
        <br>
    
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