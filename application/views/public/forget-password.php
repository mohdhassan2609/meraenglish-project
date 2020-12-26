<?php include("header.php") ?>

<!-- ============================ Page Title Start================================== -->
<!--<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Forget Password</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>-->
<!-- ============================ Page Title End ================================== -->         

<!-- ============================ Add To cart ================================== -->
<section class="pt-70">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body cart_totals checkout">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-2x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form class="form_forget_password">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" name="email" placeholder="email address" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include("footer.php") ?>