<?php
    $package = DB::table('package')->get();
?>
@foreach($package as $pack)
    <div class="col-md-4">
        <p class="text-muted">Package name:</p>
        <h3 class="panel-heading">{{$pack->name}}</h3>
        <p class="text-muted">Package details:</p>
        <h3 class="panel-heading">{{$pack->details}}</h3>
        <p class="text-muted">Package price:</p>
        <h3 class="panel-heading">{{$pack->price}}</h3>
    </div>
@endforeach

