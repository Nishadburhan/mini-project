<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-4">
            <h1>Products</h1>
            <a href="add-product-form.php" class="btn btn-primary">Add news +</a></br>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Include config file
                        require_once "config/db.php";

                        $query="SELECT * FROM products";
                        $result = mysqli_query($link, $query);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            $i=1;
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                        
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td>
                                            <h5><?php echo $row['name'];?></h5>
                                            <p><?php echo $row['description'];?></p>
                                        </td>
                                        <td><?php echo $row['price'];?></td>
                                        <td>
                                            <a href="edit-product-form.php?id=<?php echo $row["id"];?>" class="btn btn-warning btn-sm">Edit<a>
                                            <a href="delete-product.php?id=<?php echo $row["id"];?>" class="btn btn-danger btn-sm">Delete<a>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        } else {
                        echo "0 products";
                        }
                        mysqli_close($link);
                    ?>
                    
                </tbody>
              </table>            
        </div>
    </div>
</div>