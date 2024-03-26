@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">        
        <div class="row">
            <form method="POST" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $multiImage->id }}">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Multi Image</h4>
                        </div>
                        <div class="card-body">    
                                                     
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <img id="showImage" class="rounded img-thumbnail" src="{{ (!empty($multiImage->multi_image))? url($multiImage->multi_image): url('upload/admin_images/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                <div class="col-sm-8">
                                        <h5 class="card-title">About Multi Image</h5>    
                                        <input class="form-control" type="file" id="multi_image" name ="multi_image" >
                                        
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Multi Image">
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
        $('#multi_image').change( function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr("src", e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>    

@endsection