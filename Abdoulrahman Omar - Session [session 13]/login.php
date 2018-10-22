<?php
include 'templates/header.php';



if (isset($_GET['sal'], $_GET['bon'],$_GET['deduction'])) {
    $salary = filter_var($_GET['sal'], FILTER_SANITIZE_NUMBER_INT);
    $bonus = filter_var($_GET['bon'], FILTER_SANITIZE_NUMBER_INT);
    $deduction = filter_var($_GET['deduction'], FILTER_SANITIZE_NUMBER_INT);


    if(empty($salary)) {
        $errors[] = 'Please Enter User Salary';
    }
    if(!is_numeric($salary)){
        $errors[] = 'please Enter numeric value in salary';
    }
    if(!is_numeric($bonus)){
        $errors[] = 'please Enter numeric value in bonus';
    }
    if(!is_numeric($deduction)){
        $errors[] = 'please Enter numeric value in deduction';
    }
    if(empty($bonus)){
        $bonus = 0;
    }
    if(empty($deduction)){
        $deduction = 0;
    }
    if(strlen($salary)>5){
        $errors[] = 'too Big Number';
    }
    if(strlen($bonus)>3){
        $errors[] = 'too Big Number';
    }
    if(strlen($salary)>2){
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
            echo ($salary+$bonus)-$deduction . '$';
            ?>
    
            </div>
            <?php
            }
            ?>

            <form method="get" action="<?php echo($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="number"
                           class="form-control"
                           placeholder="slary"
                           autocomplete="off"
                           value="<?php if(isset($_GET['sal'])) echo $_GET['sal']; ?>"
                           name="sal">
                </div>
                <div class="form-group">
                    <label for="">Bonus</label>
                    <input type="number"
                           class="form-control"
                           placeholder="00000"
                           autocomplete="off"
                           name="bon">
                </div>
                <div class="form-group">
                    <label for="">Deduction</label>
                    <input type="number"
                           class="form-control"
                           placeholder="00000"
                           autocomplete="off"
                           name="deduction">
                </div>
                <input type="submit" class="btn btn-success" name="submit">
            </form>
        </div>
    </div>

<?php include 'templates/footer.php'; ?>
