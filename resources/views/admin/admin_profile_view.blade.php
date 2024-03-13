@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-4">
                                <img id="showImage" class="rounded img-thumbnail" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image): url('upload/admin_images/no_image.jpg') }}" alt="Card image cap">
                        </div>   
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">User: {{ $adminData->name}}</h4><hr>
                                <p class="card-title">Email: {{ $adminData->email}}</p>
                                <p class="card-title">Username: {{ $adminData->username}}</p>
                                <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit profile</a>
                            </div>
                        </div>  
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>



@endsection