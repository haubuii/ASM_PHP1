<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <title>Category</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .product_container {
        width: 90%;
        height: auto;
        margin: auto;
        margin-top: 30px;
        border-radius: 0.3em;
        border: 1px solid #ccc;
    }

    img {
        height: 2.5em;
    }

    .btn_them {
        position: relative;
        left: 1em;
        margin: auto 0;
    }

    .card-header {
        text-align: center;
        background-color: #343a40;
        color: #fff;
    }

    li {
        list-style: none;
    }

    .trang_container {
        width: 100%;
    }

    .trang {
        display: flex;
        align-items: center;
        justify-content: flex-end;

    }
    .trang a {
        color: black;
    }

    .list_trang {
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0 1em;
        right: 1em;
    }

    ul.list_trang li {
        padding: 7px 10px;
        margin: 5px;
        margin-left: 10px;
        background: #ddd;
        border-radius: 0.5em;
        cursor: pointer;
    }
</style>
<?php

// require_once '../config/db.php';

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM category WHERE category_name LIKE '%$search%'";
    $query = mysqli_query($connect, $sql);
} else {
    if (isset($_GET['trang'])) {
        $trang_so = $_GET['trang'];
        $start = ($trang_so - 1) * 5;
        $sql = "SELECT * FROM category ORDER BY category_name DESC LIMIT $start, 5";
        $query = mysqli_query($connect, $sql);
    } else {
        $sql = "SELECT * FROM category ORDER BY category_name DESC LIMIT 0, 5";
        $query = mysqli_query($connect, $sql);
    }
}
$row_count = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM category"));
$trang = ceil($row_count / 5);



?>

<body>
    <div class="product_container">
        <h2 class="card-header">Danh sách thể loại</h2>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên Thể Loại</th>
                    
                    <th>Sửa</th>
                    <th>Xoá</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <th><?php echo $id++; ?></th>
                        <td><?php echo $row['category_name'] ?></td>
                        <td scope="col">
                            <a href="index.php?page_layout=sua&id=<?php echo $row['category_id']; ?>">Sửa</a>
                        </td>
                        <td scope="col">
                            <a href="index.php?page_layout=xoa&id=<?php echo $row['category_id']; ?>">Xoá</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div class="trang_container">
            <form class="trang">
                <ul class="list_trang" method>
                    Trang
                    <?php
                    for ($i = 1; $i <= $trang; $i++) { ?>
                        <li name="trang_so"><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                </ul>
            </form>
        </div>
        <div class="footer navbar navbar-light bg-light">
            <a class="btn btn-outline-primary btn_them " href="index.php?page_layout=them">Thêm Sản Phẩm</a>
            <div class="form_search">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" method="POST" enctype="multipart/form-data">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
            </div>
        </div>
    </div>
</body>


</html>