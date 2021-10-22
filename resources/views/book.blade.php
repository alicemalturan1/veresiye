<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Destek Biletleri | Panel</title>
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
    <div id="layout-wrapper">

    @include('section.top_menu')
    @include('section.left_menu')

    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                @include('section.page_header',['title'=>'Destek Biletleri'])


                <div class="row  ">

                    <div class="row pt-5 pt-lg-1 justify-content-end">
                            <div class="col-xl-2 col-lg-3">
                                <button class="w-100 btn btn-dark waves-effect waves-light ">
                                    <i class="fas fa-plus font-size-16 align-middle me-1"></i>
                                    Yeni borç
                                </button>
                            </div>
                    </div>
                <div class="row pt-3">

                    <div class="col-lg-6 ">
                        <div class="card">
                            <div class="card-body">


                                <h4 class="card-title mb-4">Ödenmemiş Borçlar</h4>
                                <div class="row pt-4">
                                    <div class="col-lg-6 pt-1">
                                        <button class="w-100 btn btn-outline-success waves-effect waves-light ">
                                            <i class="fas fa-angle-double-right font-size-16 align-middle me-1"></i>
                                            Hepsini Bilgilendir
                                        </button>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <button class="w-100 btn btn-outline-primary waves-effect waves-light ">
                                            <i class="fas fa-check  font-size-16 align-middle me-1"></i>
                                            Seçilenleri Bilgilendir
                                        </button>
                                    </div>
                                </div>
                                <div id="new" class="p-1 pb-3 pt-2 task-list">
                                    <div class="col-lg-12 not_found-text text-center font-size-12 @if(count(\App\Models\Payers::where('odeme_durumu',0)->get())>0) d-none @endif text-muted">
                                        Şu anda ödenmemiş borç bulunmuyor.
                                    </div>
                                    @foreach(\App\Models\Payers::where('odeme_durumu',0)->get() as $item)
                                        <div class="card task-box" data-id="{{$item->id}}">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item show_ticket_modalbtn" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#show_ticket_modal" href="#">Görüntüle</button>
                                                        <button class="dropdown-item reply_supportticket_btn" data-id="{{$item->id}}" disabled >Yanıtla</button>
                                                    </div>
                                                </div>

                                                <div class="pt-2">

                                                    <div class="team float-start">

                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-sm">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                            {{$item->ad[0]}}
                                                        </span>
                                                            </div>
                                                        </a>

                                                    </div>
                                                    <div class="float-start p-2 px-4 align-middle">
                                                        <h5 class="font-size-15"><a href="javascript: void(0);"
                                                                                    class="text-dark">{{$item->ad}}</a></h5>
                                                    </div>
                                                    <div style="clear:both;"></div>
                                                    <div class="row">
                                                        <div class="col-lg-12 d-flex justify-content-between pt-4 ">
                                                            <div class="float-start">
                                                                <h5 class="font-size-15 mb-1"> Bilgilendirme Durumu :</h5>
                                                                <div class="mb-0 text-muted">{!! $item->bilgilendirme_durumu?"<span class='badge font-size-12 bg-success'>Bilgilendirildi</span>":"<span class='badge font-size-12 bg-danger'>Bilgilendirilmedi</span>"  !!}</div>
                                                            </div>
                                                            <div class="text-end">
                                                                <h5 class="font-size-15 mb-1">{{$item->borc_miktari}}</h5>
                                                                <p class="mb-0 text-muted">Türk Lirası</p>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>
                                            </div>

                                        </div>
                                        <!-- end task card -->
                                    @endforeach

                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 ">
                        <div class="card">
                            <div class="card-body">


                                <h4 class="card-title mb-4">Ödenmiş Borçlar</h4>
                                <div class="row pt-4">
                                    <div class="col-lg-6 pt-1">
                                        <button class="w-100 btn btn-outline-success waves-effect waves-light ">
                                            <i class="fas fa-angle-double-right font-size-16 align-middle me-1"></i>
                                            Hepsini Bilgilendir
                                        </button>
                                    </div>
                                    <div class="col-lg-6 pt-1">
                                        <button class="w-100 btn btn-outline-primary waves-effect waves-light ">
                                            <i class="fas fa-check  font-size-16 align-middle me-1"></i>
                                            Seçilenleri Bilgilendir
                                        </button>
                                    </div>
                                </div>
                                <div id="locked" class="p-1 pb-3 pt-2 task-list">
                                    <div class="col-lg-12 not_found-text text-center font-size-13 @if(count(\App\Models\Payers::where('odeme_durumu',1)->get())>0) d-none @endif text-muted">
                                        Şu anda ödenmiş borç bulunmuyor.
                                    </div>
                                    @foreach(\App\Models\Payers::where('odeme_durumu',1)->get() as $item)
                                        <div class="card task-box" data-id="{{$item->id}}">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item show_ticket_modalbtn" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#show_ticket_modal" href="#">Görüntüle</button>
                                                        <button class="dropdown-item reply_supportticket_btn" data-id="{{$item->id}}" disabled >Yanıtla</button>
                                                    </div>
                                                </div>

                                                <div class="pt-2">

                                                    <div class="team float-start">

                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-sm">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                            {{$item->ad[0]}}
                                                        </span>
                                                            </div>
                                                        </a>

                                                    </div>
                                                    <div class="float-start p-2 px-4 align-middle">
                                                        <h5 class="font-size-15"><a href="javascript: void(0);"
                                                                                    class="text-dark">{{$item->ad}}</a></h5>
                                                    </div>
                                                    <div style="clear:both;"></div>
                                                    <div class="row">
                                                        <div class="col-lg-12 d-flex justify-content-between pt-4 ">
                                                            <div class="float-start">
                                                                <h5 class="font-size-15 mb-1"> Bilgilendirme Durumu :</h5>
                                                                <div class="mb-0 text-muted">{!! $item->bilgilendirme_durumu?"<span class='badge font-size-12 bg-success'>Bilgilendirildi</span>":"<span class='badge font-size-12 bg-danger'>Bilgilendirilmedi</span>"  !!}</div>
                                                            </div>
                                                            <div class="text-end">
                                                                <h5 class="font-size-15 mb-1">{{$item->borc_miktari}}</h5>
                                                                <p class="mb-0 text-muted">Türk Lirası</p>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>
                                            </div>

                                        </div>
                                        <!-- end task card -->
                                    @endforeach

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

<script>
    var drake = dragula([document.getElementById("new"),document.getElementById("in_progress"),document.getElementById("locked")],{
        moves:function(el, target, source, sibling){
            var current_id =$(el).parent().attr("id"),new_id=$(target).attr("id");
            if( !(current_id =="locked" )){
                return true;
            }
        }
    });
    drake.on('drop',function(el, target, source, sibling){
        var progress_list = {"new":0,'locked':2,'in_progress':1};
        var dropped =progress_list[$(target).attr("id")];
        var id = $(el).data('id');
        if ($(target).attr("id") == "locked"){
            $(".reply_supportticket_btn[data-id="+id+"]").attr("disabled",true);
        }else{
            $(".reply_supportticket_btn[data-id="+id+"]").attr("disabled",false);
        }
        axios.post('/admin/support_ticket/update_presence',{"id":id,'presence':dropped});
    });
</script>
<script>

</script>
</body>

</html>