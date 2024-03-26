@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">        
        <div class="row">
            <form method="POST" action="{{ route('store.multi.image') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Multi Image</h4>
                        </div>
                        <div class="card-body">                             
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                        <h5 class="card-title">About Multi Image</h5>    
                                        <input class="form-control" type="file" id="multi_image" name ="multi_image[]" multiple="" >
                                        
                                </div>
                            </div>
                            <div class="row mb-3">   
                                <div class="col-sm-12">
                                    <output id="list"></output>
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
    function handleFileSelect(evt) {
        $('#list').empty(); //Clean the list before print news elements
        var files = evt.target.files; // FileList object

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function(theFile) {
                return function(e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.className = 'img-wrap'; // Add class to the span
                    span.innerHTML = ['<img class="rounded img-thumbnail" style="max-width: 200px; height:150px;" src="', e.target.result,
                                    '" title="', escape(theFile.name), '"/>'].join('');
                    document.getElementById('list').insertBefore(span, null);
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    document.getElementById('multi_image').addEventListener('change', handleFileSelect, false);



    });

</script>  

<style>
.img-wrap {
    position: relative;
    display: inline-block;
}
</style>
@endsection