<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Satışlar</title>
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
    <div class="modal fade" id="new_sale_modal" tabindex="-1" role="dialog"
         aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="composemodalTitle"> Satış Ekle </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form class="add_sale_form">
                    <div class="modal-body">

                        <div>



                            <div class="mb-3">
                                <input type="text" class="form-control" name="total" data-toggle="touchspin" placeholder="Satış Tutarı">
                            </div>
                            <div class="mb-3">
                                <select name="payment_status" class="form-control">
                                    <option value="warning-Ödeme Bekliyor">Ödeme Bekliyor</option>
                                    <option value="success-Ödendi">Ödendi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="payment_method" class="form-control">
                                    <option value="Nakit">Nakit</option>
                                    <option value="Kart">Kart</option>
                                </select>
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
    <div class="modal fade" id="detail_sale_modal" tabindex="-1" role="dialog"
         aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="composemodalTitle"> Satış Ekle </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form class="add_sale_form">
                    <div class="modal-body">

                        <div>



                            <div class="mb-3">
                                <input type="text" class="form-control" name="total" data-toggle="touchspin" placeholder="Satış Tutarı">
                            </div>
                            <div class="mb-3">
                                <select name="payment_status" class="form-control">
                                    <option value="warning-Ödeme Bekliyor">Ödeme Bekliyor</option>
                                    <option value="success-Ödendi">Ödendi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="payment_method" class="form-control">
                                    <option value="Nakit">Nakit</option>
                                    <option value="Kart">Kart</option>
                                </select>
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
    <div class="modal fade" id="edit_sale_modal" tabindex="-1" role="dialog"
         aria-labelledby="composemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="composemodalTitle"> Satış Düzenle </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="edit_modalform-block"></div>
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

                @include('section.page_header',['title'=>'Satışlar'])


                <div class="row  ">

                    <div class="row pt-5 pt-lg-1 justify-content-end">
                        <div class="col-xl-2 col-lg-3">
                            <button class="w-100 btn  btn-dark waves-effect waves-light " data-bs-target="#new_sale_modal" data-bs-toggle="modal">
                                <i class="fas fa-plus font-size-16 align-middle me-1"></i>
                                Yeni Satış
                            </button>
                        </div>
                    </div>
                    <div class="row pt-3">

                        <div class="col-lg-12 ">
                            <div class="card">
                                <div class="card-body">





                                    <div  class="p-1 pb-3 ">

                                        <div class="table-responsive">
                                            <table class="table table-centered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Tarih</th>
                                                    <th scope="col">Tutar</th>

                                                    <th scope="col" >Ödeme Durumu</th>
                                                    <th scope="col">İşlem</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(\App\Models\Sales::orderBy('id','desc')->get() as $item)

                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{\Carbon\Carbon::parse($item->created_at)->day."/".\Carbon\Carbon::parse($item->created_at)->month."/".\Carbon\Carbon::parse($item->created_at)->year}}</td>

                                                        <td>₺ {{$item->price}}</td>


                                                        <td><span class="badge badge-soft-{{$item->payment_status_color}} font-size-12">{{$item->payment_status}}</span>
                                                        </td>
                                                        <td>


                                                                <button class="btn btn-success edit_salemodalbtn btn-sm " data-bs-target="#edit_sale_modal" data-bs-toggle="modal" data-id="{{$item->id}}">Düzenle</button>

                                                        </td>
                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>



                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- end col -->
                    </div>

                </div>
                <!-- end row -->

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

<!--tinymce js-->
<script src="/admin-assets/assets/libs/tinymce/tinymce.min.js"></script>

<script src="/admin-assets/assets/libs/select2/js/select2.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- dragula plugins -->
<script src="/admin-assets/assets/libs/dragula/dragula.min.js"></script>

<script src="/admin-assets/assets/js/pages/task-kanban.init.js"></script>
<!-- form repeater js -->
<script src="/admin-assets/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="/admin-assets/assets/js/pages/form-advanced.init.js"></script>
<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>


</body>

</html>
