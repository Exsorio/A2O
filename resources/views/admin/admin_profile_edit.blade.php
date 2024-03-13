@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">        
        <div class="row">
            <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Profile Page</h4>
                        </div>
                        <div class="card-body">                             
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <img id="showImage" class="rounded img-thumbnail" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image): url('upload/admin_images/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                <div class="col-sm-10">
                                        <h5 class="card-title">Profile Image</h5>    
                                        <input class="form-control" type="file" id="profile_image" name ="profile_image" >
                                </div>
                            </div>                     
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="name" name ="name" value="{{ $editData->name}}" >
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" id="email" name="email" value="{{ $editData->email}}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-5">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="username" name ="username" value="{{ $editData->username}}" >
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </div>
                    </div>
                </div> <!-- end col -->
            </form> <!-- end form -->
        </div>
        <!-- end row -->

    </div>
</div>

<script type="text/javascript">
    $(document).ready( function(){
        $('#profile_image').change( function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr("src", e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>    

@endsection