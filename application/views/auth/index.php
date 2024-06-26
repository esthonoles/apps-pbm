<div class="login-box">
    <?= $this->session->flashdata('message'); ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>PBM</b>APPS</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?= base_url('auth') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                </div>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fab fa-right-to-bracket mr-2"></i> Sign In
                    </button>
            </form>



        </div>
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p> -->
        <!-- <p class="mb-0">
            <a href="" class="text-center">Register a new membership</a>
        </p> -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->