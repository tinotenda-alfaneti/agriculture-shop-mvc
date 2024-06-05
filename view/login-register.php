<?php
    include("header.php");
?>
        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(../images/bg/5.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ms-auto me-auto">
                        <ul class="login__register__menu nav" role="tablist">
                            <li role="presentation" class="login "><a class="active" href="#login" role="tab" data-bs-toggle="tab">Login</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-bs-toggle="tab">Register</a></li>
                        </ul>
                        <?php

							if (!empty($_SESSION['error'])){
								?>
								<div class="w-100 text-center" style="color: red;">
									<?php
									echo $_SESSION['error'];
									unset($_SESSION['error']);
								}
								?>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 ms-auto me-auto">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade show active">
                                <form id="loginform" class="login" method="post" action="../actions/login_action.php">
                                    <input type="email" name="username" placeholder="Email*" required>
                                    <input type="password" name="password" placeholder="Password*" required>
                                    <div class="htc__login__btn mt--30">
                                        <button type="submit" name="login">Login</button>
                                    </div>
                                </form>
                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Remember me</span>
                                    <span class="forget"><a href="#">Forget Pasword?</a></span>
                                </div>
                                <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form id="registerform" class="login" method="post" action="../actions/signup_action.php"  enctype="multipart/form-data">
                                    <input type="text" name="customerfname" placeholder="First Name*" required>
                                    <input type="text" name="customerlname" placeholder="Last Name*" required>
                                    <input type="email" name="customeremail" placeholder="Email*" required>
                                    <input type="text" name="customercountry" placeholder="Country*" required>
                                    <input type="text" name="customercity" placeholder="City*" required>
                                    <input type="text" name="customercontact" placeholder="Contact*" required>
                                    <input type="password" name="password" placeholder="Password*">
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password*" required>
                                    <input type="file" name="customerimage" accept="image/*">
                                    <div class="htc__login__btn mt--30">
                                        <button type="submit" name="register">Register</button>
                                    </div>
                                </form>
                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Remember me</span>
                                </div>
                                <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->
<?php
    include("footer.php");
    include("scripts.php");
?>

</body>

</html>