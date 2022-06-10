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
    include_once 'validation_category.php';

    $id = $_GET['id'];
    $sql_update = "SELECT * FROM category WHERE category_id = $id";
    $query_update = mysqli_query($connect, $sql_update);
    $row_update = mysqli_fetch_assoc($query_update);

    if(isset($_POST['btn_them']) && empty($errors)){
        $name = $_POST['category_name'];
        
        $sql_insert = "UPDATE category SET category_name = '$name' WHERE category_id = $id";
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
                        <label for="category_name">Tên sản phẩm</label>
                        <input type="text" name = "category_name" class="form-control" value = "<?php  echo $row_update['category_name']?>">
                        <span class="err">
                            <?php
                                if(isset($errors['category_name']['required'])){
                                    echo $errors['category_name']['required'];
                                }
                                if (isset($errors['category_name']['min'])) {
                                    echo $errors['category_name']['min'];
                                }
                            ?>
                        </span>
                    </div>
                    

                    <button type="submit" class="btn btn-outline-dark btn_them" name="btn_them">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>