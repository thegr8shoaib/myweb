<?php

$Email = $title = $ingredients ='';
$errors = array('Email' => ' ','title'=> '','ingredients'=> '' );

if (isset($_POST['submit'])) {
  //cheak Email
  if(empty ($_POST['Email'])){
      $errors['Email']='Email is required <br/>';
  } else {
      $email=$_POST['Email'];
    if(!filter_var($email)){
      $errors['Email']='Email must a valid Email address';
    }
  }
  //cheak title
  if(empty ($_POST['title'])){
    $errors['title']= 'title is required <br/>';
  } else {
      $title =$_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $errors['title']='title must be letters and spaces only';
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
}
 ?>
 <!DOCTYPE html>
 <html >
     <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">

<?php include('header.php'); ?>
<section class="container grey-text">
<h4 class="center">Add A Pizza</h4>
<form class="white" action="add.php" method="POST">
  <label for="Email">Your Email:</label>
  <input type="email" name="Email" placeholder="Please Enter Your Email" value="<?php echo $Email ?>" >
  <div class="red-text"><?php echo $errors['Email']; ?> </div>
  <label for="Email">Pizza title:</label>
  <input type="text" name="title" placeholder="Please Enter Pizza Name" value="<?php echo $title ?>" >
  <div class="red-text"> <?php echo $errors['title']; ?> </div>
  <label for="Email">ingredients (comma Seprated):</label>
  <input type="text" name="ingredients" placeholder="Please Enter ingredients" value="<?php echo $ingredients?>" >
  <div class="red-text">   <?php echo $errors['ingredients'];?> </div>
  <div class="center">
<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
  </div>

</form>
</section>
<?php include('footer.php'); ?>

 </html>
