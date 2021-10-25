<form class="edit_sale_form">
    <div class="modal-body">

        <div>
            <input type="hidden" value="{{$sale->id}}" name="id">


            <div class="mb-3">
                <input type="text" class="form-control" name="total" data-toggle="touchspin" placeholder="Satış Tutarı" value="{{$sale->price}}">
            </div>
            <div class="mb-3">
                <select name="payment_status" class="form-control">
                    <option @if($sale->payment_status_color."-".$sale->payment_status=="warning-Ödeme Bekliyor") selected @endif value="warning-Ödeme Bekliyor">Ödeme Bekliyor</option>
                    <option @if($sale->payment_status_color."-".$sale->payment_status=="success-Ödendi") selected @endif value="success-Ödendi">Ödendi</option>
                </select>
            </div>
            <div class="mb-3">
                <select name="payment_method" class="form-control">
                    <option @if($sale->payment_method=="Nakit") selected @endif value="Nakit">Nakit</option>
                    <option @if($sale->payment_method=="Kart") selected @endif value="Kart">Kart</option>
                </select>
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" rows="10" placeholder="Açıklama (Opsiyonel)">{{$sale->description}}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
           <div class="col-lg-12">
               <div class="alert bg-soft-primary text-dark">Son Güncelleme : {{$sale->updated_at?$sale->updated_at:"Henüz Güncellenmedi"}}</div>
           </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-success">Güncelle <i
                class="fas fa-location-arrow align-middle ms-1"></i></button>
    </div>
</form>
