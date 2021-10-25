!function(t){"use strict";function s(){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)"nav-item dropdown active"===e[t].parentElement.getAttribute("class")&&(e[t].parentElement.classList.remove("active"),e[t].nextElementSibling.classList.remove("show"))}function n(e){var color= '';if(t("#"+e).prop("checked")==true)color='dark';else color='light';axios.post('/admin/setPanelColor',{"color":color});if(t("#"+e).prop("checked")==true){t("#bootstrap-style").attr("href","/admin-assets/assets/css/bootstrap-dark.min.css");t("#app-style").attr("href","/admin-assets/assets/css/app-dark.min.css");}else{t("#bootstrap-style").attr("href","/admin-assets/assets/css/bootstrap.min.css");t("#app-style").attr("href","/admin-assets/assets/css/app.min.css");}}function e(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||(console.log("pressed"),t("body").removeClass("fullscreen-enable"))}var a;t("#side-menu").metisMenu(),t("#vertical-menu-btn").on("click",function(e){e.preventDefault(),t("body").toggleClass("sidebar-enable"),992<=t(window).width()?t("body").toggleClass("vertical-collpsed"):t("body").removeClass("vertical-collpsed")}),t("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("mm-active"),t(this).parent().parent().addClass("mm-show"),t(this).parent().parent().prev().addClass("mm-active"),t(this).parent().parent().parent().addClass("mm-active"),t(this).parent().parent().parent().parent().addClass("mm-show"),t(this).parent().parent().parent().parent().parent().addClass("mm-active"))}),t(".navbar-nav a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("active"),t(this).parent().parent().addClass("active"),t(this).parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().parent().parent().addClass("active"))}),t('[data-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),t("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",e),document.addEventListener("webkitfullscreenchange",e),document.addEventListener("mozfullscreenchange",e),t(".right-bar-toggle").on("click",function(e){t("body").toggleClass("right-bar-enabled")}),t(document).on("click","body",function(e){0<t(e.target).closest(".right-bar-toggle, .right-bar").length||t("body").removeClass("right-bar-enabled")}),function(){if(document.getElementById("topnav-menu-content")){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)e[t].onclick=function(e){"#"===e.target.getAttribute("href")&&(e.target.parentElement.classList.toggle("active"),e.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",s)}}(),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),window.sessionStorage&&((a=sessionStorage.getItem("is_visited"))?(t(".right-bar input:checkbox").prop("checked",!1),t("#"+a).prop("checked",!0),n(a)):sessionStorage.getItem("is_visited")),t("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",function(e){n(e.target.id)}),t(window).on("load",function(){t("#status").fadeOut(),t("#preloader").delay(350).fadeOut("slow")}),Waves.init();$(".reset-file-content").click((e)=>{e.preventDefault();$("#inputGroupFile03").val(null);});}(jQuery);$(document).ready(function(){$(".cnt_dcinput").change(function(){

        $(".cnt_dcinput").parent().removeClass("border-primary");
        $(this).parent().addClass("border-primary");

});
$(".select_item-btn").click(function(){
   $(".task-box[data-id="+$(this).data("id")+"]").toggleClass("border border-danger");
});
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

$(".detail_pay-btn").click(function(){
    axios.post('/getPayModalContent',{"id":$(this).data("id")}).then(function(v){
        $(".detail_pay_modal-body").html(v.data);
    });
});
$(".whatsapp_apiconfig").submit(function(e){
        e.preventDefault();
        axios.post('/update_wpapiconfig',$(this).serialize()).then(()=>{
            Toast.fire({
                icon:"success",
                title:"Başarıyla kaydedildi"
            });
        }).catch(function(){
            Toast.fire({
                icon:"error",
                title:"Bir hata oluştu!"
            });
        });
    });
