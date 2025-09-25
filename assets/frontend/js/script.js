$(document).ready(function(){
/*Start*/










//Leadership Slider
var swiper_leadership = new Swiper(".leadership-slider", {
    slidesPerView: 3,
    loop:true,
    autoplay:{
        delay:4000,
    },
    spaceBetween: 0,
    navigation: {
      nextEl: ".next-arrow-popular",
      prevEl: ".prev-arrow-popular",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1025: {
            slidesPerView: 3,
        }
    }
});

//Related Product Slider
var swiper_leadership = new Swiper(".popular-parts-slider", {
    slidesPerView: 3,
    loop:true,
    autoplay:{
        delay:4000,
    },
    spaceBetween: 20,
    navigation: {
      nextEl: ".next-arrow-popular",
      prevEl: ".prev-arrow-popular",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1025: {
            slidesPerView: 3,
        }
    }
});

//Review Slider
var swiper_review = new Swiper(".review-slider", {
    slidesPerView: 2,
    centeredSlides: true,
    loop:true,
    autoplay:{
        delay:4000,
    },
    spaceBetween: 50,
    navigation: {
      nextEl: ".next-arrow-popular",
      prevEl: ".prev-arrow-popular",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 1,
        },
        1025: {
            slidesPerView: 2,
        }
    }
});

// Sections Animation and header Stick JS

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top + $(window).height() / 4.5;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop() ;
    var viewportBottom = viewportTop + $(window).height();
    return elementTop < viewportBottom;
};

$(window).scroll(function(){
    
    if($(window).scrollTop() > 0){
        $('header').addClass('sticky')
    }
    else{
        $('header').removeClass('sticky')
    }
    
    $('.smart-section').each(function(){
        if($(this).isInViewport()){
            $(this).addClass('active')
        }
        else{
            // $(this).removeClass('active')
        }
    })
    
})

$('.smart-section').each(function(){
    if($(this).isInViewport()){
        $(this).addClass('active')
    }
    else{
        // $(this).removeClass('active')
    }
})

if($(window).scrollTop() > 0){
    $('header').addClass('sticky')
}

// Sections Animation and header Stick JS End

//Password Toggle
$(".toggle-password").click(function(){
	$(this).find("i").toggleClass("fa-eye-slash fa-eye");
	var input = $(this).prev().attr("type");
	if(input == 'password'){
		$(this).prev().attr("type","text");
	}else{
		$(this).prev().attr("type","password");
	}	
});

//Select Phone Code
$(".iti__country").click(function(){
   var tel_code = $(this).find(".iti__dial-code").text();
   $(".phone-tel-code").val(tel_code);
});

//Search Form
$(".open-search-form").click(function(){
    $(".search-main-section").fadeIn();
    $("html, body").css("overflow-y","hidden");
});
$(".close-search").click(function(){
    $(".search-main-section").fadeOut();
    $("html, body").css("overflow-y","initial");
});

//Counter
var a = 0;
$(window).scroll(function() {
var scrolltop = $(window).scrollTop();
if($("*").hasClass("counter-block")){
    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && scrolltop > oTop) {
    $('.counter-value').each(function() {
        var $this = $(this),
        countTo = $this.attr('data-count');
        $({
            countNum: $this.text()
        }).animate({
            countNum: countTo
        },
        {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
                complete: function() {
                $this.text(this.countNum);
            }
        });
    });
    a = 1;
    }
}
});

//Career Gallery Slider
var swiper_review = new Swiper(".office-career-slider", {
    slidesPerView: 3,
    loop:true,
    autoplay:{
        delay:4000,
    },
    spaceBetween: 0,
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        600: {
            slidesPerView: 2,
        },
        1025: {
            slidesPerView: 3,
        }
    }
});

//Filter Head
$(".filter_head").click(function(){
	$(this).parent().toggleClass("active");
});

//Filter See all
$(".see_all_filter").click(function(){
	$(this).parent().toggleClass("show");
	//var all_text = $(this).text();
	//all_text == '+ See More' ?  $(this).html('- See Less') : $(this).html('+ See More');
});
//Tab Filter Btn
$(".tab_filter_btn").click(function(){
    $("html").toggleClass("filter_show");
});

$(".filters span.close_filter").click(function(){
    $("html").removeClass("filter_show");
});

//Star Rating
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

//Tab
$(".tab-btn").click(function(){
	var tab_data = $(this).attr("data");
    var tab_name = $(this).attr("data-tab");
	$(this).addClass("active");
	$(`.tab-btn[data=${tab_data}]`).not($(this)).removeClass("active");
    if(tab_name == '*'){
        $(`.tab-content[data=${tab_data}]`).addClass("show");
    }else{
        $(`.tab-content[data=${tab_data}]`).removeClass("show");
        $(`.tab-content[data=${tab_data}][data-tab=${tab_name}]`).addClass("show");
    }


    var id_name = $(this).attr("data-id");
    if (typeof id_name !== 'undefined' && id_name !== false) {
         $('html, body').animate({
            scrollTop: $("#"+id_name+"").offset().top - 150
        }, 100);
     }

});

//Edit Data
$(".edit-data").click(function(){
    var form_name = $(this).attr("data");
    $(".form-data[data='"+form_name+"'] .edit-field").prop("disabled",false);
    $(".form-data[data='"+form_name+"'] .profile-box").addClass("edit-image");
    $(".save-data[data='"+form_name+"']").removeClass("d-none");
    $(".edit-row[data='"+form_name+"']").addClass("d-none");
});

//Dashboard Sidebar Toggle Button
$(".sidebar-toggle-btn").click(function(){
   $("body").addClass("sidebar-open"); 
   $("body").prepend('<div class="sidebar-overlay"><i class="las la-times"></i></div>');
   $("html").css("overflow-y","hidden");
});

$("body").delegate(".sidebar-overlay","click",function(){
    $("body").removeClass("sidebar-open"); 
    $("body").removeClass("filter-sidebar-open"); 
    $(".sidebar-overlay").remove();
    $("html").css("overflow-y","initial");
});

$('[data-toggle="tooltip"]').tooltip();

//Filter Toogle
$("span.filter-toggle").click(function(){
   $("body").toggleClass("filter-visible"); 
});

if(window.innerWidth < 901){
    $("body").delegate(".iti__country","click",function(){
    var phone_code = $(this).attr("data-dial-code");
$(".phone-tel-code").val("+"+phone_code+"");
    });
}



/*End*/
});
