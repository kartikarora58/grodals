@extends('user.layouts.app')
@extends('user.layouts.user')
@section('content')
<style>
    .msg
    {
        text-align: center;
        height: 50px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(is_null($user))
                <div class="card-body">
                    <div class="alert alert-info msg">
                        <strong>Please Create your Profile</strong>
                    </div>
                </div>
                @else
                <div class="card-body">
                    @if($user->status==null)
                    <div class="aler alert-info msg">
                        <b>Status<br></b> Pending
                    </div>
                    @elseif($user->status==1)
                    <div class="aler alert-success msg">
                        <b>Status<br></b> Approved by the administrator
                    </div>
                    @else
                    <div class="aler alert-danger msg">
                        <b>Status<br></b> Rejected.Contact the Adminstrator
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
