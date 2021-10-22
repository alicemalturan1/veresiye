@php $color=''; @endphp
@if(Illuminate\Support\Facades\Cookie::get('panel_color'))
    @if(Illuminate\Support\Facades\Cookie::get('panel_color')=="dark")
        @php
            $color='-dark';
        @endphp
    @else
        @php
            $color='';
        @endphp
    @endif
@endif
<link href="/admin-assets/assets/css/bootstrap{{$color}}.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="/admin-assets/assets/css/app{{$color}}.min.css" id="app-style" rel="stylesheet" type="text/css" />
