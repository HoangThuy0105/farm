<?php
include '../../Classes/admin/category.php';
include_once '../../Classes/web/product.php';
include '../../lib/session.php';
Session::init();

$product = new product();
$category = new category();

if (!isset($_GET['idProduct']) || $_GET['idProduct'] == null || !isset($_GET['idCate']) || $_GET['idCate'] == null) {
    echo "<script>window.location = 'product.php'</script> ";
} else {
    $id = filter_input(INPUT_GET, 'idProduct');
    $idCategory = filter_input(INPUT_GET, 'idCate');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product details</title>
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
    <link rel="shortcut icon" type="image/png" href="../../public/web/img/logo2.png" />
</head>

<body>
    <div class="app">
        <?php
        include '../../inc/web/header.php';
        ?>
        <div class="app__container app__container__Tablet">
            <div class="grid wide">
                <?php
                $productDetail = $product->get_productById($id);
                if ($productDetail) {
                    foreach ($productDetail as $data) {
                ?>
                        <p hidden>
                            <?php echo $data['IdProduct']; ?>
                        </p>

                        <div class="row product-detail-wrap no-gutters">
                            <div class="col l-5 m-12 c-12">
                                <div class="product-detail-img-wrap">
                                    <img class="product-detail-img" src="<?php echo '../../public/web/img/products/' . $data['ProductImg1']  ?>" id="ProductImg"></img>
                                    <ul class="product-detail-img-list">
                                        <li class="product-detail-img-item">
                                            <img class="product-detail-img-item-bg" src="<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>"></img>
                                        </li>
                                        <li class="product-detail-img-item">
                                            <img class="product-detail-img-item-bg" src="<?php echo '../../public/web/img/products/' . $data['ProductImg2'] ?>"></img>
                                        </li>
                                        <li class="product-detail-img-item">
                                            <img class="product-detail-img-item-bg" src="<?php echo '../../public/web/img/products/' . $data['ProductImg3'] ?>"></img>
                                        </li>
                                        <li class="product-detail-img-item">
                                            <img class="product-detail-img-item-bg" src="<?php echo '../../public/web/img/products/' . $data['ProductImg4'] ?>"></img>
                                        </li>
                                        <li class="product-detail-img-item">
                                            <img class="product-detail-img-item-bg" src="<?php echo '../../public/web/img/products/' . $data['ProductImg5'] ?>"></img>
                                        </li>
                                        <li class="product-detail-img-item">
                                            <img class="product-detail-img-item-bg" src="<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>"></img>
                                        </li>
                                    </ul>

                                    <div class="product-detail__description-mobile">
                                        <h5 class="product-detail__description--name">Mô tả:</h5>
                                        <span class="product-detail__description--title"><?php echo $data['Descrip'] ?></span>
                                    </div>

                                    <div class="product-detail__footer-mobile">
                                        <div class="product-detail__share">
                                            <div class="product-detail__share-title">Chia sẻ:</div>
                                            <ul class="product-detail__share-list">
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-facebook-messenger"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-detail__favorite">
                                            <i class="far fa-heart"></i>
                                            <div class="product-detail__favorite-title">Đã thích (2,3k)</div>
                                        </div>
                                    </div>

                                    <div href="#" class="product-detail_qr-mobile">
                                        <h5 class="product-detail__supplier-title">Nhà cung cấp:</h5>
                                        <a href="<?php echo $data['linkWebsite'] ?>">
                                            <img src="<?php echo $data['QRCode'] ?>" class="product-detail__qr-img" alt="QRCode">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-7 m-12 c-12">
                                <div class="product-detail">
                                    <h4 class="product-detail__name">
                                        <?php echo $data['NameProduct'] ?>
                                    </h4>
                                    <div class="product-detail__price">
                                        <?php
                                            if($data['Percent'] != 0) {
                                                echo '
                                                    <span class="product-detail__price--old">'.$data["Price"] . 'đ</span>
                                                    <span class="product-detail__price--new">'. ($data['Price'] * (100 - $data['Percent'])) / 100 . 'đ</span>
                                                ';
                                            } else {
                                                echo '
                                                    <span class="product-detail__price--new">'. $data["Price"] . 'đ</span>
                                                ';
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="product-detail__description">
                                        <h5 class="product-detail__description--name">Mô tả:</h5>
                                        <span class="product-detail__description--title"><?php echo $data['Descrip'] ?></span>
                                    </div>
                                    <div class="product-detail__mass">
                                        <h5 class="product-detail__mass--title">Khối lượng</h5>
                                        <ul class="product-detail__mass-list">
                                            <li class="product-detail__mass-item product-detail__mass-item--active">
                                                <button class="product-detail__mass--quantity">1kg</button>
                                            </li>
                                            <li class="product-detail__mass-item">
                                                <button class="product-detail__mass--quantity">500g</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail__quantity-wrap">
                                        <h5 class="product-detail__quantity--title">Số lượng:</h5>
                                        <div class="product-detail__quantitys">
                                            <label class="product-detail__quantity--sub" onclick="decrement(this)">-</label>
                                            <input class="product-detail__quantity" value="1" maxlength="10" id="quantityOrder"></input>
                                            <label class="product-detail__quantity--add" onclick="increment(this)">+</label>
                                            <div class="still"><?php echo $data['QuantityProduct'] ?>kg có sẵn</div>
                                            <input id="quantityProduct" value="<?php echo $data['QuantityProduct']; ?>" hidden></input>
                                        </div>
                                        <script>
                                            function increment(Object) {
                                                var input = Object.parentElement.children[1]
                                                var oldValue = parseInt(input.value);
                                                if (oldValue < document.getElementById('quantityProduct').value) {
                                                    input.setAttribute('value', oldValue + 1)
                                                }
                                            }

                                            function decrement(Object) {
                                                var input = Object.parentElement.children[1]
                                                console.log(input)
                                                var oldValue = parseInt(input.value);
                                                if (oldValue > 1) {
                                                    input.setAttribute('value', oldValue - 1)
                                                }
                                            }

                                            function addCart1(id, quantity) {
                                                $.ajax({
                                                    url: 'ajaxCart.php',
                                                    type: 'POST',
                                                    dataType: 'html',
                                                    data: {
                                                        'id': id,
                                                        'quantity': quantity,
                                                        'act': 'add'
                                                    }
                                                }).done(function(getHtml) {
                                                    item = getHtml.split("-");
                                                    $('#sumOrder').text(item[0]);
                                                    $('#sum_Order').text(item[1]);
                                                    $('#totalPay').text(item[2]);
                                                    $('#listCart').html(item[3])
                                                });
                                            }
                                        </script>
                                    </div>
                                    <div class="product-detail__action">
                                        <button class="product-detail__action--addCart" onmousedown=" addCart1(<?php echo $data['IdProduct']; ?>, document.getElementById('quantityOrder').value);">
                                            <i class="fas fa-cart-plus"></i>
                                            Thêm vào giỏ hàng
                                        </button>

                                        <button class="product-detail__action--Buy">
                                            Mua ngay
                                        </button>
                                    </div>

                                    <div href="#" class="product-detail_qr">
                                        <h5 class="product-detail__supplier-title">Nhà cung cấp:</h5>
                                        <a href="<?php echo $data['linkWebsite'] ?>" target="_blank">
                                            <img src="<?php echo $data['QRCode'] ?>" class="product-detail__qr-img" alt="QRCode">
                                        </a>
                                    </div>

                                    <div class="product-detail__footer">
                                        <div class="product-detail__share">
                                            <div class="product-detail__share-title">Chia sẻ:</div>
                                            <ul class="product-detail__share-list">
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-facebook-messenger"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="product-detail__share-item">
                                                    <a href="" class="product-detail__share-link">
                                                        <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-detail__favorite">
                                            <i class="far fa-heart"></i>
                                            <div class="product-detail__favorite-title">Đã thích (2,3k)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                <?php
                    }
                }
                ?>

                <div class="row product-detail-related-wrap m-gutter">
                    <div class="col l-10 m-12 c-12">
                        <div class="product-detail-related">
                            <h4 class="product-detail-related-title">
                                SẢN PHẨM LIÊN QUAN
                            </h4>
                            <div class="product-detail-related-list">
                                <div class="row sm-gutter">
                                    <?php
                                    $related = $product->get_productByIdCategory($idCategory);
                                    if ($related) {
                                        foreach ($related as $data) {
                                    ?>
                                            <div class="col l-2-4 m-4 c-6">
                                                <a class="product-item" href="product-detail.php?idProduct=<?php echo $data['IdProduct'] ?>&idCate=<?php echo $data['IdCategory'] ?>">
                                                    <div class="product-item__img" style="background-image: url('<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>');"></div>
                                                    <h4 class="product-item__name"><?php echo $data['NameProduct'] ?></h4>
                                                    <div class="product-item__price">
                                                        <?php if ($data['Percent'] != 0) {
                                                            echo '<span class="product-item__price-old"> ' . $data["Price"] . 'đ</span>';
                                                            echo '<span class="product-item__price-current">' . ($data['Price'] * (100 - $data['Percent'])) / 100 . 'đ</span>';
                                                        } else {
                                                            echo '<span class="product-item__price-current">' . $data['Price'] . 'đ</span>';
                                                        } ?>
                                                    </div>
                                                    <div class="product-item__action">
                                                        <span class="product-item__like product-item__like--liked">
                                                            <i class="product-item__like-icon--empty far fa-heart"></i>
                                                            <i class="product-item__like-icon--fill fas fa-heart"></i>
                                                        </span>
                                                        <div class="product-item__rating">
                                                            <i class="product-item__star--gold fas fa-star"></i>
                                                            <i class="product-item__star--gold fas fa-star"></i>
                                                            <i class="product-item__star--gold fas fa-star"></i>
                                                            <i class="product-item__star--gold fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>

                                                        <span class="product-item__sold">88 đã bán</span>
                                                    </div>
                                                    <div class="product-item__origin">
                                                        <span class="product-item__brand"><?php echo $data['NameSupplier'] ?></span>
                                                        <span class="product-item__origin-name">Việt Nam</span>
                                                    </div>
                                                    <div class="product-item__favorite">
                                                        <i class="fas fa-check"></i>
                                                        <span>Yêu thích</span>
                                                    </div>
                                                    <?php if ($data['Percent'] != 0) {
                                                        echo '
                                                        <div class="product-item__sale-off">
                                                            <span class="product-item__sale-off-percent">' . $data['Percent'] . '%</span>
                                                            <span class="product-item__sale-off-label">GIẢM</span>
                                                        </div>';
                                                    } ?>
                                                </a>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="product-detail-comment">
                                <h4 class="product-detail-comment-title">
                                    ĐÁNH GIÁ SẢN PHẨM
                                </h4>
                                <div class="fb-comments" data-href="http://leducanhtuan.name.vn/" data-width="965" data-numposts="5"></div>
                            </div>

                        </div>

                    </div>

                    <div class="col l-2 m-12 c-12">
                        <div class="product-detail-bestseller">
                            <h4 class="product-detail-bestseller-title">
                                Top Sản Phẩm Bán Chạy
                            </h4>
                            <div class="product-detail-bestseller-list">
                                <div class="row sm-gutter">
                                    <?php
                                    $top = $product->get_topProduct();
                                    $topProduct = $top['listTop'];
                                    $topProductDetail = $top['listDetailTop'];
                                    if ($topProduct) {
                                        foreach ($topProduct as $lists) {
                                            foreach ($topProductDetail[$lists['IdProduct']] as $list) {
                                                foreach ($list as $data) {
                                    ?>
                                                    <div class="col l-12 m-4 c-6">
                                                        <a class="product-item" href="product-detail.php?idProduct=<?php echo $data['IdProduct'] ?>&idCate=<?php echo $data['IdCategory'] ?>">
                                                            <div class="product-item__img" style="background-image: url(<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>);"></div>
                                                            <h4 class="product-item__name"><?php echo $data['NameProduct'] ?></h4>
                                                            <div class="product-item__price">
                                                                <?php if ($data['Percent'] != 0) {
                                                                    echo '<span class="product-item__price-old"> ' . $data["Price"] . 'đ</span>';
                                                                    echo '<span class="product-item__price-current">' . ($data['Price'] * (100 - $data['Percent'])) / 100 . 'đ</span>';
                                                                } else {
                                                                    echo '<span class="product-item__price-current">' . $data['Price'] . 'đ</span>';
                                                                } ?>
                                                            </div>
                                                            <div class="product-item__action">
                                                                <span class="product-item__like product-item__like--liked">
                                                                    <i class="product-item__like-icon--empty far fa-heart"></i>
                                                                    <i class="product-item__like-icon--fill fas fa-heart"></i>
                                                                </span>
                                                                <div class="product-item__rating">
                                                                    <i class="product-item__star--gold fas fa-star"></i>
                                                                    <i class="product-item__star--gold fas fa-star"></i>
                                                                    <i class="product-item__star--gold fas fa-star"></i>
                                                                    <i class="product-item__star--gold fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>

                                                                <span class="product-item__sold">88 đã bán</span>
                                                            </div>
                                                            <div class="product-item__origin">
                                                                <span class="product-item__brand"><?php echo $data['NameSupplier'] ?></span>
                                                                <span class="product-item__origin-name">Việt Nam</span>
                                                            </div>
                                                            <div class="product-item__favorite">
                                                                <i class="fas fa-check"></i>
                                                                <span>Yêu thích</span>
                                                            </div>
                                                            <?php if ($data['Percent'] != 0) {
                                                                echo '
                                                                <div class="product-item__sale-off">
                                                                    <span class="product-item__sale-off-percent">' . $data['Percent'] . '%</span>
                                                                    <span class="product-item__sale-off-label">GIẢM</span>
                                                                </div>';
                                                            } ?>
                                                        </a>
                                                    </div>
                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>

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


        <!-- Mobile -->
        <div class="product-detail-action">
            <div class="product-detail-action__addCart">
                <button class="product-detail-action__addCart-btn js-product-detail-action__addCart-btn">
                    <i class="fas fa-cart-plus"></i>
                    Thêm vào giỏ hàng
                </button>
            </div>
            <div class="product-detail-action__Buy">
                <button class="product-detail-action__Buy-btn js-product-detail-action__Buy-btn">
                    Mua ngay
                </button>
            </div>
        </div>


        <div class="modal-action-overlay js-modal-action-overlay"></div>
        <div class="modal-action-form js-modal-action-form">
            <div class="grid wide">
                <div class="row">
                    <?php
                    $productDetail = $product->get_productById($id);
                    if ($productDetail) {
                        foreach ($productDetail as $data) {
                    ?>
                            <div class="col c-12">
                                <div class="modal-action-form-container">
                                    <div class="row">
                                        <div class="col c-5">
                                            <div class="modal-action-form-container__img" style="background-image: url(<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>);"></div>
                                        </div>
                                        <div class="col c-7 modal-action-form-price-wrap">
                                            <div class="modal-action-form-container__close">
                                                <i class="modal-action-form-container__close-icon js-modal-action-form-container__close-icon fas fa-times"></i>
                                            </div>
                                            <div class="modal-action-form-container__price">
                                                <p class="modal-action-form-container__price--title"><?php echo $data['Price'] . 'đ' ?></p>
                                                <p class="modal-action-form-container__warehouse">Kho: <?php echo $data['QuantityProduct'] ?> kg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-action-form-mass">
                                    <h5 class="modal-action-form-mass--title">Khối lượng</h5>
                                    <ul class="product-detail__mass-list">
                                        <li class="product-detail__mass-item product-detail__mass-item--active">
                                            <button class="product-detail__mass--quantity">1kg</button>
                                        </li>
                                        <li class="product-detail__mass-item">
                                            <button class="product-detail__mass--quantity">500g</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="modal-action-form-quantity">
                                    <h5 class="modal-action-form-quantity-title">
                                        Số lượng
                                    </h5>
                                    <div class="product-detail__quantitys">
                                        <label class="product-detail__quantity--sub" onclick="decrement(this)">-</label>
                                        <input class="product-detail__quantity" value="1" maxlength="10" id="quantityOrder"></input>
                                        <label class="product-detail__quantity--add" onclick="increment(this)">+</label>
                                        <input id="quantityProduct" value="<?php echo $data['QuantityProduct']; ?>" hidden></input>
                                    </div>
                                </div>

                                <div class="modal-action-form__action">
                                    <button class="modal-action-form__action-addCart-btn js-modal-action-form__action-addCart-btn" onmousedown=" addCart1(<?php echo $data['IdProduct']; ?>, document.getElementById('quantityOrder').value);">
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button class="modal-action-form__action-Buy-btn js-modal-action-form__action-Buy-btn">
                                        Mua ngay
                                    </button>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../public/web/js/product-detail.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="ZUi8jUEY"></script>
</body>

</html>