
@foreach($messages as $message)
    @if($message->user_id == $main->user_id)
    <div class="col-lg-12 px-2">
        <div class="card border @if($message->id == $main->id) border-danger  @endif " style="border-radius: 0.6rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="avatar-xs float-start">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                         {{\App\Http\Controllers\UserController::get_by_id($message->user_id)->name[0]}}
                                                        </span>
                        </div>
                        <div class="col-11  float-start pt-0 p-3 row">
                            <div class="col-lg-12 text-dark">    {{\App\Http\Controllers\UserController::get_by_id($message->user_id)->name." ".\App\Http\Controllers\UserController::get_by_id($message->user_id)->surname}} </div>
                            <div class="pt-1">
                                    {{$message->description}}
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    @else

        <div class="col-lg-12 px-2">
            <div class="card border" style="border-radius: 0.6rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-11  float-start pt-0 p-3 row">
                                <div class="col-lg-12 text-dark">    {{\App\Http\Controllers\UserController::get_by_id($message->user_id)->name." ".\App\Http\Controllers\UserController::get_by_id($message->user_id)->surname}} </div>
                                <div class="pt-1">
                                    {{$message->description}}
                                </div>

                            </div>

                            <div class="avatar-xs float-start" >
                                                     <a href="#"  class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                         {{\App\Http\Controllers\UserController::get_by_id($message->user_id)->name[0]}}
                                                        </a>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endif

@endforeach
@if($main->presence == 2)
    <div class="col-lg-12 text-center">
        {{\App\Http\Controllers\ContentController::encode_date($main->updated_at)}} tarihinde kilitlendi
    </div>
    @endif
