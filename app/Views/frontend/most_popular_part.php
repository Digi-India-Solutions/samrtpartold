<?php 
$this->extend('layout/master');
$this->section('page');
use CodeIgniter\HTTP\RequestInterface;
use App\Models\ProductFrontModel;
$ProductFrontModel = new ProductFrontModel();
 ?>
 

 
<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo base_url($meta->image); ?>" alt="title-banner" />
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2><?php echo $meta->name; ?></h2>
                        <p><?php echo $meta->sub_heading; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-links">
              <?php foreach($breadcrumbs as $key => $value){ echo $key==0?'':'/';  ?>
            
              <a href="<?php echo $value['href']; ?>"><?php echo $value['text']; ?> </a>  
            <?php } ?>
        </div>
    </div>
</section>
<span class="filter-toggle"><i class="las la-filter"></i> <font>Filters</font></span>
<section class="section-space">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 product_lisitng-info">
                    <h5>Total <?php echo $total_rows?$total_rows:'0'; ?> parts</h5>
                    <h3><?php echo $meta->name; ?></h3>
                </div>
                   <div class="col-lg-6 offset-lg-0 col-sm-5 offset-sm-1">
                    <div class="form-group mt-md-0 mt-4">
                       <form id="sorting_form">
                          <div class="row">
                              <div class="col-md-6">
                                      <label class="form-label">Search by Product Name or number</label>
                                  <div class="form-group inline-submit-btn">
                                      <input type="text" required placeholder="Product Name / Code" name="search" value="<?php echo @$_GET['search']; ?>" class="form-control outline-bold" /><button type="submit"> <i  class="fas fa-arrow-circle-right fa-2x" ></i></button>
                                  </div>
                                  
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Sort Products</label>
                                  <select class="form-select outline" name="sorting" id="sorting">
                                    <option value="">Select Option</option>
                                    <option value="asc" <?php echo @$_GET['sorting']=='asc'?'selected':'';?>>Price Low to High</option>
                                    <option value="desc" <?php echo @$_GET['sorting']=='desc'?'selected':'';?>>Price High to Low</option>
                                </select>
                              </div>
                          </div>
                        
                    </form>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3 col-sm-12">
                    <div class="filters">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Filters</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo current_url(); ?>">Reset</a>
                            </div>
                        </div>
                      
                     <?php if (!empty($filter)) { foreach ($filter['group'] as $key => $value) { if(!empty($filter['option'][$key])){?>
                        

                        <div class="filter_block active">
                            <div class="filter_head"><?php echo $value->name; ?></div>
                            <div class="filter_content">
                                <ul>
                                  <?php foreach ($filter['option'][$key] as $key1 => $row) {?>                                   

                                    <li><label><input type="checkbox" name="filter_id[]" value="<?php echo $row->id; ?>" class="filter"> <?php echo $row->name; ?></label></li>

                                   <?php } ?>
                                </ul>
                            </div>
                        </div>
                      
                      <?php } } } ?>
                                             
                        
                
                        <div class="filter_block active">
                            <div class="filter_head">Price</div>
                            <div class="filter_content">
                                <div id="fee_filter" class="common_selector ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="<?php echo $min?$min:'0'; ?>" data-max="<?php echo $max?$max:''; ?>" data-min-set="0" data-max-set="100000"></div>
                                <div class="min_max_fee">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <input type="text" readonly="" id="min_fee">
                                            <input type="hidden" id="min_feehide" value="<?php echo $min?$min:'0'; ?>">
                                        </div>
                                        <div class="col-md-6 col-6 text-right">
                                            <input type="text" readonly="" id="max_fee">
                                            <input type="hidden" id="max_feehide" value="<?php echo $max?$max:''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </div>
                </div>
                
      <div class="col-lg-9 col-sm-12">
          <div class="row" id="my__List">
             

              <?php if (!empty($product)) { foreach ($product as $key => $row) {
               
                ?>
             
              <div class="col-xl-4 col-lg-6 col-sm-6">
                  <div class="product-block">
                      <div class="product-image">
                         <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>"> <img src="<?php echo $row['image']?base_url($row['image']):base_url($config_logo); ?>" alt="<?php echo $row['name']; ?>" /></a>
                      
                          <span onclick="add_to_wishlist('<?php echo encrypt_url($row['id']); ?>')" class="product-wishlist <?php echo in_array($row['id'], $wishlist)?'added':'';?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><a href="javascript:void();"><i class="fa fa-heart"></i></a></span>
                           
                      </div>
                      <div class="product-info">
                          <a href="<?php echo base_url('product-detail/'.$row['product_seo_url']); ?>"><h2><?php echo $row['name']; ?></h2></a>
                          <p><?php echo substr(strip_tags($row['description']),0,100); ?></p>
                          <span class="product_number">Part Number : <b><?php echo $row['part_no']; ?></b></span>
                          <div class="row align-items-center">
                              <div class="col-md-7">
                                  <div class="star-rating-box" data-rating="<?php echo @$row['rating']?$row['rating']:0; ?>">
                                      <span><i class="fa fa-star"></i></span>
                                      <span><i class="fa fa-star"></i></span>
                                      <span><i class="fa fa-star"></i></span>
                                      <span><i class="fa fa-star"></i></span>
                                      <span><i class="fa fa-star"></i></span>
                                  </div>
                              </div>
                              <div class="col-md-5 pr-0">
                                  <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>#review">Read Review</a>
                              </div>
                          </div>
                          <div class="product-price">
                              <?php if(!empty($row['price'])){?>
                              <div class="row">
                                  <div class="col-md-7 pr-0">
                                      <p>$ <?php echo $row['price']; ?> 

                                      <?php if (!empty($row['save_percentage'])): ?>
                                           <span class="discount"><?php echo $row['save_percentage']; ?> % Off</span>
                                      <?php endif ?>
                                    </p>
                                  </div>
                                  <?php if (!empty($row['old_price'])): ?>
                                       <div class="col-md-5 text-right">
                                      <p><strike>$ <?php echo $row['old_price']; ?></strike></p>
                                  </div>
                                  <?php endif ?>
                                 
                              </div>
                              <?php } ?>
                              
                              
                          </div>
                          <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>" class="theme-btn full">SHOP NOW</a>
                      </div>
                  </div>
              </div>

          <?php } } ?>


                        
                        


                    </div>
                    <?php if (!empty($product)) { ?>
                        <div class="col-md-12 mt-4 viewmore">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <a href="javascript:void();" class="theme-btn full" id="btn_load">VIEW MORE</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        
                </div>
            </div>
        </div>
    </div>
</section>

	<section class="smart-section contact-us-stripe-section">
		<div class="container">
			<div class="contact-stripe-flex" style="background-image: url('<?php echo $home_heading->sup_image?base_url($home_heading->sup_image):base_url($config_logo); ?>');">
				<div class="section-head">
					<h5 class="label"><?php echo $home_heading->sup_heading; ?></h5>
					<h2><?php echo $home_heading->sup_sub_heading; ?></h2>
					<p><?php echo $home_heading->sup_des; ?></p>
				</div>
				<div class="button">
					<a href="<?php echo base_url($home_heading->link); ?>" class="theme-btn">Contact Us</a>
				</div>
			</div>
		</div>
	</section>


<form id="filter_form">
<input type="hidden" name="type" id="type" value="">    
<input type="hidden" name="filter_id" id="filter_id" value="">
<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>">
<input type="hidden" name="min_price" id="min_price" value="">
<input type="hidden" name="max_price" id="max_price" value="">
<input type="hidden" name="sorting"  value="<?php echo @$_GET['sorting']; ?>">
<button type="submit" id="btn_filter" class="d-none">Submit</button>
</form>



<script>

var min_fee = parseFloat($("#fee_filter").attr("data-min"));
var max_fee = parseFloat($("#fee_filter").attr("data-max"));
var min_set_fee = parseFloat($("#fee_filter").attr("data-min-set"));
var max_set_fee = parseFloat($("#fee_filter").attr("data-max-set"));
$( "#fee_filter" ).slider({
  range: true,
  min: min_fee,
  max: max_fee,
  values: [ min_set_fee, max_set_fee ],
  slide: function( event, ui ) {
    $("#min_fee").val("$"+ui.values[0]+"");
    $("#max_fee").val("$"+ui.values[1]+"");
    $("#min_feehide").val(ui.values[0]);
    $("#max_feehide").val(ui.values[1]);
  }
});

$( "#min_feehide" ).val($("#fee_filter" ).slider( "values", 0 ));
$( "#max_feehide" ).val($("#fee_filter" ).slider( "values", 1 ));

$( "#min_fee" ).val("$"+$("#fee_filter" ).slider( "values", 0 )+"");
$( "#max_fee" ).val("$"+$("#fee_filter" ).slider( "values", 1 )+"");


$('select#sorting').on('change',function(){
    $('form#sorting_form').submit();
});


$('#fee_filter').slider({
    change: function(event, ui) { 
      var min_fee = parseFloat($("#min_feehide").val());
      var max_fee = parseFloat($("#max_feehide").val());
      $('#min_price').val(min_fee);
      $('#max_price').val(max_fee);
      $('#type').val('filter');
      $('#offset').val('');
      $('#btn_load').html('Load More'); 
      $('#btn_filter').click();
    } 
});



$('.filter').on('click',function(){
  var filter="";
    $("input[name='filter_id[]']:checked:enabled").each(function() {
        filter=$(this).val()+","+filter;
    });
 
  $('#filter_id').val(filter);
  $('#type').val('filter');
  $('#offset').val('');
  $('#btn_load').html('Load More');  
  $('#btn_filter').click();
  
});


$('#btn_load').on('click',function(){
  $('#type').val('load');
  $('#btn_filter').click();
});



$('form#filter_form').submit(function(e){
     var type = $('#type').val();
      e.preventDefault();
      var form = $(this);
      $.ajax({
      url:"<?php echo base_url('get_most_product_part_ajax'); ?>",
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
          if(type=='load'){
            $('#btn_load').html('<i class="fas fa-spinner fa-spin"></i> Loading...');   
          }
          
      },
      
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
             $('#offset').val(obj.offset);
             if(type=='load'){
               $('#my__List').append(obj.ss); // its load more data
               $('#btn_load').html('Load More');   
             }else{
              $('#my__List').html(obj.ss); //its filter data
             }
            
             $('#btn_load').blur();
            
             $(".star-rating-box").each(function(){
                var rating = $(this).attr("data-rating");
                if(rating != 'NAN'){
                var rating_split = rating.split(".");
                var rating_one = rating_split[0];
                var rating_two = rating_split[1];
                $(this).find("span:nth-child("+rating_one+")").addClass("fill");
                $(this).find("span:nth-child("+rating_one+")").prevAll().addClass("fill");
                if(rating_two <= 5 && rating_two > 0){
                    $(this).find("span:nth-child("+rating_one+")").next().addClass("hfill");
                }else if(rating_two > 5){
                    $(this).find("span:nth-child("+rating_one+")").next().addClass("fill");
                }
                }
            });
             
        }else{
            
            if(obj.clear){
                $('#my__List').html('No Result Found'); 
                $('.viewmore').hide();
            }
            
            $('#btn_load').html(obj.msg); 
              if(type=='load'){
                $('#btn_load').blur();  
              }
          }
      },

    });
});





</script>
<?php $this->endSection(); ?>
