<script type="text/javascript" src="<?php echo ADMIN_CATALOG; ?>javascript/summernote/summernote.js"></script>
 <link href="<?php echo ADMIN_CATALOG; ?>javascript/summernote/summernote.css" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo ADMIN_CATALOG; ?>javascript/summernote/summernote-image-attributes.js"></script>
 <script type="text/javascript" src="<?php echo ADMIN_CATALOG; ?>javascript/summernote/opencart.js"></script>
  <script type="text/javascript" src="<?php echo CATALOG; ?>js/toastr.min.js"></script>
 
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">

$(document).ready(function() {
    $('.multiple').select2();
});
   

 $('#summernote').summernote({
    height: ($(window).height() - 300),
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
});

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: "<?php echo base_url('admin/upload_image'); ?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {
              var image = $('<img>').attr('src',url);
            $('#summernote').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}


 $('#summernote1').summernote({
    height: ($(window).height() - 300),
    callbacks: {
        onImageUpload: function(image) {
            uploadImage1(image[0]);
        }
    }
});

function uploadImage1(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: "<?php echo base_url('admin/upload_image'); ?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {
              var image = $('<img>').attr('src',url);
            $('#summernote1').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>


<footer id="footer"><a href="">Cyberworx</a> &copy; 2019-<?php echo date('Y'); ?> All Rights Reserved.</footer></div>
<style>
    .toast-top-right .toast {
    background-color: #1d1d1d !important;
    box-shadow: 0 0 12px #484848 !important;
    border: 1px solid #3a3a3a;
}
</style>
