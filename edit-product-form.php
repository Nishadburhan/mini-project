<!-- Header:start -->
<?php include_once "includes/header.inc.php";?>
<!-- Header:end -->
<div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-4">
                <?php
                  // Include config file
                  require_once "config/db.php";
                  if(isset($_POST['submit'])) {
                    $name=trim($_POST["product_name"]);
                    $description=trim($_POST['product_description']);
                    $price=trim($_POST['product_price']);

                    if(!empty($name) && !empty($price)) {
                        $query="UPDATE products SET name='$name', description='$description', price='$price' WHERE id=".$_GET['id'];
                        if (mysqli_query($link, $query)) {
                            echo "Product successfully updated!";
                        } else {
                            echo "Error: " . $query . "<br>" . mysqli_error($link);
                        }
                    }

                }
                  $query = "SELECT * FROM products where id=".$_GET['id'];
                  $result = mysqli_query($link, $query);
                  $row=mysqli_fetch_assoc($result);

                  mysqli_close($link);
                  
                ?>
                <!-- Form -->
                <form class="form-example" action="" method="post">
                    <h1>Update Product</h1>
                    <!-- Input fields -->
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" value="<?php echo $row['name']?>" placeholder="Enter product name here..." name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="product_description">Description:</label>
                        <textarea class="form-control" id="product_description" placeholder="Enter Description..." name="product_description"><?php echo $row['description']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price:</label>
                        <input type="text" class="form-control" id="product_price" value="<?php echo $row['price']?>" placeholder="Enter price here..." name="product_price" required>
                    </div>
                    <div class='mt-100'>&nbsp;</div>
                    <button type="submit" class="btn btn-primary btn-customized" name="submit">Update</button>
                    <!-- End input fields -->
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
<!-- footer:start -->
<?php include_once "includes/footer.inc.php";?>
<!-- footer:end -->