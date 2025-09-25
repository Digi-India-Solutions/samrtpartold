<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-user-group" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="user_permission.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>User Groups</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add User Group</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=user/user_permission/add&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-user-group" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">User Group Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" value="" placeholder="User Group Name" id="input-name" class="form-control" />
                          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Access Permission</label>
            <div class="col-sm-10">
              <div class="well well-sm" style="height: 150px; overflow: auto;">
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/attribute" />
                    catalog/attribute
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/attribute_group" />
                    catalog/attribute_group
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/category" />
                    catalog/category
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/download" />
                    catalog/download
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/filter" />
                    catalog/filter
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/information" />
                    catalog/information
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/manufacturer" />
                    catalog/manufacturer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/option" />
                    catalog/option
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/product" />
                    catalog/product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/recurring" />
                    catalog/recurring
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="catalog/review" />
                    catalog/review
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="common/column_left" />
                    common/column_left
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="common/developer" />
                    common/developer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="common/filemanager" />
                    common/filemanager
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="common/profile" />
                    common/profile
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="common/security" />
                    common/security
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="customer/custom_field" />
                    customer/custom_field
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="customer/customer" />
                    customer/customer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="customer/customer_approval" />
                    customer/customer_approval
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="customer/customer_group" />
                    customer/customer_group
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="design/banner" />
                    design/banner
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="design/layout" />
                    design/layout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="design/seo_url" />
                    design/seo_url
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="design/theme" />
                    design/theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="design/translation" />
                    design/translation
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="event/language" />
                    event/language
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="event/statistics" />
                    event/statistics
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="event/theme" />
                    event/theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/analytics/google" />
                    extension/analytics/google
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/captcha/basic" />
                    extension/captcha/basic
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/captcha/google" />
                    extension/captcha/google
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/activity" />
                    extension/dashboard/activity
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/chart" />
                    extension/dashboard/chart
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/customer" />
                    extension/dashboard/customer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/map" />
                    extension/dashboard/map
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/online" />
                    extension/dashboard/online
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/order" />
                    extension/dashboard/order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/recent" />
                    extension/dashboard/recent
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/dashboard/sale" />
                    extension/dashboard/sale
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/analytics" />
                    extension/extension/analytics
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/captcha" />
                    extension/extension/captcha
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/dashboard" />
                    extension/extension/dashboard
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/feed" />
                    extension/extension/feed
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/fraud" />
                    extension/extension/fraud
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/menu" />
                    extension/extension/menu
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/module" />
                    extension/extension/module
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/payment" />
                    extension/extension/payment
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/report" />
                    extension/extension/report
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/shipping" />
                    extension/extension/shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/theme" />
                    extension/extension/theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/extension/total" />
                    extension/extension/total
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/feed/google_base" />
                    extension/feed/google_base
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/feed/google_sitemap" />
                    extension/feed/google_sitemap
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/feed/openbaypro" />
                    extension/feed/openbaypro
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/fraud/fraudlabspro" />
                    extension/fraud/fraudlabspro
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/fraud/ip" />
                    extension/fraud/ip
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/fraud/maxmind" />
                    extension/fraud/maxmind
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/account" />
                    extension/module/account
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/amazon_login" />
                    extension/module/amazon_login
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/amazon_pay" />
                    extension/module/amazon_pay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/banner" />
                    extension/module/banner
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/bestseller" />
                    extension/module/bestseller
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/carousel" />
                    extension/module/carousel
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/category" />
                    extension/module/category
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/divido_calculator" />
                    extension/module/divido_calculator
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/ebay_listing" />
                    extension/module/ebay_listing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/featured" />
                    extension/module/featured
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/filter" />
                    extension/module/filter
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/google_hangouts" />
                    extension/module/google_hangouts
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/html" />
                    extension/module/html
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/information" />
                    extension/module/information
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/klarna_checkout_module" />
                    extension/module/klarna_checkout_module
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/latest" />
                    extension/module/latest
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/laybuy_layout" />
                    extension/module/laybuy_layout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/pilibaba_button" />
                    extension/module/pilibaba_button
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/pp_braintree_button" />
                    extension/module/pp_braintree_button
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/pp_button" />
                    extension/module/pp_button
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/pp_login" />
                    extension/module/pp_login
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/sagepay_direct_cards" />
                    extension/module/sagepay_direct_cards
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/sagepay_server_cards" />
                    extension/module/sagepay_server_cards
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/slideshow" />
                    extension/module/slideshow
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/special" />
                    extension/module/special
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/module/store" />
                    extension/module/store
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/amazon" />
                    extension/openbay/amazon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/amazon_listing" />
                    extension/openbay/amazon_listing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/amazon_product" />
                    extension/openbay/amazon_product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/amazonus" />
                    extension/openbay/amazonus
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/amazonus_listing" />
                    extension/openbay/amazonus_listing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/amazonus_product" />
                    extension/openbay/amazonus_product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/ebay" />
                    extension/openbay/ebay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/ebay_profile" />
                    extension/openbay/ebay_profile
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/ebay_template" />
                    extension/openbay/ebay_template
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/etsy" />
                    extension/openbay/etsy
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/etsy_product" />
                    extension/openbay/etsy_product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/etsy_shipping" />
                    extension/openbay/etsy_shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/etsy_shop" />
                    extension/openbay/etsy_shop
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/openbay/fba" />
                    extension/openbay/fba
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/amazon_login_pay" />
                    extension/payment/amazon_login_pay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/authorizenet_aim" />
                    extension/payment/authorizenet_aim
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/authorizenet_sim" />
                    extension/payment/authorizenet_sim
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/bank_transfer" />
                    extension/payment/bank_transfer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/bluepay_hosted" />
                    extension/payment/bluepay_hosted
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/bluepay_redirect" />
                    extension/payment/bluepay_redirect
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/cardconnect" />
                    extension/payment/cardconnect
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/cardinity" />
                    extension/payment/cardinity
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/cheque" />
                    extension/payment/cheque
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/cod" />
                    extension/payment/cod
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/divido" />
                    extension/payment/divido
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/eway" />
                    extension/payment/eway
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/firstdata" />
                    extension/payment/firstdata
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/firstdata_remote" />
                    extension/payment/firstdata_remote
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/free_checkout" />
                    extension/payment/free_checkout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/g2apay" />
                    extension/payment/g2apay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/globalpay" />
                    extension/payment/globalpay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/globalpay_remote" />
                    extension/payment/globalpay_remote
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/klarna_account" />
                    extension/payment/klarna_account
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/klarna_checkout" />
                    extension/payment/klarna_checkout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/klarna_invoice" />
                    extension/payment/klarna_invoice
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/laybuy" />
                    extension/payment/laybuy
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/liqpay" />
                    extension/payment/liqpay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/nochex" />
                    extension/payment/nochex
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/paymate" />
                    extension/payment/paymate
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/paypoint" />
                    extension/payment/paypoint
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/payza" />
                    extension/payment/payza
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/perpetual_payments" />
                    extension/payment/perpetual_payments
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pilibaba" />
                    extension/payment/pilibaba
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_braintree" />
                    extension/payment/pp_braintree
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_express" />
                    extension/payment/pp_express
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_payflow" />
                    extension/payment/pp_payflow
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_payflow_iframe" />
                    extension/payment/pp_payflow_iframe
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_pro" />
                    extension/payment/pp_pro
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_pro_iframe" />
                    extension/payment/pp_pro_iframe
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/pp_standard" />
                    extension/payment/pp_standard
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/realex" />
                    extension/payment/realex
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/realex_remote" />
                    extension/payment/realex_remote
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/sagepay_direct" />
                    extension/payment/sagepay_direct
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/sagepay_server" />
                    extension/payment/sagepay_server
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/sagepay_us" />
                    extension/payment/sagepay_us
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/securetrading_pp" />
                    extension/payment/securetrading_pp
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/securetrading_ws" />
                    extension/payment/securetrading_ws
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/skrill" />
                    extension/payment/skrill
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/squareup" />
                    extension/payment/squareup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/twocheckout" />
                    extension/payment/twocheckout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/web_payment_software" />
                    extension/payment/web_payment_software
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/payment/worldpay" />
                    extension/payment/worldpay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/customer_activity" />
                    extension/report/customer_activity
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/customer_order" />
                    extension/report/customer_order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/customer_reward" />
                    extension/report/customer_reward
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/customer_search" />
                    extension/report/customer_search
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/customer_transaction" />
                    extension/report/customer_transaction
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/marketing" />
                    extension/report/marketing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/product_purchased" />
                    extension/report/product_purchased
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/product_viewed" />
                    extension/report/product_viewed
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/sale_coupon" />
                    extension/report/sale_coupon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/sale_order" />
                    extension/report/sale_order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/sale_return" />
                    extension/report/sale_return
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/sale_shipping" />
                    extension/report/sale_shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/report/sale_tax" />
                    extension/report/sale_tax
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/auspost" />
                    extension/shipping/auspost
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/citylink" />
                    extension/shipping/citylink
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/ec_ship" />
                    extension/shipping/ec_ship
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/fedex" />
                    extension/shipping/fedex
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/flat" />
                    extension/shipping/flat
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/free" />
                    extension/shipping/free
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/item" />
                    extension/shipping/item
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/parcelforce_48" />
                    extension/shipping/parcelforce_48
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/pickup" />
                    extension/shipping/pickup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/royal_mail" />
                    extension/shipping/royal_mail
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/ups" />
                    extension/shipping/ups
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/usps" />
                    extension/shipping/usps
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/shipping/weight" />
                    extension/shipping/weight
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/theme/default" />
                    extension/theme/default
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/coupon" />
                    extension/total/coupon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/credit" />
                    extension/total/credit
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/handling" />
                    extension/total/handling
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/klarna_fee" />
                    extension/total/klarna_fee
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/low_order_fee" />
                    extension/total/low_order_fee
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/reward" />
                    extension/total/reward
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/shipping" />
                    extension/total/shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/sub_total" />
                    extension/total/sub_total
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/tax" />
                    extension/total/tax
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/total" />
                    extension/total/total
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="extension/total/voucher" />
                    extension/total/voucher
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/country" />
                    localisation/country
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/currency" />
                    localisation/currency
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/geo_zone" />
                    localisation/geo_zone
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/language" />
                    localisation/language
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/length_class" />
                    localisation/length_class
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/location" />
                    localisation/location
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/order_status" />
                    localisation/order_status
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/return_action" />
                    localisation/return_action
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/return_reason" />
                    localisation/return_reason
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/return_status" />
                    localisation/return_status
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/stock_status" />
                    localisation/stock_status
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/tax_class" />
                    localisation/tax_class
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/tax_rate" />
                    localisation/tax_rate
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/weight_class" />
                    localisation/weight_class
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="localisation/zone" />
                    localisation/zone
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="mail/affiliate" />
                    mail/affiliate
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="mail/customer" />
                    mail/customer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="mail/forgotten" />
                    mail/forgotten
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="mail/return" />
                    mail/return
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="mail/reward" />
                    mail/reward
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="mail/transaction" />
                    mail/transaction
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketing/contact" />
                    marketing/contact
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketing/coupon" />
                    marketing/coupon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketing/marketing" />
                    marketing/marketing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/api" />
                    marketplace/api
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/event" />
                    marketplace/event
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/extension" />
                    marketplace/extension
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/install" />
                    marketplace/install
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/installer" />
                    marketplace/installer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/marketplace" />
                    marketplace/marketplace
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/modification" />
                    marketplace/modification
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="marketplace/openbay" />
                    marketplace/openbay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="report/online" />
                    report/online
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="report/report" />
                    report/report
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="report/statistics" />
                    report/statistics
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="sale/order" />
                    sale/order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="sale/recurring" />
                    sale/recurring
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="sale/return" />
                    sale/return
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="sale/voucher" />
                    sale/voucher
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="sale/voucher_theme" />
                    sale/voucher_theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="setting/setting" />
                    setting/setting
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="setting/store" />
                    setting/store
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/error" />
                    startup/error
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/event" />
                    startup/event
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/login" />
                    startup/login
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/permission" />
                    startup/permission
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/router" />
                    startup/router
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/sass" />
                    startup/sass
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="startup/startup" />
                    startup/startup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="tool/backup" />
                    tool/backup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="tool/log" />
                    tool/log
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="tool/upload" />
                    tool/upload
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="user/api" />
                    user/api
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="user/user" />
                    user/user
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[access][]" value="user/user_permission" />
                    user/user_permission
                                      </label>
                </div>
                              </div>
              <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="btn btn-link">Select All</button> / <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="btn btn-link">Unselect All</button></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Modify Permission</label>
            <div class="col-sm-10">
              <div class="well well-sm" style="height: 150px; overflow: auto;">
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/attribute" />
                    catalog/attribute
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/attribute_group" />
                    catalog/attribute_group
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/category" />
                    catalog/category
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/download" />
                    catalog/download
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/filter" />
                    catalog/filter
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/information" />
                    catalog/information
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/manufacturer" />
                    catalog/manufacturer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/option" />
                    catalog/option
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/product" />
                    catalog/product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/recurring" />
                    catalog/recurring
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="catalog/review" />
                    catalog/review
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="common/column_left" />
                    common/column_left
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="common/developer" />
                    common/developer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="common/filemanager" />
                    common/filemanager
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="common/profile" />
                    common/profile
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="common/security" />
                    common/security
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="customer/custom_field" />
                    customer/custom_field
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="customer/customer" />
                    customer/customer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="customer/customer_approval" />
                    customer/customer_approval
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="customer/customer_group" />
                    customer/customer_group
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="design/banner" />
                    design/banner
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="design/layout" />
                    design/layout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="design/seo_url" />
                    design/seo_url
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="design/theme" />
                    design/theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="design/translation" />
                    design/translation
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="event/language" />
                    event/language
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="event/statistics" />
                    event/statistics
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="event/theme" />
                    event/theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/analytics/google" />
                    extension/analytics/google
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/captcha/basic" />
                    extension/captcha/basic
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/captcha/google" />
                    extension/captcha/google
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/activity" />
                    extension/dashboard/activity
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/chart" />
                    extension/dashboard/chart
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/customer" />
                    extension/dashboard/customer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/map" />
                    extension/dashboard/map
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/online" />
                    extension/dashboard/online
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/order" />
                    extension/dashboard/order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/recent" />
                    extension/dashboard/recent
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/dashboard/sale" />
                    extension/dashboard/sale
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/analytics" />
                    extension/extension/analytics
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/captcha" />
                    extension/extension/captcha
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/dashboard" />
                    extension/extension/dashboard
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/feed" />
                    extension/extension/feed
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/fraud" />
                    extension/extension/fraud
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/menu" />
                    extension/extension/menu
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/module" />
                    extension/extension/module
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/payment" />
                    extension/extension/payment
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/report" />
                    extension/extension/report
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/shipping" />
                    extension/extension/shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/theme" />
                    extension/extension/theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/extension/total" />
                    extension/extension/total
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/feed/google_base" />
                    extension/feed/google_base
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/feed/google_sitemap" />
                    extension/feed/google_sitemap
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/feed/openbaypro" />
                    extension/feed/openbaypro
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/fraud/fraudlabspro" />
                    extension/fraud/fraudlabspro
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/fraud/ip" />
                    extension/fraud/ip
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/fraud/maxmind" />
                    extension/fraud/maxmind
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/account" />
                    extension/module/account
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/amazon_login" />
                    extension/module/amazon_login
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/amazon_pay" />
                    extension/module/amazon_pay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/banner" />
                    extension/module/banner
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/bestseller" />
                    extension/module/bestseller
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/carousel" />
                    extension/module/carousel
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/category" />
                    extension/module/category
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/divido_calculator" />
                    extension/module/divido_calculator
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/ebay_listing" />
                    extension/module/ebay_listing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/featured" />
                    extension/module/featured
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/filter" />
                    extension/module/filter
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/google_hangouts" />
                    extension/module/google_hangouts
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/html" />
                    extension/module/html
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/information" />
                    extension/module/information
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/klarna_checkout_module" />
                    extension/module/klarna_checkout_module
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/latest" />
                    extension/module/latest
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/laybuy_layout" />
                    extension/module/laybuy_layout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/pilibaba_button" />
                    extension/module/pilibaba_button
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/pp_braintree_button" />
                    extension/module/pp_braintree_button
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/pp_button" />
                    extension/module/pp_button
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/pp_login" />
                    extension/module/pp_login
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/sagepay_direct_cards" />
                    extension/module/sagepay_direct_cards
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/sagepay_server_cards" />
                    extension/module/sagepay_server_cards
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/slideshow" />
                    extension/module/slideshow
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/special" />
                    extension/module/special
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/module/store" />
                    extension/module/store
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/amazon" />
                    extension/openbay/amazon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/amazon_listing" />
                    extension/openbay/amazon_listing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/amazon_product" />
                    extension/openbay/amazon_product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/amazonus" />
                    extension/openbay/amazonus
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/amazonus_listing" />
                    extension/openbay/amazonus_listing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/amazonus_product" />
                    extension/openbay/amazonus_product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/ebay" />
                    extension/openbay/ebay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/ebay_profile" />
                    extension/openbay/ebay_profile
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/ebay_template" />
                    extension/openbay/ebay_template
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/etsy" />
                    extension/openbay/etsy
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/etsy_product" />
                    extension/openbay/etsy_product
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/etsy_shipping" />
                    extension/openbay/etsy_shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/etsy_shop" />
                    extension/openbay/etsy_shop
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/openbay/fba" />
                    extension/openbay/fba
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/amazon_login_pay" />
                    extension/payment/amazon_login_pay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/authorizenet_aim" />
                    extension/payment/authorizenet_aim
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/authorizenet_sim" />
                    extension/payment/authorizenet_sim
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/bank_transfer" />
                    extension/payment/bank_transfer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/bluepay_hosted" />
                    extension/payment/bluepay_hosted
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/bluepay_redirect" />
                    extension/payment/bluepay_redirect
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/cardconnect" />
                    extension/payment/cardconnect
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/cardinity" />
                    extension/payment/cardinity
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/cheque" />
                    extension/payment/cheque
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/cod" />
                    extension/payment/cod
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/divido" />
                    extension/payment/divido
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/eway" />
                    extension/payment/eway
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/firstdata" />
                    extension/payment/firstdata
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/firstdata_remote" />
                    extension/payment/firstdata_remote
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/free_checkout" />
                    extension/payment/free_checkout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/g2apay" />
                    extension/payment/g2apay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/globalpay" />
                    extension/payment/globalpay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/globalpay_remote" />
                    extension/payment/globalpay_remote
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/klarna_account" />
                    extension/payment/klarna_account
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/klarna_checkout" />
                    extension/payment/klarna_checkout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/klarna_invoice" />
                    extension/payment/klarna_invoice
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/laybuy" />
                    extension/payment/laybuy
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/liqpay" />
                    extension/payment/liqpay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/nochex" />
                    extension/payment/nochex
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/paymate" />
                    extension/payment/paymate
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/paypoint" />
                    extension/payment/paypoint
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/payza" />
                    extension/payment/payza
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/perpetual_payments" />
                    extension/payment/perpetual_payments
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pilibaba" />
                    extension/payment/pilibaba
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_braintree" />
                    extension/payment/pp_braintree
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_express" />
                    extension/payment/pp_express
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_payflow" />
                    extension/payment/pp_payflow
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_payflow_iframe" />
                    extension/payment/pp_payflow_iframe
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_pro" />
                    extension/payment/pp_pro
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_pro_iframe" />
                    extension/payment/pp_pro_iframe
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/pp_standard" />
                    extension/payment/pp_standard
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/realex" />
                    extension/payment/realex
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/realex_remote" />
                    extension/payment/realex_remote
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/sagepay_direct" />
                    extension/payment/sagepay_direct
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/sagepay_server" />
                    extension/payment/sagepay_server
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/sagepay_us" />
                    extension/payment/sagepay_us
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/securetrading_pp" />
                    extension/payment/securetrading_pp
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/securetrading_ws" />
                    extension/payment/securetrading_ws
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/skrill" />
                    extension/payment/skrill
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/squareup" />
                    extension/payment/squareup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/twocheckout" />
                    extension/payment/twocheckout
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/web_payment_software" />
                    extension/payment/web_payment_software
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/payment/worldpay" />
                    extension/payment/worldpay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/customer_activity" />
                    extension/report/customer_activity
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/customer_order" />
                    extension/report/customer_order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/customer_reward" />
                    extension/report/customer_reward
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/customer_search" />
                    extension/report/customer_search
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/customer_transaction" />
                    extension/report/customer_transaction
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/marketing" />
                    extension/report/marketing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/product_purchased" />
                    extension/report/product_purchased
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/product_viewed" />
                    extension/report/product_viewed
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/sale_coupon" />
                    extension/report/sale_coupon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/sale_order" />
                    extension/report/sale_order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/sale_return" />
                    extension/report/sale_return
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/sale_shipping" />
                    extension/report/sale_shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/report/sale_tax" />
                    extension/report/sale_tax
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/auspost" />
                    extension/shipping/auspost
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/citylink" />
                    extension/shipping/citylink
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/ec_ship" />
                    extension/shipping/ec_ship
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/fedex" />
                    extension/shipping/fedex
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/flat" />
                    extension/shipping/flat
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/free" />
                    extension/shipping/free
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/item" />
                    extension/shipping/item
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/parcelforce_48" />
                    extension/shipping/parcelforce_48
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/pickup" />
                    extension/shipping/pickup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/royal_mail" />
                    extension/shipping/royal_mail
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/ups" />
                    extension/shipping/ups
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/usps" />
                    extension/shipping/usps
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/shipping/weight" />
                    extension/shipping/weight
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/theme/default" />
                    extension/theme/default
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/coupon" />
                    extension/total/coupon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/credit" />
                    extension/total/credit
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/handling" />
                    extension/total/handling
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/klarna_fee" />
                    extension/total/klarna_fee
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/low_order_fee" />
                    extension/total/low_order_fee
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/reward" />
                    extension/total/reward
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/shipping" />
                    extension/total/shipping
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/sub_total" />
                    extension/total/sub_total
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/tax" />
                    extension/total/tax
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/total" />
                    extension/total/total
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="extension/total/voucher" />
                    extension/total/voucher
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/country" />
                    localisation/country
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/currency" />
                    localisation/currency
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/geo_zone" />
                    localisation/geo_zone
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/language" />
                    localisation/language
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/length_class" />
                    localisation/length_class
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/location" />
                    localisation/location
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/order_status" />
                    localisation/order_status
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/return_action" />
                    localisation/return_action
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/return_reason" />
                    localisation/return_reason
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/return_status" />
                    localisation/return_status
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/stock_status" />
                    localisation/stock_status
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/tax_class" />
                    localisation/tax_class
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/tax_rate" />
                    localisation/tax_rate
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/weight_class" />
                    localisation/weight_class
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="localisation/zone" />
                    localisation/zone
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="mail/affiliate" />
                    mail/affiliate
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="mail/customer" />
                    mail/customer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="mail/forgotten" />
                    mail/forgotten
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="mail/return" />
                    mail/return
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="mail/reward" />
                    mail/reward
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="mail/transaction" />
                    mail/transaction
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketing/contact" />
                    marketing/contact
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketing/coupon" />
                    marketing/coupon
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketing/marketing" />
                    marketing/marketing
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/api" />
                    marketplace/api
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/event" />
                    marketplace/event
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/extension" />
                    marketplace/extension
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/install" />
                    marketplace/install
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/installer" />
                    marketplace/installer
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/marketplace" />
                    marketplace/marketplace
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/modification" />
                    marketplace/modification
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="marketplace/openbay" />
                    marketplace/openbay
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="report/online" />
                    report/online
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="report/report" />
                    report/report
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="report/statistics" />
                    report/statistics
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="sale/order" />
                    sale/order
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="sale/recurring" />
                    sale/recurring
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="sale/return" />
                    sale/return
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="sale/voucher" />
                    sale/voucher
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="sale/voucher_theme" />
                    sale/voucher_theme
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="setting/setting" />
                    setting/setting
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="setting/store" />
                    setting/store
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/error" />
                    startup/error
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/event" />
                    startup/event
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/login" />
                    startup/login
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/permission" />
                    startup/permission
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/router" />
                    startup/router
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/sass" />
                    startup/sass
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="startup/startup" />
                    startup/startup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="tool/backup" />
                    tool/backup
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="tool/log" />
                    tool/log
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="tool/upload" />
                    tool/upload
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="user/api" />
                    user/api
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="user/user" />
                    user/user
                                      </label>
                </div>
                                <div class="checkbox">
                  <label>
                                        <input type="checkbox" name="permission[modify][]" value="user/user_permission" />
                    user/user_permission
                                      </label>
                </div>
                              </div>
              <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="btn btn-link">Select All</button> / <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="btn btn-link">Unselect All</button></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 