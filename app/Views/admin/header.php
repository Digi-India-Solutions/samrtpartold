<link href="<?php echo ADMIN_CATALOG; ?>stylesheet/bootstrap.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo ADMIN_CATALOG; ?>javascript/jquery/jquery-2.1.1.min.js"></script> 
<!-- <script type="text/javascript" src="<?php echo ADMIN_CATALOG; ?>javascript/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo ADMIN_CATALOG; ?>javascript/bootstrap/js/bootstrap.min.js"></script>
<link href="<?php echo ADMIN_CATALOG; ?>javascript/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<script src="<?php echo ADMIN_CATALOG; ?>javascript/jquery/datetimepicker/moment/moment.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_CATALOG; ?>javascript/jquery/datetimepicker/moment/moment-with-locales.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_CATALOG; ?>javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<link href="<?php echo ADMIN_CATALOG; ?>javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
<link type="text/css" href="<?php echo ADMIN_CATALOG; ?>stylesheet/stylesheet.css" rel="stylesheet" media="screen" />
<link type="text/css" href="<?php echo CATALOG; ?>css/toastr.css" rel="stylesheet" />

 <script src="<?php echo ADMIN_CATALOG; ?>javascript/common.js" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- ckeditor -->

<!-- <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('assets/ckfinder/ckfinder.js'); ?>"></script> -->

<!-- select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- datatable -->
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<link type="text/css" href="<?php echo ADMIN_CATALOG; ?>stylesheet/custom.css" rel="stylesheet" media="screen" />

 </head>

<?php 
use App\Models\CommonModel;
$this->AdminModel = new CommonModel();

$set = $this->AdminModel ->all_fetch('setting',array('code'=>'config'));
        foreach ($set as $key => $value) {
          $config[$value->key] = $value->value;
        }
$userr = $this->AdminModel->fs('admin',array('id'=>session()->get('adminLogin')));
 ?>


 <body>
  <div id="container">
   <header id="header" class="navbar navbar-static-top">
    <div class="container-fluid">
     <div id="header-logo" class="navbar-header">
      <a href="<?php echo base_url('admin/dashboard'); ?>" class="navbar-brand"><img src="<?php echo base_url($config['config_logo']); ?>" alt="cyberworx" title="cyberworx" style="width: 109px;margin-top: -10px;" /></a>
     </div>
     <a href="#" id="button-menu" class="hidden-md hidden-lg"><span class="fa fa-bars"></span></a>

     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo base_url($userr->photo); ?>" alt="<?php echo $userr->username; ?>" title="admin" id="user-profile" class="img-circle"  style="width: 50px;" /><?php echo $userr->username; ?> <i class="fa fa-caret-down fa-fw"></i>
       </a>
       <ul class="dropdown-menu dropdown-menu-right">
        <li>
         <a href="<?php echo base_url('admin/profile'); ?>"><i class="fa fa-user-circle-o fa-fw"></i> Your Profile</a>
        </li>
        
        <li>
         <a href="<?php echo base_url('home'); ?>" target="_blank"><i class="fa fa-dashboard fa-fw"></i> Website Homepage</a>
        </li>
       
       </ul>
      </li>
      <li>
       <a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i> <span class="hidden-xs hidden-sm hidden-md">Logout</span></a>
      </li>
     </ul>
    </div>
   </header>
   <nav id="column-left">
    <div id="navigation"><span class="fa fa-bars"></span> Navigation</div>
    <ul id="menu">
     
 
<?php 


$menu = $this->AdminModel->all_fetch('menu',array('parent_id'=>0,'status'=>1,'visible'=>1),'sort_order','asc');

foreach ($menu as $key => $value) {
  $level1 = $this->AdminModel->all_fetch('menu',array('parent_id'=>$value->id,'status'=>1,'visible'=>1),'sort_order','asc');
  if ($level1) { ?>
    

      <li id="menu-catalog">
      <a href="#collapse<?php echo $value->id; ?>" data-toggle="collapse" class="parent collapsed"><?php echo $value->fafa; ?> <?php echo $value->name; ?></a>
       <ul id="collapse<?php echo $value->id; ?>" class="collapse">
     
      <?php foreach ($level1 as $key => $l1) {?>
          
       
          <?php 
          $level2  =  $this->AdminModel->all_fetch('menu',array('parent_id'=>$l1->id,'status'=>1,'visible'=>1),'sort_order','asc');
          if (!empty($level2)) {?>
          
         <li>
          <a href="#collapse<?php echo $l1->id;?>" data-toggle="collapse" class="parent collapsed"><?php echo $l1->name; ?></a>
          <ul id="collapse<?php echo $l1->id;?>" class="collapse">
          <?php foreach ($level2 as $key => $l2) { if (@$this->AdminModel->hasPermission($l2->id)) {?>  

           <li><a href="<?php echo base_url($l2->link); ?>"><?php echo $l2->name; ?></a></li>
          <?php } } ?>
          </ul>
         </li>

          <?php }else{ ?>
           
           <?php if ($this->AdminModel->hasPermission($l1->id)) {?>
           <li><a href="<?php echo base_url($l1->link); ?>"><?php echo $l1->name; ?></a></li>   

        <?php } } ?>
      <?php }  ?>
      </ul>

     </li>


  <?php }else{?>
    
   
     <li id="menu-dashboard">
      <a href="<?php echo base_url($value->link); ?>"><?php echo $value->fafa; ?> <?php echo $value->name; ?></a>
     </li>

  <?php  } ?>


   <?php } ?>


    </ul>

 </nav>

