<?php
    session_start();
?>
<?php

    include 'includes/connection/db.php';

    if(isset($_POST['submit'])) {
        $prod_name = $_POST['product_name'];
        /*
            IDK how to make this work
            -- Error Messages --
            Warning: Undefined array key "product_img"
            Warning: Trying to access array offset on value of type null
            Fatal error: Uncaught ValueError: Path cannot be empty
        */
        // $prod_img = mysqli_real_escape_string($link, file_get_contents($_FILES['product_img']['tmp_name']));
        // $prod_img = addslashes(file_get_contents($_FILES['product_img']['tmp_name']));
        $prod_price = $_POST['product_price'];
        $prod_brief_info = $_POST['prod_bInfo'];
        $prod_desc = $_POST['product_desc'];
        $prod_content = $_POST['prod_contain'];
        $prod_presc = $_POST['prod_prescription'];

        $sql_query = "INSERT INTO products (product_name, product_briefinfo, product_description, product_price, product_contains, product_prescription) VALUES ('$prod_name','$prod_brief_info', '$prod_desc', '$prod_price', '$prod_content', '$prod_presc')";
        
        if(mysqli_query($link, $sql_query)) {
            ob_start();
            header("Location: products.php");
            ob_end_flush();
        } else {
            echo "ERROR: " . $sql_query . mysqli_error($link);
        }

    } else {
        echo "Error.";
    }
?>