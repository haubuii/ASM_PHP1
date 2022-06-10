<?php
    require_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Quản Lý Sản Phẩm</title>
</head>
<body>
    <?php
        if(isset($_GET ['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'danhsach':
                    require_once 'danhsach.php';
                    break;
                case 'them':
                    require_once 'them.php';
                    break;
                case 'sua':
                    require_once 'sua.php';
                    break;
                case 'xoa':
                    require_once 'xoa.php';
                    break;
                
                default:
                    require_once 'danhsach.php';
                    break;
            }
        }else{ 
            require_once 'danhsach.php';
        }
    ?>
    
</body>
</html>