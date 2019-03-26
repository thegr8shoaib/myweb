 <?php




include('db_connect.php');

function dd($data){
  highlight_string("<?php\n " . var_export($data, true) . "?>");
  echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
  die();
}
$email = $title = $ingredients ='';
$errors = array('email' =>' ', 'title'=>'', 'ingredients'=>'' );

$myErros = [];

if (isset($_POST['submit'])) {
  //cheak Email
  if(empty ($_POST['email'])){
      $errors['email']='email is required <br/>';
      $myErros[] = 'email is required <br/>';
  } else {
      $email=$_POST['email'];
    if(!filter_var($email)){
      $errors['email']='email must a valid Email address';
      $myErros[] = 'email must a valid Email address';
    }
  }
  //cheak title
  if(empty ($_POST['title'])){
    $errors['title']= 'title is required <br/>';
    $myErros[] = "title is required";
  } else {
      $title=$_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $errors['title']='title must be letters and spaces only';

        $myErros[] = "title must be letters and space only";
      }
    }
//cheak ingredients
    if(empty ($_POST['ingredients'])){
    $errors['ingredients']='At least one Ingredient is required <br/>';}
      else {
      $ingredients =  $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
        $errors['ingredients']='ingredients must be a comma saprated list';

      }
    }

// if (count($myErros)) {
// 	echo "form not submited ";
// }else
//
// {
//   $email = mysqli_real_escape_string($conn,$_post['email']);
//   $title = mysqli_real_escape_string($conn,$_post['title']);
//   $ingredients = mysqli_real_escape_string($conn,$_post['ingredients']);
// $sql ="INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";
//
// //save to db and cheak data is saved?
//
// if (mysqli_query($conn,$sql)) {
//   header('location: index.php');
// }else {
//   echo 'querry error'. mysqli_error($conn);
// }
//
//
// }
//
//
// }
//  if($link === false){
//    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];


    $sql = "INSERT INTO pizzas (email, title, ingredients ) VALUES ('$email','$title','$ingredients')";
    if(mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
 <!DOCTYPE html>
 <html >
     <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">

<?php include('header.php'); ?>
<section class="container grey-text">
<h4 class="center">Add A Pizza</h4>
<form class="white" action="add.php" method="POST">
  <label for="email">Your Email:</label>
  <input type="email" name="email" value="<?php echo $email ?>" >
  <div class="red-text"><?php echo $errors['email']; ?> </div>
  <label for="email">Pizza title:</label>
  <input type="text" name="title" value="<?php echo $title ?>" >
  <div class="red-text"> <?php echo $errors['title']; ?> </div>
  <label for="Email">ingredients (comma Seprated):</label>
  <input type="text" name="ingredients" value="<?php echo $ingredients ?>"  >
  <div class="red-text">   <?php echo $errors['ingredients'];?> </div>
  <div class="center">
<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
  </div>

</form>
</section>
<?php include('footer.php'); ?>

 </html>
