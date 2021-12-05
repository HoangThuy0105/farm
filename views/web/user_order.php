<?php
include_once '../../lib/session.php';
Session::checkSessionUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T Farm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/web/css/base.css">
    <link rel="stylesheet" href="../../public/web/css/main.css">
    <link rel="stylesheet" href="../../public/web/css/grid.css">
    <link rel="stylesheet" href="../../public/web/css/bonus.css">
    <link rel="stylesheet" href="../../public/web/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include '../../inc/web/header.php';
    ?>
    <div class="app">
        <?php
        include '../../inc/web/user_sidebar.php';
        ?>

        <div class="app__container app__container__Tablet--user">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <?php
                    include '../../inc/web/userMenubar.php';
                    ?>

                    <div class="col l-10 m-9 c-12">
                        <div class="user-order-container">
                            <div class="user-order-navbar">
                                <ul class="user-order-navbar-list" id="tabs">
                                    <li class="user-order-navbar-item user-order-navbar-item--active">
                                        <a href="#listOrder-all">
                                            Tất cả
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-unconfirmred">
                                            Chờ xác nhận
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-delivery">
                                            Đang giao
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-delivered">
                                            Đã giao
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-canceled">
                                            Đã hủy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                $(function() {
                                    $("#tabs li a").click(function() {
                                        var page = this.hash.substr(1);
                                        console.log(page)
                                        $.get(page + '.php', function(html) {
                                            $('#content').html(html);
                                        });
                                    });
                                });


                                let list = document.querySelectorAll('.user-order-navbar-item');
                                for (let i = 0; i < list.length; i++) {
                                    list[i].onclick = function() {
                                        let j = 0;
                                        while (j < list.length) {
                                            list[j++].className = 'user-order-navbar-item';
                                        }
                                        list[i].className = 'user-order-navbar-item user-order-navbar-item--active';
                                    }
                                }
                            </script>

                            <div class="user-order-navbar-mobile">
                                <ul class="user-order-navbar-list--mobile" id="option">
                                    <li class="user-order-navbar-item--mobile user-order-navbar-item--mobile__active">
                                        <a href="#listOrder-all"><i class="fas fa-shopping-basket"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-unconfirmred"><i class="fas fa-hourglass-half"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-delivery"><i class="fas fa-shipping-fast"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-delivered"><i class="fas fa-archive"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-canceled"><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                $(function() {
                                    $("#option li a").click(function() {
                                        var page = this.hash.substr(1);
                                        console.log(page)
                                        $.get(page + '.php', function(html) {
                                            $('#content').html(html);
                                        });
                                    });
                                });

                                let list = document.querySelectorAll('.user-order-navbar-item--mobile');
                                for (let i = 0; i < list.length; i++) {
                                    list[i].onclick = function() {
                                        let j = 0;
                                        while (j < list.length) {
                                            list[j++].className = 'user-order-navbar-item--mobile';
                                        }
                                        list[i].className = 'user-order-navbar-item--mobile user-order-navbar-item--mobile__active';
                                    }
                                }
                            </script>
                            <div id="content">
                                <?php include './listOrder-all.php' ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../inc/web/footer.php';
    ?>

</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

</html>