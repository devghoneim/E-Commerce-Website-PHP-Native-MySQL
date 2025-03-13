<div class="d-flex justify-content-end mr-3">
    <a href="?addpro" class="btn btn-success">Add Product</a>
</div>

<?php
$select = "SELECT * from products WHERE vendorID =" . $_SESSION["userID"];
$result = $con->query($select);
$num = $result->num_rows;

if ($num > 0) {
?>
    <h2 class="text-center p-3">Products</h2>
    <div class="table-responsive px-3">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Count</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Views</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1; // عداد لتحديد كل كاروسيل
                while ($row_product = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?= $row_product["id"] ?></th>
                        <td><?= $row_product["name"] ?></td>
                        <td><?php $result_brand = $con -> query("select name from brand WHERE id =" . $row_product["brand"]);
                        $row_brand = $result_brand->fetch_assoc();
                        echo $row_brand['name'] ?></td>
                        <td><?php $result_category = $con -> query("select name from category WHERE id =" . $row_product["cat"]);
                        $row_category = $result_category->fetch_assoc();
                        echo $row_category['name'] ?> </td>
                        <td><?= $row_product["count"] ?></td>
                        <td><?= $row_product["price"] ?></td>
                        <td style="width:130px; height:100px; text-align:center;">
                            <?php
                            $result_images = $con->query("SELECT * FROM imgepro WHERE productID = " . $row_product["id"]);
                            $num_images = $result_images->num_rows;
                            echo $num_images;
                            ?>
                            <div id="carouselExample<?= $x ?>" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $imageIndex = 1; // عداد لتحديد الصورة النشطة
                                    while ($row_imgage = $result_images->fetch_assoc()) {
                                    ?>
                                        <div class="carousel-item <?= $imageIndex == 1 ? "active" : "" ?>">
                                            <img src="img/<?= $row_imgage["name"] ?>" class="d-block w-100">
                                        </div>
                                    <?php
                                        $imageIndex++;
                                    }
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample<?= $x ?>" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample<?= $x ?>" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </td>
                        <td><?= $row_product["description"] ?></td>
                        <td><?= $row_product["veiws"] ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning mb-1" href="?editpro=<?= $row_product["id"] ?>">Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $row_product['id'] ?>">Delete</button>
                            <div class="modal fade" id="exampleModal<?= $row_product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $row_product['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel<?= $row_product['id'] ?>">Are you sure?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $row_product['name'] ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a class="btn btn-danger" href="functions/remove.php?id=<?= $row_product['id'] ?>&f=product">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                    $x++; // زيادة عداد الكاروسيل
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
?>
    <div class="alert alert-danger text-center" role="alert">
        <?= "No Products" ?>
    </div>
<?php
}
?>
