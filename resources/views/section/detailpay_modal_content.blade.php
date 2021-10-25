<div class="p-3">


    <div class="mb-3">
        <input type="text" class="form-control" name="name" value="{{$payer->ad}}" placeholder="Borçlu Kişi" readonly>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="phone" value="{{$payer->telefon_no}}" placeholder="Telefon Numarası (5.....)" maxlength="10" readonly>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="total" value="{{$payer->borc_miktari}} ₺" data-toggle="touchspin" placeholder="Borç Miktarı" readonly>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="category"  placeholder="Kategori" value="Sipariş" readonly>
    </div>

    <div class="mb-3">
        <textarea name="description" class="form-control" rows="10" placeholder="Açıklama (Opsiyonel)" style="resize:none;height:auto;" readonly>{{$payer->description}}</textarea>
    </div>
    <div class="row pt-3">
        <div class="col-lg-12">
            <div class="alert bg-soft-primary text-dark">
                Son Güncelleme : {{$payer->updated_at?$payer->updated_at:"Henüz güncelleme işlemi gerçekleşmedi."}}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="alert bg-soft-success text-dark">
                Veresiye Kategori : {{$payer->kategori}}
            </div>
        </div>
    </div>
</div>
