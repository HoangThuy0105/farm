<?php
include_once '../../lib/session.php';
include '../../Classes/web/userProfile.php';
Session::checkSessionUser();

$class = new userProfile();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checked = $class->user_updateProfile($_POST, $_FILES);
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
        include '../../inc/web/user_sidebar.php';
        ?>

        <div class="app__container app__container__Tablet--user">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <?php
                    include '../../inc/web/userMenubar.php';
                    ?>

                    <div class="col l-10 m-9 c-12">
                        <div class="user-container">
                            <div class="user-container-heading">
                                <h4 class="user-container-heading-title">
                                    Thông tin tài khoản
                                </h4>
                            </div>
                            <?php
                            $accountDetail = $class->get_accountById();
                            if ($accountDetail) {
                                foreach ($accountDetail as $data) {
                            ?>
                                    <form action="user.php" method="POST" enctype="multipart/form-data">
                                        <div class="row user-container-body-wrap">
                                            <div class="col l-8 m-12 c-12">
                                                <div class="user-container-body">
                                                    <ul class="user-container-body-list">
                                                        <li class="user-container-body-item">
                                                            <label for="name" class="user-container-body-item-title">Họ và tên:</label>
                                                            <input id="name" type="text" class="user-container-body-item-input" name="userName" value="<?php echo $data['Username'] ?>">
                                                        </li>
                                                        <!-- <li class="user-container-body-item">
                                                    <label for="phoneNumber" class="user-container-body-item-title">Số điện thoại:</label>
                                                    <input id="phoneNumber" type="text" class="user-container-body-item-input">
                                                </li> -->
                                                        <li class="user-container-body-item">
                                                            <label for="email" class="user-container-body-item-title">Email:</label>
                                                            <input id="email" type="text" class="user-container-body-item-input" name="userEmail" value="<?php echo $data['Email'] ?>" disabled>
                                                        </li>
                                                        <li class="user-container-body-item">
                                                            <span class="user-container-body-item-title">Giới tính:</span>
                                                            <input <?= ($data['Gender'] == 1) ? 'checked' : '' ?> type="radio" name="gender" id="made" value="1">
                                                            <label for="made" class="user-container-body-item__gender">Nam</label>
                                                            <input <?= ($data['Gender'] == 0) ? 'checked' : '' ?> type="radio" name="gender" id="femade" value="0">
                                                            <label for="femade" class="user-container-body-item__gender">Nữ</label>
                                                        </li>
                                                        <li class="user-container-body-item">
                                                            <span class="user-container-body-item-title">Ngày sinh:</span>
                                                            <div class="user-container-body-item-birthday">
                                                                <input type="date" style="width: 200px;" name="birthday" value="<?php echo $data['BirthDay'] ?>">
                                                            </div>
                                                        </li>
                                                        <span style="color: #f63d30">
                                                            <?php
                                                            if (isset($checked)) {
                                                                echo $checked;
                                                            }
                                                            ?>
                                                        </span>
                                                        <li class="user-container-body-item user-container-body-item--mobile">
                                                            <span class="user-container-body-item-title">Ảnh đại diện:</span>
                                                            <button class="user-container-body-img-button">Chọn ảnh</button>
                                                            <span class="user-container-body-item__upAvatar">(Dung lượng file tối đa 1 MB. Định dạng:.JPEG, .PNG)</span>
                                                        </li>

                                                        <li class="user-container-body-item user-container-body-item__changePass-link--mobile">
                                                            <span class="user-container-body-item-title"></span>
                                                            <a href="user_changePass.php" class="user-container-body-item__changPass-link">Đổi mật khẩu?</a>
                                                        </li>

                                                        <li class="user-container-body-item">
                                                            <label for="" class="user-container-body-item-title"></label>
                                                            <button class="user-container-body-btn">Cập nhật</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col l-4 m-12 c-12">
                                                <div class="user-container-body-upload-img">
                                                    <div class="user-container-body-img" style="background-image:url('<?php echo '../../public/admin/Image/accountImg/' .$data['Img']?>');"></div>
                                                    <!-- <button class="user-container-body-img-button">Chọn ảnh</button> -->
                                                    <input type="file" name="img" id="" class="user-container-body-img__input">
                                                    <span id='val'></span>
                                                    <span id='button'>Chọn ảnh</span>
                                                    <p class="user-container-body-img-title">Dung lượng file tối đa 1 MB</p>
                                                    <p class="user-container-body-img-title">Định dạng:.JPEG, .PNG</p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>
    </div>
    <script>
        $('#button').click(function() {
            $("input[type='file']").trigger('click');
        })

        $("input[type='file']").change(function() {
            $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
        })
    </script>

</body>

</html>