<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">



                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" @if(Illuminate\Support\Facades\Cookie::get('panel_color')&&Illuminate\Support\Facades\Cookie::get('panel_color')=='dark') checked @endif id="dark-mode-switch"
                                />
                        <label class="form-check-label" for="dark-mode-switch">Karanlık Mod</label>
                    </div>

                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span class="d-none d-xl-inline-block ms-1">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->


                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/logout"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Güvenli Çıkış</a>
                    </div>
                </div>




            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/admin-assets/assets/images/logo-dark.svg" >
                                </span>
                        <span class="logo-lg">
                                    <img src="/admin-assets/assets/images/logo-dark.svg" class="w-50">
                                </span>
                    </a>

                    <a href="/" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/admin-assets/assets/images/logo-light.svg">
                                </span>
                        <span class="logo-lg">
                                    <img src="/admin-assets/assets/images/logo-light.svg" class="w-50" alt="" >
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>


            </div>

        </div>
    </div>
</header> <!-- ========== Left Sidebar Start ========== -->
