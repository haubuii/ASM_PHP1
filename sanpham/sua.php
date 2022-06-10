<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thêm Sản phẩm</title>
</head>
<style>
    .product_container_input {
        width: 50%;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: auto;
        margin-top: 30px;
    }
    .form_group {
        margin-top: 20px;
    }
    .btn_them {
        width: 100%;
        margin-top: 40px;
    }
    .card-header {
        text-align: center;
        background-color: #343a40;
        color: #fff;
    }
    .err {
        color: red;
    }
</style>
<?php
    $connect = mysqli_connect("localhost", "root", "", "fptphp1");
    $sql_category = "SELECT * FROM category";
    $query_category = mysqli_query($connect, $sql_category);

    $id = $_GET['id'];
    $sql_update = "SELECT * FROM product WHERE product_id = $id";
    $query_update = mysqli_query($connect, $sql_update);
    $row_update = mysqli_fetch_assoc($query_update);

    include_once 'sanpham/validation_product.php';

    if(isset($_POST['btn_them']) && empty($errors)){
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];
        $sale = $_POST['product_sale'];
        $status = $_POST['product_status'];
        $category_id = $_POST['category_id'];
        
        $sql_insert = "UPDATE product SET product_name = '$name', product_description = '$description', product_price = '$price', product_image = '$image', product_sale = '$sale', product_status = '$status', category_id = '$category_id' WHERE product_id = $id";
        $query_insert = mysqli_query($connect, $sql_insert);
        $query = mysqli_query($connect, $sql_insert);
        header('location: index.php?page_layout=danhsach');
    }
?>
<body>
    <div class="product_container_input">
        <div class="card">
            <h2 class="card-header">Update thông tin sản phẩm</h2>
            <div class="card-body">
                <form action="" method ="POST" enctype="multipart/form-data" >
                    <div class="form_group">
                        <label for="product_name">Tên sản phẩm</label>
                        <input type="text" name = "product_name" class="form-control" value = "<?php  echo $row_update['product_name']?>">
                        <span class="err">
                            <?php
                                if (isset($errors['product_name']['required'])) {
                                    echo $errors['product_name']['required'];
                                }
                                if (isset($errors['product_name']['min'])) {
                                    echo $errors['product_name']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form_group">
                        <label for="product_description">Mô tả</label>
                        <input type="text" name = "product_description" class="form-control" value = "<?php echo $row_update['product_description']?>">
                        <span class="err">
                            <?php
                                if (isset($errors['product_description']['required'])) {
                                    echo $errors['product_description']['required'];
                                }
                                if (isset($errors['product_description']['min'])) {
                                    echo $errors['product_description']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form_group">
                        <label for="product_price">Giá</label>
                        <input type="text" name = "product_price" class="form-control" value = "<?php echo $row_update['product_price']?>">
                        <span class="err">
                            <?php
                                if (isset($errors['product_price']['required'])) {
                                    echo $errors['product_price']['required'];
                                }
                                if (isset($errors['product_price']['min'])) {
                                    echo $errors['product_price']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form_group">
                        <label for="product_image">Ảnh</label>
                        <input type="text" name = "product_image" class="form-control" value = "<?php echo $row_update['product_image']?>">
                        <span class="err">
                            <?php
                                if (isset($errors['product_image']['required'])) {
                                    echo $errors['product_image']['required'];
                                }
                                if (isset($errors['product_image']['min'])) {
                                    echo $errors['product_image']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form_group">
                        <label for="product_sale">Giá khuyến mãi</label>
                        <input type="text" name = "product_sale" class="form-control" value = "<?php echo $row_update['product_sale']?>">
                        <span class="err">
                            <?php
                                if (isset($errors['product_sale']['required'])) {
                                    echo $errors['product_sale']['required'];
                                }
                                if (isset($errors['product_sale']['min'])) {
                                    echo $errors['product_sale']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form_group">
                        <label for="product_status">Trạng thái</label>
                        <input type="text" name = "product_status" class="form-control" value = "<?php echo $row_update['product_status']?>">
                        <span class="err">
                            <?php
                                if (isset($errors['product_status']['required'])) {
                                    echo $errors['product_status']['required'];
                                }
                                if (isset($errors['product_status']['min'])) {
                                    echo $errors['product_status']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form_group">
                        <label for="category_id">Mã Loại</label>
                        <select name="category_id" class = "form-control" id="">
                            <?php
                                while ($row_category = mysqli_fetch_array($query_category)) { ?>
                                    <option value="<?php echo $row_category['category_id']?>"><?php echo $row_category['category_name']?></option>;
                                <?php } ?>
                           
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-dark btn_them" name="btn_them">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>