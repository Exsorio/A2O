@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">        
        <div class="row">
            <form method="POST" action="{{ route('update.password') }}">
                @csrf
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Password Page</h4>
                            @if (count($errors))
                                @foreach ($errors->all() as $error )
                                    <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="card-body">                    
                            <div class="row mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="old_password" name ="old_password" >
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-4">
                                <label for="example-email-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="new_password" name="new_password" >
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="confirm_password" name ="confirm_password"  >
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </div>
                    </div>
                </div> <!-- end col -->
            </form> <!-- end form -->
        </div>
        <!-- end row -->

    </div>
</div>

@endsection