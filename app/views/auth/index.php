<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="container">
                        <div class="container">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Mau Bayar SPP?</h1>
                                </div>
                                <div>
                                    <?php Flasher::flash(); ?>
                                </div>
                                <form class="user" method="post" action="<?= BASEURL; ?>/auth/userValidates">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Username/NIS" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Passowrd/NISN" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>