@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">        
        <div class="row">
            <form method="POST" action="{{ route('store.silde') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Home Slide Page</h4>
                        </div>
                        <div class="card-body">                             
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <img id="showImage" class="rounded img-thumbnail" src="{{ (!empty($homeSlide->home_slide))? url('upload/admin_images/'.$homeSlide->home_slide): url('upload/admin_images/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                <div class="col-sm-10">
                                        <h5 class="card-title">Slide Image</h5>    
                                        <input class="form-control" type="file" id="home_slide" name ="home_slide" >
                                </div>
                            </div>                     
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title" name ="title" value="{{ $homeSlide->title}}" >
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="short_title" name="short_title" value="{{ $homeSlide->short_title}}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-5">
                                <label for="video_url" class="col-sm-2 col-form-label">Video url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="video_url" name ="video_url" value="{{ $homeSlide->video_url}}" >
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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