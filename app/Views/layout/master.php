<?php
use App\Models\CommonModel;
use App\Models\CartModel;
$this->AdminModel = new CommonModel();
	
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
$wconfig[$value->key] = $value->value;
}	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php  if(!empty($meta_title)){echo $meta_title;} ?></title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url($wconfig['config_favicon']); ?>">
<base href="<?php echo base_url(); ?>/" id="base" data-base="<?php echo base_url(); ?>/">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<?php if (!empty($meta_description)): ?>
<meta name="description" content="<?php echo $meta_description; ?>">	
<?php endif ?>
<?php if (!empty($meta_keyword)): ?>
<meta name="keywords" content="<?php echo $meta_keyword; ?>">
<?php endif ?>
<meta name="author" content="<?php echo $wconfig['config_name'];?>">
<meta name="p:domain_verify" content="ff55db63285c2aceeef95ba6aa900fbb"/>
<link rel="canonical" href="<?php echo current_url(); ?>"/>
<link rel="alternate" hreflang="x-default" href="https://www.ssdipl.com/" />
<link rel="alternate" hreflang="ru" href="https://www.ssdipl.com
<link rel="alternate" hreflang="ru-RU" href="https://www.ssdipl.com
<link rel="alternate" hreflang="ar" href="https://www.ssdipl.com
<link rel="alternate" hreflang="ar-AE" href="https://www.ssdipl.com
<link rel="alternate" hreflang="ar-SA" href="https://www.ssdipl.com


<?php 
if (!empty($meta)) {?>
<meta property="og:title" content="<?php echo $meta->meta_title; ?>">
<meta property="og:description" content="<?php echo strip_tags($meta->meta_description); ?>">
<meta property="og:image" content="<?php echo $meta->image?base_url($meta->image):base_url(); ?>">
<meta property="og:url" content="<?php echo current_url(); ?>">

<meta name="twitter:title" content="<?php echo $meta->meta_title; ?>">
<meta name="twitter:description" content="<?php echo strip_tags($meta->meta_description); ?>">
<meta name="twitter:image" content="<?php echo $meta->image?base_url($meta->image):base_url(); ?>">
<meta name="twitter:card" content="<?php echo current_url(); ?>">
<?php } ?>

<?php 
if(service('uri')->getSegment(1)=='login' || service('uri')->getSegment(1)=='Login'){
}else{
$actual_link = current_url();
session()->set('curl',$actual_link);    
}
?>
<?php echo $this->include('frontend/includes/topCss'); ?>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-ZBD9VY7FL3');
</script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '783408542616942');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=783408542616942&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5VMPHRRL74"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5VMPHRRL74');
</script>

<meta name="yandex-verification" content="c15638d79741e250" />
<meta name="robots" content="index, follow">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M25B8LN');</script>
<!-- End Google Tag Manager -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Smart Parts Exports",
  "url": "https://www.ssdipl.com
  "logo": "https://www.ssdipl.com1400_eb8a50ada7319ff4f926.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-882-647-7077",
    "contactType": "Customer Service",
    "areaServed": "Worldwide",
    "availableLanguage": "English, Russian"
  },
  "sameAs": [
    "https://www.facebook.com/smartpartsexports",
    "https://x.com/spartsexports"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Smart Parts Exports",
  "url": "https://www.ssdipl.com
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.ssdipl.comg}",
    "query-input": "required name=search_term_string"
  }
}
</script>


</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M25B8LN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php echo $this->include('frontend/includes/header'); ?>



  
<?= $this->renderSection('page'); ?>


<?php echo $this->include('frontend/includes/footer'); ?>

<?= $this->renderSection('javascript'); ?>


</body>
</html>