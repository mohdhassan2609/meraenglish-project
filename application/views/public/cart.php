



<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Add To cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add To cart</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->			


<!-- ============================ Add To cart ================================== -->
<section class="pt-0">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-12">

                <div class="table-responsive">
                    <table class="table add_to_cart">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
<!--                                <th scope="col">Quantity</th>-->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="cart_list">
                            <?php
                            if (sizeof($carts) >= 1) {
                                $i = 0;

                                foreach ($carts as $cart) {
                                    $record = $this->frontend_model->get_records('tbl_courses', "status=0 and id=$cart->product_id")[0];
                                    ?>
                                    <tr class="cart_item_parent" pr-id="<?= $record->id ?>">

                                        <td><div class="tb_course_thumb"><img src="<?= base_url() ?>uploads/common/<?= $record->course_banner ?>" class="img-fluid" alt="" /></div></td>
                                        <th><?= $record->course_title ?><span class="tb_date"></span></th>
                                        <?php if ($record->course_amt_type != '2') { ?>
                                            <td><span class="wish_price theme-cl">₹<?= number_format(($record->cost), 2) ?></span></td>
                                        <?php } else { ?>
                                            <td><span class="wish_price theme-cl">Free</span></td>
                                        <?php } ?>
                                <input type="hidden" id="amt" value="<?= $_SESSION['total'] ?>">
        <!--                                <td class="product-quantity">
                                    <div class="quantity buttons_added">
                                        <form>

                                            <input type="number"  size="4" class="form-control qty" title="Qty" value="<?= $cart->product_quantity ?>" name="update_cart_product_quantity" max="15" min="1" step="1" data-amount="price-<?= $record->id ?>" data-total-amount="total-<?= $record->id ?>" inputmode="numeric">
                                            <input type="hidden" name="product_id" value="<?= $record->id ?>">

                                        </form>
                                    </div>      
                                </td>-->
                                <td><a href="javascript:void(0)" class="btn btn-remove remove cart_remove_btn">Remove</span></td>
                                </tr>

                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td>
                                    <p>              No Products in Cart.</p>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Coupon Apply -->
                <div class="checkout_coupon checkout">
                    <div class="checkout_coupon_flex">
                        <!--<form class="form-inline">-->
                        <!--	<input class="form-control" type="search" placeholder="Coupon Code" >-->
                        <!--	<button type="button" class="btn btn-theme2 ml-2">Apply Coupon</button>-->
                        <!--</form>-->
                    </div>
                    <div class="ckt_last">
                        <form class="form-inline">
                            <!--<button type="button" class="btn empty_btn">Empty cart</button>-->
                            <!--<button type="button" class="btn btn-theme2 disabled ml-2">Update Cart</button>-->
                        </form>
                    </div>
                </div>


            </div>
            <?php if (sizeof($carts) >= 1) { ?>
                <div class="col-lg-4 col-md-12">
                    <!-- Total Cart -->
                    <div class="cart_totals checkout">
                        <h4>Billing Summary</h4>
                        <div class="cart-wrap">
                            <ul class="cart_list">
                                <?php if ($record->course_amt_type != '2') { ?>
                                    <li id="list">Base price<strong>₹<?= $_SESSION['total'] ?>.00</strong></li>
                                    <li>Discount<strong>₹10.00</strong></li>
                                    <li>CGST<strong>₹10.00</strong></li>
                                    <li>SGST<strong>₹10.00</strong></li>
                                <?php } else { ?>
                                    <li id="list">Base price<strong>Free</strong></li>
                                <?php } ?>
                            </ul>
                            <div class="flex_cart">
                                <?php if ($record->course_amt_type != '2') { ?>
                                    <div class="flex_cart_1">
                                        Total Cost
                                    </div>
                                    <div class="flex_cart_2">
                                        ₹<?= $_SESSION['total'] ?>.00
                                    </div>
                                <?php } else { ?>
                                    <div class="flex_cart_1">
                                        Total Cost
                                    </div>
                                    <div class="flex_cart_2">
                                        ₹00.00
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if (isset($_SESSION['loginid']) && $_SESSION['isloggedin'] == TRUE) { ?>
                                <a href="<?= base_url() ?>checkout"><button type="button" class="btn btn-theme text-white w-100">Proceed To Checkout</button></a>
                            <?php } else { ?>
                                <a data-toggle="modal" data-target="#login"><button type="button" class="btn btn-theme2  ml-2">Proceed To Checkout</button></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-4 col-md-12">
                    <!-- Total Cart -->
                    <div class="cart_totals checkout">
                        <h4>Billing Summary</h4>
                        <div class="cart-wrap">
                            <ul class="cart_list">
                                <li id="list">Base price<strong>₹0.00</strong></li>
                                <li>Discount<strong>₹0.00</strong></li>
                                <li>CGST<strong>₹0.00</strong></li>
                                <li>SGST<strong>₹0.00</strong></li>
                            </ul>
                            <div class="flex_cart">
                                <div class="flex_cart_1">
                                    Total Cost
                                </div>
                                <div class="flex_cart_2">
                                    ₹0.00
                                </div>
                            </div>
                            <?php if (isset($_SESSION['loginid']) && $_SESSION['isloggedin'] == TRUE) { ?>
                                <a href="<?= base_url() ?>checkout"><button type="button" class="btn btn-theme text-white w-100">Proceed To Checkout</button></a>
                            <?php } else { ?>
                                <a data-toggle="modal" data-target="#login"><button type="button" class="btn btn-theme2  ml-2">Proceed To Checkout</button></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>	
    </div>
</section>
<!-- ============================ Add To cart End ================================== -->




