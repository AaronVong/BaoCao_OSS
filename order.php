<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./front-end/css/style.css">
    <!-- <script src="https://kit.fontawesome.com/d210984464.js" crossorigin="anonymous"></script> -->
    <script src="./front-end/js/functions.js"></script>
    <script src="./front-end/js/jquery-3.5.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        require "./back-end/Category_class.php";
        require "./back-end/Product_class.php";
        require "./back-end/Order_class.php";
        require "./back-end/Customer_class.php";
        require "./back-end/Status_class.php";
        $_product = new Product();
        $_order=new Order();
        $_status = new Status();
        $_customer= new Customer();
    ?>
        <div class="container container--biggest">
        <header id="header">
            <?php include "./front-end/src/include/navbar.php" ?>
        </header>
        <main id="main">
                <script src="./front-end/js/cartEvents.js"></script>
                <script src="./front-end/js/showform.js"></script>
                <script src="./front-end/js/navbar.js"></script>
                <script src="./front-end/js/search.js"></script>
        <?php 
        // Code thêm sản phẩm vào giỏ hàng đặt ở dưới đây

        //=============================================
        

        // Code nhận Request xóa sản phẩm khỏi giỏ hàng đặt ở dưới đây

        //=========================================================


        // Đặt hàng, thêm vào DB đặt ở dưới đây

        //======================================================
           

        
        // lấy danh sách trong giỏ hàng để in ra đặt ở dưới đây

        //====================================================

        
            // yêu cầu thay đổi trạng thái đơn hàng của khách hàng
            if(isset($_POST["userAction"])){
                $oid = $_POST["oid"];
                $statusName = $_POST["userAction"];
                $statusId= $_status->getStatusIdByName($statusName);
                $_order->updateOrderStatusById($oid,$statusId);
            }

            // yêu càu xem đơn hàng của khách hàng
            if(isset($_GET["action"])){
                $action = $_GET["action"];
                if($action=="myorders"){
                    $cid = $_customer->getColumnByEmail("id",$_SESSION["user"]["email"]);
                    $customer_orders = $_order->getCustomerOrders($cid);
                    include "./front-end/src/screen/customerordersscreen.php";
                    exit();
                }
            }            
        ?>
        <?php 
            include "./front-end/src/screen/orderscreen.php";
        ?>
        </main>
        <?php 
            include "./front-end/src/include/footer.php";
        ?>
    </div>
</body>
</html>