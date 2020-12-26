<?php include("header.php") ?>



<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
        <?php
        foreach ($carts as $car) {
            $record_amt = $this->frontend_model->get_record('tbl_courses', "status=0 and id=$car->product_id", "course_amt_type")[0];
            if ($record_amt == "1") {
                break;
            }
        }
        if ($record_amt == "1") {
            ?>
            <form enctype="multipart/form-data" action="" class="checkout woocommerce-checkout form_checkout row" name="checkout" this_id="form-5418972">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="cart_totals checkout light_form mb-4">
                            <h4>Billing info Paid</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="<?= $user_details->first_name ?>" name="billing_first_name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="<?= $user_details->last_name ?>" name="billing_last_name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" value="<?= $user_details->email ?>" name="billing_email" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" value="<?= $user_details->phone_number ?>" name="billing_phone" required>
                                    </div>
                                </div>

                                <!--                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <input type="text" class="form-control" value="<?= $user_details->address ?>" name="billing_address_1" required>
                                                                    </div>
                                                                </div>-->

                                <!--                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Town/City</label>
                                                                        <input type="text" class="form-control" value="<?= $user_details->city ?>" name="billing_city" required>
                                                                    </div>
                                                                </div>-->

                                <!--                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>State/Country</label>
                                                                        <select id="country" class="form-control" name="billing_country">
                                                                            <option value="">&nbsp;</option>
                                                                            <option value="1">United State</option>
                                                                            <option value="2">United Kingdom</option>
                                                                            <option value="3">India</option>
                                                                            <option value="3">China</option>
                                                                            <option value="3">Canada</option>
                                                                        </select>
                                                                    </div>
                                                                </div>-->

                                <!--                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Zip/Postal Code</label>
                                                                        <input type="text" class="form-control" name="billing_postcode" value="<?= $user_details->post_code ?>" required>
                                                                    </div>
                                                                </div>-->

                                <!--<div class="col-lg-6 col-md-6">
                                    <div class="sm-add-ship">
                                        <input id="aa-4" class="checkbox-custom" name="aa-4" type="checkbox">
                                        <label for="aa-4" class="checkbox-custom-label">Skip to a different address?</label>
                                    </div>
                                </div>-->

                            </div>
                        </div>


                    </div>


                    <div class="col-lg-4 col-md-12">
                        <!-- Total Cart -->
                        <!--<div class="cart_totals checkout">-->
                        <!--    <h4>Order Summary</h4>-->
                        <!--    <div class="cart-wrap">-->
                        <!--        <ul class="cart_list">-->
                        <!--            <li id="list">Base price<strong>₹<?= $_SESSION['total'] ?>.00</strong></li>-->
                        <!--            <li>Discount<strong>₹10.00</strong></li>-->
                        <!--            <li>CGST<strong>₹10.00</strong></li>-->
                        <!--            <li>SGST<strong>₹10.00</strong></li>-->
                        <!--        </ul>-->
                        <!--        <div class="flex_cart">-->
                        <!--            <div class="flex_cart_1">-->
                        <!--                Total Cost-->
                        <!--            </div>-->
                        <!--            <div class="flex_cart_2">-->
                        <!--                ₹<?= $_SESSION['total'] ?>.00-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--       <button type="submit" class="btn btn-theme text-white w-100">Proceed To Payment</button>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>

                                        <th>Total</th>
                                        <th>Gst</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $total_g = 0;

                                    foreach ($carts as $cart) {
                                        $record = $this->frontend_model->get_records('tbl_courses', "status=0 and id=$cart->product_id")[0];
                                        ?>

                                        <tr>
                                            <td><?= $record->course_title ?> <span class="product-qty">x <?= $cart->product_quantity ?></span></td>

                                            <td>₹<?= $record->cost * $cart->product_quantity ?>.00</td>

                                            <td><?= $record->product_gst ?> <span class="product-qty">x <?= $cart->product_quantity ?>
                                                    <?php $gst = ($record->product_gst * $record->cost) / 100; ?>
                                                    (<?php
                                                    echo $total_gst = $gst * $cart->product_quantity;
                                                    $total_g += $total_gst
                                                    ?>)</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">₹<?= $_SESSION['total'] ?>.00</td>
                                        <td class="product-subtotal">₹<?= $total_g ?></td>

                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">₹<?= $_SESSION['total'] + $total_g ?>.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="submit"  class="btn btn-theme text-white w-100"><a><span>Proceed To Payment</span></button>
                        </div>


                    </div>

                </div>
            </form>
        <?php } else { ?>

            <form enctype="multipart/form-data" action="" class="checkout woocommerce-checkout form-free-checkout row" name="checkout" this_id="form-5418972">
                <div class="row">
                    <div class="col-lg-8 col-md-12">

                        <div class="cart_totals checkout light_form mb-4">
                            <h4>Billing info</h4>
                            <div class="row">

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="<?= $user_details->first_name ?>" name="billing_first_name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="<?= $user_details->last_name ?>" name="billing_last_name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" value="<?= $user_details->email ?>" name="billing_email" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" value="<?= $user_details->phone_number ?>" name="billing_phone" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="col-lg-4 col-md-12">
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>

                                        <th>Total</th>
                                        <th>Gst</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $total_g = 0;

                                    foreach ($carts as $cart) {
                                        $record = $this->frontend_model->get_records('tbl_courses', "status=0 and id=$cart->product_id")[0];
                                        ?>

                                        <tr>
                                            <td><?= $record->course_title ?> <span class="product-qty">x <?= $cart->product_quantity ?></span></td>

                                            <td>₹00.00</td>
                                            <td><?= $record->product_gst ?> <span class="product-qty">x <?= $cart->product_quantity ?>
                                                    <?php $gst = ($record->product_gst * $record->cost) / 100; ?>
                                                    (<?php
                                                    echo $total_gst = $gst * $cart->product_quantity;
                                                    $total_g += $total_gst
                                                    ?>)</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">₹00.00</td>
                                        <td class="product-subtotal">₹00.00</td>

                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">₹00.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="submit"  class="btn btn-theme text-white w-100"><a><span>Proceed To Payment</span></button>
                        </div>


                    </div>

                </div>
            </form>
        <?php } ?>
    </div>
</section>
<!-- ============================ Add To cart End ================================== -->


<!--<?php include("footer.php") ?>-->