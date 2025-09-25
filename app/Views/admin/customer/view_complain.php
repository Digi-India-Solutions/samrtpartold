<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-store" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/complaint'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1>View Complain</h1>
   <ul class="breadcrumb">
    <li><a href="javascript:void();">Home</a></li>
    <li><a href="<?php echo base_url('complaint'); ?>">Complain</a></li>
    <li><a href="javascript:void();">View complain</a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="panel panel-default">
   <div class="panel-heading">
    
     <?php if ($success = $this->session->flashdata('success')): ?>
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $success; ?></strong> </a>
    </div>
    <?php endif ?>

    <?php if ($error = $this->session->flashdata('error')): ?>
      <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $error; ?></strong> </a>
    </div>
    <?php endif ?>
    <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
   </div>
   <div class="panel-body">
   
    <?php echo form_open_multipart($form_action,'id="form-store" class="form-horizontal"'); ?>

     <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
      <li><a href="#tab-store" data-toggle="tab">Reply</a></li>
      <!-- <li><a href="#tab-local" data-toggle="tab">Local</a></li> -->
   
     </ul>
   
     <div class="tab-content">
      <div class="tab-pane active" id="tab-general">
         
        
       <table class="table table-responsive strip hover">
         <tr>
           <th>Full Name</th>
           <td><?php echo $detail->name; ?></td>
         </tr>
         <tr>
           <th>Email</th>
           <td><?php echo $detail->email; ?></td>
         </tr>
         <tr>
           <th>Phone</th>
           <td><?php echo $detail->phone; ?></td>
         </tr>
         <tr>
           <th>Purchase Date</th>
           <td><?php echo $detail->purchase_date; ?></td>
         </tr>
         <tr>
           <th>Channel Name</th>
           <td><?php echo $detail->channel_name; ?></td>
         </tr>
         <tr>
           <th>Category Name</th>
           <td><?php echo $detail->category_name; ?></td>
         </tr>
         <tr>
           <th>Product Name</th>
           <td><?php echo $detail->product_name; ?></td>
         </tr>
         <tr>
           <th>Problem</th>
           <td><?php echo $detail->problem; ?></td>
         </tr>
         <tr>
           <th>Address</th>
           <td><?php echo $detail->address; ?></td>
         </tr>
         <tr>
           <th>Landmark</th>
           <td><?php echo $detail->landmark; ?></td>
         </tr>

         <tr>
           <th>State</th>
           <td><?php echo $detail->state_name; ?></td>
         </tr>
         <tr>
           <th>City</th>
           <td><?php echo $detail->city; ?></td>
         </tr>
         <tr>
           <th>Pincode</th>
           <td><?php echo $detail->pincode; ?></td>
         </tr>
         <tr>
           <th>Complain Date</th>
           <td><?php echo $detail->create_date; ?></td>
         </tr>
        <tr>
           <th>Product Image</th>
           <?php if ($detail->product_image): ?>
             <td><a href="<?php echo base_url($product_image); ?>" target="_blank"><img src="<?php echo base_url($detail->product_image); ?>" width="200" height="200"></a></td>
           <?php endif ?>
           
         </tr>
          <tr>
           <th>Invoice</th>
           <?php if ($detail->invoice): ?>
             <td><a href="<?php echo base_url($detail->invoice); ?>" target="_blank">
               <i class="fa fa-file fa-2x"></i>
             </a></td>
           <?php endif ?>
         </tr>
         <tr>
           <th>Complain Type</th>
           <td><?php echo $detail->complain_type_name; ?></td>
         </tr>
       </table>
            

      </div>
     

      <div class="tab-pane" id="tab-store">
      
     <form>
     
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-geocode"><span data-toggle="tooltip" data-container="#tab-general" title="Please enter your reply message.">Reply Message</span></label>
        <div class="col-sm-10">
        <textarea name="reply" class="form-control" required="required" rows="6"></textarea>
        </div>
       </div>
      
        <button type="submit" class="btn btn-success">Send</button>
       </form>

      </div>

     </div>
    </form>
   </div>
  </div>
 </div>


</div>
