
<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8" />
    <title>Oturum Aç </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">


    <!-- Icons Css -->
    <link href="/admin-assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    @include('section.panelstyle')

</head>

<body>
<div class="home-btn d-none d-sm-block">
    <a href="/" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-login text-center">
                        <div class="bg-login-overlay"></div>
                        <div class="position-relative">
                            <h5 class="text-white font-size-20">Hoşgeldin !</h5>
                            <p class="text-white-50 mb-0">Oturum aç ve  keyfini sür!</p>
                            <a href="/" class="logo logo-admin mt-4">
                                <img src="/admin-assets/assets/images/logo-dark.svg" >
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="p-2">
                            <form class="form-horizontal panel_loginform" >
                                <div class="alert alert-success d-none">
                                    Başarıyla giriş yapıldı.
                                </div>
                                <div class="alert alert-danger d-none">
                                    Bir hata oluştu  tekrar deneyin.
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="username">Kullanıcı adı</label>
                                    <input type="text" name="username" class="form-control" id="username" required placeholder="Kullanıcı adı giriniz">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Şifre</label>
                                    <input type="password"  name="password"  class="form-control" id="userpassword"
                                           placeholder="Şifre girin">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" name="remember_me" class="form-check-input" id="customControlInline">
                                    <label class="form-check-label" for="customControlInline">Beni Hatırla</label>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Oturum Aç</button>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script src="/admin-assets/assets/js/sweetalert2.js"></script>
<script src="/admin-assets/assets/js/axios.min.js"></script>

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="/admin-assets/assets/libs/jquery/jquery.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-assets/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/admin-assets/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/admin-assets/assets/libs/node-waves/waves.min.js"></script>
<script src="/admin-assets/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
