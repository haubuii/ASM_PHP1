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
    .err{
        color: red;
    }
</style>
<?php
    $connect = mysqli_connect("localhost", "root", "", "fptphp1");
    $sql_category = "SELECT * FROM category";
    $query_category = mysqli_query($connect, $sql_category);
    include_once 'sanpham/validation_product.php';

    if(isset($_POST['btn_them']) && empty($errors)){
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];
        $sale = $_POST['product_sale'];
        $status = $_POST['product_status'];
        $category_id = $_POST['category_id'];
        
        $sql_insert = "INSERT INTO product(product_name, product_description, product_price, product_image, product_sale, product_status, category_id) 
        VALUES ('$name', '$description', '$price', '$image', '$sale', '$status', '$category_id')";
        $query = mysqli_query($connect, $sql_insert);
        header('location: index.php?page_layout=danhsach');
    }

?>
<body>
    <div class="product_container_input">
        <div class="card">
            <h2 class="card-header">Thông tin sản phẩm</h2>
            <div class="card-body">
                <form action="" method ="POST" enctype="multipart/form-data" >
                    <div class="form_group">
                        <label for="product_name">Tên sản phẩm</label>
                        <input type="text" name = "product_name" class="form-control" value=" <?php echo (!empty($_POST['product_name'])) ? $_POST['product_name'] : false  ?> " >
                        <span class="err"><?php
                            if (!empty($errors['product_name']['required'])) {
                                echo $errors['product_name']['required'];
                            }
                            if (!empty($errors['product_name']['min'])) {
                                echo $errors['product_name']['min'];
                            }
                        ?></span>
                    </div>
                    <div class="form_group">
                        <label for="product_description">Mô tả</label>
                        <input type="text" name = "product_description" class="form-control"value=" <?php echo (!empty($_POST['product_description'])) ? $_POST['product_description'] : false  ?> ">
                        <span class="err"><?php
                            if (!empty($errors['product_description']['required'])) {
                                echo $errors['product_description']['required'];
                            }
                            if (!empty($errors['product_description']['min'])) {
                                echo $errors['product_description']['min'];
                            }
                        ?></span>
                    </div>
                    <div class="form_group">
                        <label for="product_price">Giá</label>
                        <input type="text" name = "product_price" class="form-control"value=" <?php echo (!empty($_POST['product_price'])) ? $_POST['product_price'] : false  ?> ">
                        <span class="err"><?php
                            if (!empty($errors['product_price']['required'])) {
                                echo $errors['product_price']['required'];
                            }
                            if (!empty($errors['product_price']['min'])) {
                                echo $errors['product_price']['min'];
                            }
                        ?></span>
                    </div>
                    <div class="form_group">
                        <label for="product_image">Ảnh</label>
                        <input type="text" name = "product_image" class="form-control"value=" <?php echo (!empty($_POST['product_image'])) ? $_POST['product_image'] : false  ?> ">
                        <span class="err"><?php
                            if (!empty($errors['product_image']['required'])) {
                                echo $errors['product_image']['required'];
                            }
                            if (!empty($errors['product_image']['min'])) {
                                echo $errors['product_image']['min'];
                            }
                        ?></span>
                    </div>
                    <div class="form_group">
                        <label for="product_sale">Giá khuyến mãi</label>
                        <input type="text" name = "product_sale" class="form-control"value=" <?php echo (!empty($_POST['product_sale'])) ? $_POST['product_sale'] : false  ?> ">
                        <span class="err"><?php
                            if (!empty($errors['product_sale']['required'])) {
                                echo $errors['product_sale']['required'];
                            }
                            if (!empty($errors['product_sale']['min'])) {
                                echo $errors['product_sale']['min'];
                            }
                        ?></span>
                    </div>
                    <div class="form_group">
                        <label for="product_status">Trạng thái</label>
                        <input type="text" name = "product_status" class="form-control"value=" <?php echo (!empty($_POST['product_status'])) ? $_POST['product_status'] : false  ?> ">
                        <span class="err"><?php
                            if (!empty($errors['product_status']['required'])) {
                                echo $errors['product_status']['required'];
                            }
                            if (!empty($errors['product_status']['min'])) {
                                echo $errors['product_status']['min'];
                            }
                        ?></span>
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

                    <button type="submit" class="btn btn-outline-dark btn_them" name="btn_them">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>