<?php
include('assetsHeader.php');
?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth  theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <form action="#">
                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control Username" name="Username" placeholder="Username">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control password" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a onclick="GoLogin()" class="btn btn-primary submit-btn btn-block">Login</a>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="pesanEror"></div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

</body>
<?php
include('assetsFooter.php');
?>
<script>
    var GoLogin = () => {
        $.ajax({
            type: "POST",
            url: "http://localhost/Webproject/controller/LoginController.php",
            data: {
                Username: $('.Username').val(),
                password: $('.password').val()
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log('====================================');
                console.log(data);

                $('.pesanEror').html("<label class=\"text - small text - danger \">Forgot Password</label>");
                console.log('====================================');
            }
        });
    }
</script>