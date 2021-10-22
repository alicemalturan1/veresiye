$(document).ready(function (){

    $(document).on("click",".delete-content_btn",function (){
        var id = $(this).data('id');
        console.log(id);
        swal.fire({
            title: "Silmek istediğinizden emin misiniz?",

            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Evet,sil!",
            cancelButtonText:"İptal"
        }).then(function(t) {
            t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
        });

    });





});
