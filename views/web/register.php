<?php 
    include '../../Classes/web/userRegister.php';
    

    $class = new userRegister();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $new_email = filter_input(INPUT_POST, 'newEmail');
        $create_pass = md5(filter_input(INPUT_POST, 'createPass'));
        $conf_pass = md5(filter_input(INPUT_POST, 'confPass'));

        $login_check = $class->user_Register($new_email, $create_pass, $conf_pass);
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
                        <!-- Register form -->
                        <form action="register.php" method="post">
                        <div class="register-form">
                            <div class="register-form__header">
                                <h3 class="register-form__heading">Đăng Ký</h3>
                                <a href="login.php" class="register-form__switch-btn">Đăng nhập</a>
                            </div>
    
                            <div class="register-form__form">
                                <div class="register-form__group">
                                    <input type="email" class="register-form__input" placeholder="Email của bạn" name="newEmail">
                                </div>
                                <div class="register-form__group">
                                    <input type="password" class="register-form__input" placeholder="Mật khẩu của bạn" name="createPass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                                </div>
                                <div class="register-form__group">
                                    <input type="password" class="register-form__input" placeholder="Xác nhận mật khẩu" name="confPass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                                </div>
                            </div>
    
                            <div class="register-form__aside">
                                <p class="register-form__policy-text">
                                    Bằng việc đăng kí, bạn đồng ý với TFarm về
                                    <a href="" class="register-form__text-link">Điều khoản dịch vụ </a>&
                                    <a href="" class="register-form__text-link">Chính sách bảo mật</a>
                                </p>
                            </div>
    
                            <div class="register-form__controls">
                                <button onclick="window.location.href='product.php' " class="btn btn--normal register-form__control-back">TRỞ LẠI</button>
                                <button class="btn btn--primary">ĐĂNG KÝ</button>
                            </div>
                        </div>
                        </form>
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