var skip_log = 10;
$(".more_log-btn").click(function(){
    axios.post('/more_log',{"skip":skip_log}).then(function(v){
        if (v.data.length){
            $.each(v.data,function(key,val){
                var ico = '<div class="activity-icon avatar-xs" title="'+val.title+'"> <span class="avatar-title bg-soft-'+val.color+' text-'+val.color+' rounded-circle"> <i class="'+val.icon+'"></i> </span> </div>';
                var text = '<div class="d-flex align-items-start"> <div class="me-3"> <h5 class="font-size-14"> '+val.created_at +' <i class="mdi mdi-arrow-right text-primary align-middle ms-2"></i> </h5> </div> <div class="flex-1"> <div> '+val.text+' </div> </div> </div>';
                $(".activity_log_list-stat").append('<li class="activity-list">'+ico+text+'</li>');
                skip_log+=10;
            });
        } if (!v.data.length || v.data.length<10){
            $(".more_log-btn").attr("disabled",true);
            $(".more_log-btn").text("Sonuna ulaştınız");
        }
    });
});
$(".panel_loginform").submit(function(e){
    e.preventDefault();
    axios.post('/login',$(this).serialize()).then( (v)=>{
        $(".panel_loginform .alert-danger").remove();
        $(".panel_loginform .alert-success").removeClass('d-none');
        setTimeout(()=>window.location.href= '/book',1500);
    }).catch(()=>{$(".panel_loginform .alert-danger").removeClass('d-none');});
});
$(".add_payersform").submit(function(e){
    e.preventDefault();
    $(".add_payersform button[type=submit]").attr("disabled",true);
    axios.post('/create_payer',$(this).serialize()).then(()=>{
        window.location.reload();
    }).catch(function(){
        $(".add_payersform button[type=submit]").attr("disabled",false);
        $(".add_payersform").children().eq(0).append("<div class='row'><div class='col-lg-12 '><div class='alert alert-danger'>Bir hata oluştu, lütfen eksik veri göndermeyin.</div></div></div>");
        setTimeout(function(){$(".add_payersform").children().eq(0).children().eq( $(".add_payersform").children().eq(0).children().length-1).remove();},1200);
    });
});
$(".add_sale_form").submit(function(e){
    e.preventDefault();
    var form = this;
    $(".add_sale_form button[type=submit]").attr("disabled",true);
    axios.post('/create_sale',$(this).serialize()).then(()=>{
        window.location.reload();
    }).catch(()=>{
        $(".add_sale_form button[type=submit]").attr("disabled",false);
        $(form).children().eq(0).append("<div class='row'><div class='col-lg-12'><div class='alert  alert-danger'>Bir hata oluştu, lütfen eksik veri göndermeyin</div></div></div>");
        setTimeout(()=>{$(form).children().eq(0).children().eq($(form).children().eq(0).children().length-1).remove();},1800);
    });


});
$(".edit_salemodalbtn").click(function(){

        $(".edit_modalform-block").html('<div class="row p-5 align-items-center"><div class="col-lg-12 text-center"><div class="spinner-border text-success m-1" role="status"> <span class="sr-only">Loading...</span> </div></div></div>');
        axios.post('/getEditSaleModalContent',{"id":$(this).data("id")}).then((v)=>{
            $(".edit_modalform-block").html(v.data);
        });
    });
$(document).on("submit",".edit_sale_form",function(e) {
        e.preventDefault();
        var form = this;
        $(".edit_sale_form button[type=submit]").attr("disabled",true);
        axios.post('/update_sale',$(this).serialize()).then(()=>{window.location.reload()}).catch(()=>{
            $(".edit_sale_form button[type=submit]").attr("disabled",false);
            $(form).children().eq(0).append("<div class='row'><div class='col-lg-12'><div class='alert  alert-danger'>Bir hata oluştu, lütfen eksik veri göndermeyin</div></div></div>");
            setTimeout(()=>{$(form).children().eq(0).children().eq($(form).children().eq(0).children().length-1).remove();},1800);
        });
    });
});
