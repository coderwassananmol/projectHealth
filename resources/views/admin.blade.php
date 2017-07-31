@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    You are logged in as ADMIN!
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <h2 class="panel-heading">Add Package</h2>
            <form method="POST" action="/admin/addpackage">
                {{csrf_field()}}
                <p class="text-primary">Package name:</p>
                <input type="text" class="form-control" name="pname">
                <p class="text-primary">Package details:</p>
                <input type="text" class="form-control" name="pdetails">
                <p class="text-primary">Package price:</p>
                <input type="text" class="form-control" name="pprice">
                <br />
                <button type="submit" class="btn btn-primary">Add Package</button>
            </form>
            @if(session('feed')=='success')
                <p class="alert alert-success">Package added successfully!</p>
            @endif
        </div>
    </div>
</div>
@endsection
