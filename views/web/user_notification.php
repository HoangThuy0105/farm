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
    <link rel="stylesheet" href="../../public/web/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="app">
        <?php
        include '../../inc/web/header.php';
        include '../../inc/web/user_sidebar.php';
        ?>

        <div class="app__container app__container__Tablet--user">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <?php
                    include '../../inc/web/userMenubar.php';
                    ?>

                    <div class="col l-10 m-9 c-12">
                        <div class="user-notification-container">
                            <div class="user-notification-container-heading">
                                <h4 class="user-container-heading-title">
                                    Thông báo
                                </h4>
                            </div>
                            <a href="#" class="user-notification-body user-notification-body--view">
                                <div class="user-notification-img"></div>
                                <div class="user-notification-content">
                                    <h5 class="user-notification-name">
                                        Bạn có đơn hàng đang được giao đến
                                    </h5>
                                    <span class="user-notification-title">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore. Sit, molestiae?
                                    </span>
                                </div>
                                <div class="user-notification-action">
                                    <button class="user-notification-button">
                                        Xem chi tiết
                                    </button>
                                </div>
                            </a>

                            <a href="#" class="user-notification-body">
                                <div class="user-notification-img"></div>
                                <div class="user-notification-content">
                                    <h5 class="user-notification-name">
                                        Bạn có đơn hàng đang được giao đến
                                    </h5>
                                    <span class="user-notification-title">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore. Sit, molestiae?
                                    </span>
                                </div>
                                <div class="user-notification-action">
                                    <button class="user-notification-button">
                                        Xem chi tiết
                                    </button>
                                </div>
                            </a>

                            <a href="#" class="user-notification-body">
                                <div class="user-notification-img"></div>
                                <div class="user-notification-content">
                                    <h5 class="user-notification-name">
                                        Bạn có đơn hàng đang được giao đến
                                    </h5>
                                    <span class="user-notification-title">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore. Sit, molestiae?
                                    </span>
                                </div>
                                <div class="user-notification-action">
                                    <button class="user-notification-button">
                                        Xem chi tiết
                                    </button>
                                </div>
                            </a>
                            <a href="#" class="user-notification-body  user-notification-body--view">
                                <div class="user-notification-img"></div>
                                <div class="user-notification-content">
                                    <h5 class="user-notification-name">
                                        Bạn có đơn hàng đang được giao đến
                                    </h5>
                                    <span class="user-notification-title">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore. Sit, molestiae?
                                    </span>
                                </div>
                                <div class="user-notification-action">
                                    <button class="user-notification-button">
                                        Xem chi tiết
                                    </button>
                                </div>
                            </a>
                            <a href="#" class="user-notification-body  user-notification-body--view">
                                <div class="user-notification-img"></div>
                                <div class="user-notification-content">
                                    <h5 class="user-notification-name">
                                        Bạn có đơn hàng đang được giao đến
                                    </h5>
                                    <span class="user-notification-title">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore adipisicing elit. Praesentium sint ipsam inventore eos magni deserunt quas debitis amet quibusdam dignissimos omnis natus, corrupti cumque consectetur minus distinctio ad dolorem sit? Explicabo ea enim atque maiores nemo earum tempore. Sit, molestiae atque maiores nemo earum tempore. Sit, molestiae?
                                    </span>
                                </div>
                                <div class="user-notification-action">
                                    <button class="user-notification-button">
                                        Xem chi tiết
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>


    </div>

</body>

</html>