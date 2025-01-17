<?php
session_start();
if ($_SESSION['loggedin']) {
} else {
    header("location:registerlogin.php");
}
include 'includes/connection/db.php';
?>

<html>

<head>
    <title>TorioRx Pharmacy | Products</title>
    <?php include('includes/main/header.php'); ?>

    <?php include('includes/main/products_header.php'); ?>

    <?php include("../Admin/includes/main/products_style.php"); ?>

</head>

<body style="font-family: Poppins;">

    <!-- navbar -->
    <?php include('includes/main/navbar.php'); ?>

    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">TorioRx Pharmacy - Products</h1>
            <br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="search" style="display: inline-block;">
            <div class="input-group-append" style="float: right;">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Product Entry</h4>
                </div>
                <div class="modal-body">
                    <form action="product_add.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_name">Name of Product</label>
                            <input type="text" class="form-control" name="product_name" id="exampleFormControlInput1" placeholder="Biogesic">
                        </div>
                        <div class="form-group">
                            <label for="product_img">Product Image</label>
                            <input type="file" class="form-control-file" name="product_img" id="product_img">
                        </div>
                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <div class="input-group">
                                <span class="input-group-addon">PhP</span>
                                <input type="text" name="product_price" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prod_bInfo">Brief Info</label>
                            <input type="text" class="form-control" name="prod_bInfo" id="exampleFormControlInput1" placeholder="Relief and care for headache and fever">
                        </div>
                        <div class="form-group">
                            <label for="product_desc">Main Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="product_desc" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prod_contain">Product Content</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="prod_contain" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prod_prescription">Intake Interval</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="prod_prescription" rows="2"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-default">Add to List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <ul class="cards" id="myUL">
        <?php  
            $sql = "SELECT * FROM products";
            $query = mysqli_query($link, $sql); 
            while ($row = mysqli_fetch_array($query)) {
        ?>
        <li>
                <?php print '<a  href="viewproduct.php?product_id=' . $row['product_id'] . '" class="card">'; ?>
                <?php print '<img src="data:image/png;base64,' . base64_encode($row['product_image']). '" class="card__image" alt="" />'; ?>
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <div class="card__header-text">
                            <h3 class="card__title"><?php print $row['product_name']; ?></h3>
                            <span class="card__status"><?php print $row['product_briefinfo']; ?></span>
                        </div>
                    </div>
                    <button type="button" style="margin-left: 2em; margin-bottom: 2em;">More Details</button>
                </div>
            </a>
        </li>
        <?php }?>         
    </ul>

    <?php include("../Customer/includes/main/products_search.php"); ?>

    <!-- footer -->
    <?php include('includes/main/footer.php'); ?>
</body>

</html>