<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>İstatistikler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">

    <!-- datepicker css -->
    <link href="/admin-assets/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/admin-assets/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- dragula css -->
    <link href="/admin-assets/assets/libs/dragula/dragula.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/admin-assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    @include('section.panelstyle')

</head>

<body data-layout="detached" data-topbar="colored">



<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<div class="container-fluid">
    <!-- Begin page -->
    <div class="modal fade" id="new_pay_modal" tabindex="-1" role="dialog"
         aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="composemodalTitle"> Borç Ekle </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form class="add_payersform">
                    <div class="modal-body">

                        <div>


                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Borçlu Kişi">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="phone" placeholder="Telefon Numarası (5.....)" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="total" data-toggle="touchspin" placeholder="Borç Miktarı">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="category"  placeholder="Kategori" value="Sipariş">
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="10" placeholder="Açıklama (Opsiyonel)"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Oluştur <i
                                class="fab fa-telegram-plane ms-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="layout-wrapper">

    @include('section.top_menu')
    @include('section.left_menu')

    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                @include('section.page_header',['title'=>'İstatistikler'])




                    <div class="row">
                        <div class="col-xl-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div>
                                                        <p class="text-muted fw-medium mt-1 mb-2">Toplam Satış</p>
                                                        <h4>{{count(\App\Models\Sales::all())}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div>
                                                        <div id="radial-chart-1" data-count="{{count(\App\Models\Sales::all())}}"></div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div>
                                                        <p class="text-muted fw-medium mt-1 mb-2">Günlük Satış</p>
                                                        <h4>{{count(\App\Models\Sales::whereDate('created_at',\Illuminate\Support\Carbon::today())->get())}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div>
                                                        <div id="radial-chart-daily-sale" data-percent = "{{round(\App\Http\Controllers\Controller::calc_daily_salestatus()["diff_percent"])}}" data-up="{{\App\Http\Controllers\Controller::calc_daily_salestatus()["up"]}}"></div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card pb-0 mb-3">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Whatsapp Ayarlar</h4>
                                    <div class="row pt-3">
                                        <form class="whatsapp_apiconfig">
                                            <div class="row  mt-2 mb-2">
                                                <div class="col-lg-6 pt-2">
                                                    <input type="text" class="form-control" name="api_key"  placeholder="Api Key" value="{{Config::get('whatsapp.api_key')}}">
                                                </div>
                                                <div class="col-lg-6 pt-2">
                                                    <input type="text" class="form-control" name="api_secret" placeholder="Api Secret" value="{{Config::get('whatsapp.api_secret')}}">
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" name="agent" placeholder="Agent" value="{{Config::get('whatsapp.agent')}}">
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12">
                                                    <textarea name="message_schema"  placeholder="Mesaj şeması" class="form-control" rows="10">{{\Illuminate\Support\Facades\Config::get('whatsapp.message_schema')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row pt-2 justify-content-center">
                                                <div class="col-xl-2 col-lg-4">
                                                    <button type="submit" class="btn btn-outline-success w-100">Kaydet</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Ödenmemiş Borç</p>
                                            <h4 class="mb-0"> <span class="text-muted font-size-13">₺</span> {{\App\Models\Payers::where("odeme_durumu",0)->sum('borc_miktari')}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Ödenmiş Borç</p>
                                            <h4 class="mb-0"> <span class="text-muted font-size-13">₺</span> {{\App\Models\Payers::where("odeme_durumu",1)->sum('borc_miktari')}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Borçlu Kişi</p>
                                            <h4 class="mb-0">{{count(\App\Models\Payers::where('odeme_durumu',0)->get())}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar" role="progressbar" style="width: 62%"
                                                         aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Borcunu Ödeyen Kişi</p>
                                            <h4 class="mb-0">{{count(\App\Models\Payers::where('odeme_durumu',1)->get())}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 78%" aria-valuenow="78" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Kayıtlı Kullanıcı</p>
                                            <h4 class="mb-0">{{count(\App\Models\User::all())}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Kayıtlı Hareket</p>
                                            <h4 class="mb-0">{{count(\App\Models\Logs::all())}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Kart ile satış</p>
                                            <h4 class="mb-0">{{count(\App\Models\Sales::where('payment_method','Kart')->get())}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Nakit ile satış</p>
                                            <h4 class="mb-0">{{count(\App\Models\Sales::where('payment_method','Nakit')->get())}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card  ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <p class="mb-2">Ödemesi Alınan Satış</p>
                                            <h4 class="mb-0"> <span class="text-muted font-size-13">₺</span> {{\App\Models\Sales::where("payment_status","Ödendi")->sum('price')}}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-end">

                                                <div class="progress progress-sm mt-3">
                                                    <div class="progress-bar bg-dark" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row mb-5 justify-content-between ">
                                        <div class="col-lg-8 col-md-7">
                                            <h4 class="card-title ">Hareketler</h4>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-5">
                                            <button class="w-100 more_log-btn btn  btn-outline-primary">Daha fazla</button>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled activity-wid activity_log_list-stat" >
                                       @foreach(\App\Models\Logs::orderBy('id','desc')->skip(0)->take(10)->get() as $item)
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs" title="{{$item->title}}">
                                            <span class="avatar-title bg-soft-{{$item->color}} text-{{$item->color}} rounded-circle">
                                                <i class="{{$item->icon}}"></i>
                                            </span>
                                                </div>
                                                <div class="d-flex align-items-start">
                                                    <div class="me-3">
                                                        <h5 class="font-size-14">{{$item->created_at}} <i
                                                                class="mdi mdi-arrow-right text-primary align-middle ms-2"></i>
                                                        </h5>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div>
                                                          {{$item->text}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach



                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>


            </div>
            <!-- End Page-content -->
            @include('section.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>

<!-- end container-fluid -->

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="/admin-assets/assets/libs/jquery/jquery.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-assets/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/admin-assets/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/admin-assets/assets/libs/node-waves/waves.min.js"></script>
<script src="/admin-assets/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- bootstrap datepicker -->
<script src="/admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="/admin-assets/assets/libs/select2/js/select2.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>


<script src="/admin-assets/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="/admin-assets/assets/js/pages/dashboard-2.init.js"></script>
<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
