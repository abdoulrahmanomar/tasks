<?php
include 'templates/header.php';



if (isset($_GET['pro'], $_GET['qty'],$_GET['pri'])) {
    $pro= filter_var($_GET['pro'], FILTER_SANITIZE_STRING);
    $qty = filter_var($_GET['qty'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_GET['pri'], FILTER_SANITIZE_NUMBER_INT);


    if(empty($pro)) {
        $errors[] = 'Please Enter Product name';
    }
    if(empty($qty)){
        $errors[] = 'Please Enter Quantity';
    }
    if(empty($price)){
        $errors[] = 'Please Enter Price';
    }
    if(!is_numeric($qty)){
        $errors[] = 'please Enter numeric value in Quantity';
    }
    if(!is_numeric($price)){
        $errors[] = 'please Enter numeric value Price';
    }
   
    if(strlen($price)>6){
        $errors[] = 'too Big Number';
    }
    if(strlen($qty)>3){
        $errors[] = 'too Big Number';
    }
    
   

    

}


?>

    <div class="container">
        <div class="content center-block">
<?php  if(isset($errors))
                {?>
            <div class="alert alert-danger">
                <?php  
               
                    foreach($errors as $error)
                    {
                        echo $error . '<br>';
                    }

                
             ?>
            </div>
            <?php }?>
            <?php if(empty($errors)) {
                  ?>
            <div class="alert alert-success">
            <?php
            echo 'you Ordered'.'   '.$pro.'  '.'and total Price is'.'  '.$price * $qty;
            ?>
    
            </div>
            <?php
            }
            ?>

            <form method="get" action="<?php echo($_SERVER["PHP_SELF"]);?>">
                <div class="form-group col-lg-4">
                    <label for="">product NAme</label>
                    <input type="text"
                           class="form-control"
                           placeholder="product Name"
                           autocomplete="off"
                           value="<?php if(isset($_GET['pro'])) echo $_GET['pro']; ?>"
                           name="pro">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Quantity</label>
                    <input type="number"
                           class="form-control"
                           placeholder="quantity"
                           autocomplete="off"
                           name="qty"
                           value="<?php if(isset($_GET['qty'])) echo $_GET['qty']; ?>">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Price</label>
                    <input type="number"
                           class="form-control"
                           placeholder="price"
                           autocomplete="off"
                           name="pri"
                           value="<?php if(isset($_GET['pri'])) echo $_GET['pri']; ?>">
                </div>
              <div class="form-group">

                <input type="submit" class="btn btn-success btn-block" name="submit">
            </div>
            </form>
        </div>
    </div>

<?php include 'templates/footer.php'; ?>
