<?php
include '../../Classes/web/userLogin.php';

$class = new userLogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = filter_input(INPUT_POST, 'userEmail');
    $user_pass = md5(filter_input(INPUT_POST, 'userPass'));

    $login_check = $class->login_user($user_email, $user_pass);
}

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
    <link rel="stylesheet" href="../../public/web/css/bonus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="app">
        <?php
        include '../../inc/web/header.php';
        ?>

        <div class="app__container app__container__Tablet">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-o-3-5 l-5 m-o-2 m-8 c-12">
                        <!-- Login form -->
                        <form action="login.php" method="post">
                            <div class="login-form">
                                <div class="login-form__header">
                                    <h3 class="login-form__heading">Đăng Nhập</h3>
                                    <a href="register.php" class="login-form__switch-btn">Đăng Ký</a>
                                </div>

                                <div class="login-form__form">
                                    <div class="login-form__group">
                                        <input type="text" class="login-form__input" placeholder="Email của bạn" name="userEmail">
                                    </div>
                                    <div class="login-form__group">
                                        <input type="password" class="login-form__input" placeholder="Mật khẩu của bạn" name="userPass" >
                                    </div>
                                    <span style="color: #f63d30">
                                        <?php
                                        if (isset($login_check)) {
                                            echo $login_check;
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="login-form__aside">
                                    <div class="login-form__help">
                                        <a href="" class="login-form__help-link login-form__help-forgot">Quên mật khẩu</a>
                                        <span class="login-form__help-separate"></span>
                                        <a href="" class="login-form__help-link">Cần trợ giúp?</a>
                                    </div>
                                </div>

                                <div class="login-form__controls">
                                    <a href="product.php" class="btn btn--normal login-form__control-back">TRỞ LẠI</a>
                                    <button class="btn btn--primary">ĐĂNG NHẬP</button>
                                </div>
                            </div>
                        </form>
                        <div class="login-form__socials">
                            <a href="#" class="login-form__socials--facebook btn btn--size-s btn--with-icon">
                                <i class="login-form__socials-icon fab fa-facebook-square"></i>
                                <span class="login-form__socials-label">Kết nối với Facebook</span>
                            </a>
                            <a href="#" class="login-form__socials--google btn btn--size-s btn--with-icon">
                                <i class="login-form__socials-icon fab fa-google"></i>
                                <span class="login-form__socials-label">Kết nối với Google</span>
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