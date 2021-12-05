<?php
include '../../Classes/web/address.php';
include '../../lib/session.php';
Session::checkSessionUser();
$class = new address();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = filter_input(INPUT_POST, 'numberPhone');
    $addr = filter_input(INPUT_POST, 'addr');
    $status = filter_input(INPUT_POST, 'status');
    $name = filter_input(INPUT_POST, 'name');

    $alert = $class->update_address($addr, $status, $phone, $name);
}

if (!isset($_GET['Address'])) {
    echo "<script>window.location = 'user_address.php'</script> ";
} else {
    $idAddress = filter_input(INPUT_GET, 'Address');
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
    <link rel="stylesheet" href="../../public/web/css/bonus.css">
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
                                    Chỉnh sửa
                                </h4>
                            </div>
                            <form action="user_updateAddress.php" method="POST">
                                <?php
                                $detailInfo = $class->get_address_where($idAddress);
                                if ($idAddress) {
                                    foreach ($detailInfo as $data) {
                                ?>

                                        <div class="modal-user-address__body">
                                            <div class="modal-user-address__body-wrap">
                                                <div class="modal-user-address__body-infoName">
                                                    <label for="username" class="modal-user-address__title">Họ và tên</label>
                                                    <input id="username" type="text" class="modal-user-address__input" name="name" value="<?php echo $data['Name'] ?>">
                                                </div>
                                                <div class="modal-user-address__body-margin"></div>
                                                <div class="modal-user-address__body-infoPhone">
                                                    <label for="phoneNumber" class="modal-user-address__title">Số điện thoại</label>
                                                    <input id="phoneNumber" type="text" class="modal-user-address__input" name="numberPhone" value="<?php echo $data['PhoneNumber'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-user-address__body-infoAddress">
                                                <label for="address" class="modal-user-address__title">Địa chỉ</label>
                                                <input id="address" type="text" class="modal-user-address__input" name="addr" value="<?php echo $data['Address'] ?>">
                                            </div>
                                            <input type="text" value="<?php echo $data['StatusInfo'] ?>" id="statusCb" name="status" hidden>

                                            <div class="modal-user-address__body-footer">
                                                <input <?= ($data['StatusInfo'] == 1) ? 'checked' : '' ?> id="check" type="checkbox" class="modal-user-address__body-footer-input" onclick="statusCheckbox(this)"></input>
                                                <label for="check" class="modal-user-address__body-footer-title">Đặt làm địa chỉ mặc định</label>
                                            </div>
                                        </div>

                                <?php
                                    }
                                }
                                ?>
                                <script>
                                    var status = document.querySelector('#statusCb');

                                    function statusCheckbox(obj) {
                                        if (obj.checked == true) {
                                            status.setAttribute('value', 1);
                                        } else if (obj.checked == false) {
                                            status.setAttribute('value', 0);
                                        }
                                    }

                                    if (status.value == 1) {
                                        document.getElementById('check').checked = true;
                                    } else if (status.value == 0) {
                                        document.getElementById('check').checked = false;
                                    }
                                </script>
                                <div class="modal-user-address__footer">
                                    <a class="btn btn--normal login-form__control-back" href="user_address.php">TRỞ LẠI</a>
                                    <button class="btn btn--primary" type="submit">HOÀN THÀNH</button>
                                </div>
                            </form>
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