<?php




include('db_connect.php');

$sql="SELECT * FROM `pizzas` ORDER BY `pizzas`.`created` DESC";
$result = mysqli_query($conn,$sql);


$sql="SELECT * FROM  `pizzas` ";
$result=mysqli_query($conn,$sql);

// Fetch all
$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);


// Free result set
mysqli_free_result($result);

mysqli_close($conn);

 ?>


<!DOCTYPE html>
<html>
<link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">

<?php include('header.php'); ?>
<h4 class="center grey_text"> Pizzas! </h4>
<div class="container">
  <div class="row">
    <?php foreach ($pizzas as $pizza) : ?>
    <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <h6>
            <?php echo ($pizza['title']); ?>
           </h6>
             <h6>
               <?php $inc = explode(',',$pizza['ingredients']);?>
              <ul>
              <?php foreach ($inc as $key => $value): ?>
                <li>
                <?php echo $value ?>
                </li>
              <?php endforeach; ?>
              </ul>
            </h6>
           </div>
             <div class="card-action right-align">
                <a class="brand-text" href="#"> More info </a>
        </div>
      </div>
    </div>
    <?php  endforeach; ?>
    <?php if(count($pizzas) >= 3){ ?>
      <p>there are 3 or more pizzas</p>
      </<?php }else{ ?>
        <p>there are less then 3 pizzas</p>
      <?php } ?>
  </div>
</div>
<?php include('footer.php'); ?>
</html>
