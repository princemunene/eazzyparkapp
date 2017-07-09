
// Initialize your app
var myApp = new Framework7({
    animateNavBackIcon: true,
    precompileTemplates: true,
	swipeBackPage: false,
	swipeBackPageThreshold: 1,
	pushState: false,
    template7Pages: true
});


// Export selectors engine
var $$ = Dom7;

// Add main View
var mainView = myApp.addView('.view-main', {
    // Enable dynamic Navbar
    dynamicNavbar: false
});


jQuery(document).ready(function() {
"use strict"; 

	$(".logo").animate({'top': '20px'},'slow',"easeInOutCirc");
	$(".cartitems").delay(1000).animate({'width': '30px', 'height': '30px', 'top':'10px', 'right':'10px', 'opacity':1},1000,"easeOutBounce");
	$(".main-nav ul > li")
		.css('opacity', '0')
		.each(function(index, item) {
			setTimeout(function() {
				$(item).fadeTo('slow',1,"easeInOutCirc");
			}, index*175);
	});
		
	$(".main-nav ul > li span")
	    .css('opacity', '0')
		.each(function(index, item) {
			setTimeout(function() {
				$(item).animate({'left': '0px', 'opacity':1},500,"easeInOutCirc");
			}, index*175);
	});
		
    $('.item_delete').click(function(e){
        e.preventDefault();
        var currentVal = $(this).attr('id');
        $('div#'+currentVal).fadeOut('slow');
    });
	
    $('.qntyplus').click(function(e){
								  
        e.preventDefault();
        var fieldName = $(this).attr('field');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal)) {
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            $('input[name='+fieldName+']').val(0);
        }
		
    });
    $(".qntyminus").click(function(e) {
        e.preventDefault();
        var fieldName = $(this).attr('field');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            $('input[name='+fieldName+']').val(0);
        }
    });
							
});

$$(document).on('ajaxStart',function(e){myApp.showIndicator();});
$$(document).on('ajaxComplete',function(){myApp.hideIndicator();});	

$$('.popup').on('opened', function () {
  $(".close_loginpopup_button a").animate({'right':'10px', 'opacity':1},'slow',"easeInOutCirc");
});
$$('.popup').on('closed', function () {
  $(".close_loginpopup_button a").animate({'right':'0px', 'opacity':0},'slow',"easeInOutCirc");
});

myApp.onPageInit('index', function (page) {

	$(".logo").animate({'top': '20px'},'slow',"easeInOutCirc");
	$(".cartitems").delay(1000).animate({'width': '30px', 'height': '30px', 'top':'10px', 'right':'10px', 'opacity':1},1000,"easeOutBounce");
	$(".main-nav ul > li")
		.css('opacity', '0')
		.each(function(index, item) {
			setTimeout(function() {
				$(item).fadeTo('slow',1,"easeInOutCirc");
			}, index*175);
	});	
	$(".main-nav ul > li span")
	    .css('opacity', '0')
		.each(function(index, item) {
			setTimeout(function() {
				$(item).animate({'left': '0px', 'opacity':1},500,"easeInOutCirc");
			}, index*175);
	});	
  
})

myApp.onPageInit('blog', function (page) {
								   
		$(".posts li").hide();	
		size_li = $(".posts li").size();
		x=4;
		$('.posts li:lt('+x+')').show();
		$('#loadMore').click(function () {
			x= (x+1 <= size_li) ? x+1 : size_li;
			$('.posts li:lt('+x+')').show();
			if(x == size_li){
				$('#loadMore').hide();
				$('#showLess').show();
			}
		});						   
									   
		$("ul.posts > li div.post_date")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'left':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});	
		$("ul.posts > li div.post_title")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'right':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});		
})

myApp.onPageInit('blogsingle', function (page) {
										 
			$(".backto").animate({'left': '0px'},'slow',"easeInOutCirc");
			$(".nextto").delay(500).animate({'opacity':1, 'width': '10%',},500,"easeOutBounce");
			$(".post_title_single").animate({'right': '0px'},'slow',"easeInOutCirc");
								   
	
})

myApp.onPageInit('shop', function (page) {

		$("ul.shop_items > li")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).fadeTo('slow',1,"easeInOutCirc");
				}, index*175);
		});	
			
		$("ul.shop_items > li .shopfav")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'width':'8%', 'opacity':1},2000,"easeOutBounce");
				}, index*175);
		});	
			
		$("ul.shop_items > li h4")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'right':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});	
			
		$("ul.shop_items > li div.shop_thumb")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'left':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});	
			
		$('.qntyplusshop').click(function(e){
									  
			e.preventDefault();
			var fieldName = $(this).attr('field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal)) {
				$('input[name='+fieldName+']').val(currentVal + 1);
			} else {
				$('input[name='+fieldName+']').val(0);
			}
			
		});
		$(".qntyminusshop").click(function(e) {
			e.preventDefault();
			var fieldName = $(this).attr('field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal) && currentVal > 0) {
				$('input[name='+fieldName+']').val(currentVal - 1);
			} else {
				$('input[name='+fieldName+']').val(0);
			}
		});	
  
})

myApp.onPageInit('shopitem', function (page) {
									   
	$(".shop_item .shop_thumb").animate({'left': '0px', 'opacity':1},'slow',"easeInOutCirc");
	$(".shop_item .shop_item_price").delay(500).animate({'right':'10px', 'opacity':1},500,"easeInOutCirc");
	$(".shop_item a.shopfav").delay(500).animate({'opacity':1, 'width': '10%',},500,"easeOutBounce");
	$(".shop_item a.shopfriend").delay(800).animate({'opacity':1, 'width': '10%',},500,"easeOutBounce");

			
		$('.qntyplusshop').click(function(e){
									  
			e.preventDefault();
			var fieldName = $(this).attr('field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal)) {
				$('input[name='+fieldName+']').val(currentVal + 1);
			} else {
				$('input[name='+fieldName+']').val(0);
			}
			
		});
		$(".qntyminusshop").click(function(e) {
			e.preventDefault();
			var fieldName = $(this).attr('field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal) && currentVal > 0) {
				$('input[name='+fieldName+']').val(currentVal - 1);
			} else {
				$('input[name='+fieldName+']').val(0);
			}
		});	
  
})


$$(document).on('pageInit', function (e) {
									  
		$("ul.features_list_detailed > li")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).fadeTo('slow',1,"easeInOutCirc");
				}, index*175);
		});	
			
		$("ul.features_list_detailed > li span")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'bottom':'0px', 'right':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});	
			
		$("ul.features_list_detailed > li h4")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'right':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});	
			
		$("ul.features_list_detailed > li div.feat_small_icon")
			.css('opacity', '0')
			.each(function(index, item) {
				setTimeout(function() {
					$(item).animate({'left':'0px', 'opacity':1},800,"easeInOutCirc");
				}, index*175);
		});		
		
  		$(".swipebox").swipebox();
		$("#ContactForm").validate({
		submitHandler: function(form) {
		ajaxContact(form);
		return false;
		}
		});
		
		$("#RegisterForm").validate();
		$("#LoginForm").validate();
		$("#ForgotForm").validate();
		
		$('a.backbutton').click(function(){
			parent.history.back();
			return false;
		});
		
        

	$("a.switcher").bind("click", function(e){
		e.preventDefault();
		
		var theid = $(this).attr("id");
		var theproducts = $("ul#photoslist");
		var classNames = $(this).attr('class').split(' ');
		
		
		if($(this).hasClass("active")) {
			// if currently clicked button has the active class
			// then we do nothing!
			return false;
		} else {
			// otherwise we are clicking on the inactive button
			// and in the process of switching views!

  			if(theid == "view13") {
				$(this).addClass("active");
				$("#view11").removeClass("active");
				$("#view11").children("img").attr("src","images/switch_11.png");
				
				$("#view12").removeClass("active");
				$("#view12").children("img").attr("src","images/switch_12.png");
			
				var theimg = $(this).children("img");
				theimg.attr("src","images/switch_13_active.png");
			
				// remove the list class and change to grid
				theproducts.removeClass("photo_gallery_11");
				theproducts.removeClass("photo_gallery_12");
				theproducts.addClass("photo_gallery_13");

			}
			
			else if(theid == "view12") {
				$(this).addClass("active");
				$("#view11").removeClass("active");
				$("#view11").children("img").attr("src","images/switch_11.png");
				
				$("#view13").removeClass("active");
				$("#view13").children("img").attr("src","images/switch_13.png");
			
				var theimg = $(this).children("img");
				theimg.attr("src","images/switch_12_active.png");
			
				// remove the list class and change to grid
				theproducts.removeClass("photo_gallery_11");
				theproducts.removeClass("photo_gallery_13");
				theproducts.addClass("photo_gallery_12");

			} 
			else if(theid == "view11") {
				$("#view12").removeClass("active");
				$("#view12").children("img").attr("src","images/switch_12.png");
				
				$("#view13").removeClass("active");
				$("#view13").children("img").attr("src","images/switch_13.png");
			
				var theimg = $(this).children("img");
				theimg.attr("src","images/switch_11_active.png");
			
				// remove the list class and change to grid
				theproducts.removeClass("photo_gallery_12");
				theproducts.removeClass("photo_gallery_13");
				theproducts.addClass("photo_gallery_11");

			} 
			
		}

	});	
	
	document.addEventListener('touchmove', function(event) {
	   if(event.target.parentNode.className.indexOf('navbarpages') != -1 || event.target.className.indexOf('navbarpages') != -1 ) {
		event.preventDefault(); }
	}, false);
	
	// Add ScrollFix
	var scrollingContent = document.getElementById("pages_maincontent");
	new ScrollFix(scrollingContent);
	
	
	var ScrollFix = function(elem) {
		// Variables to track inputs
		var startY = startTopScroll = deltaY = undefined,
	
		elem = elem || elem.querySelector(elem);
	
		// If there is no element, then do nothing	
		if(!elem)
			return;
	
		// Handle the start of interactions
		elem.addEventListener('touchstart', function(event){
			startY = event.touches[0].pageY;
			startTopScroll = elem.scrollTop;
	
			if(startTopScroll <= 0)
				elem.scrollTop = 1;
	
			if(startTopScroll + elem.offsetHeight >= elem.scrollHeight)
				elem.scrollTop = elem.scrollHeight - elem.offsetHeight - 1;
		}, false);
	};
	
		
		
})


//CUSTOM CODE

function logout(){

		swal({
		  title: "Logout Confirmation",
		  text: "Are you sure you want to logout?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, Logout!",
		  closeOnConfirm: false
		},
		function(){

			window.location.href = "index.html";
		  
		});

	
}




function saveticket(){
	var regn=$('#regn').val();
	var regn = regn.toUpperCase();
	var naivas = $('input[name=naivas]:checked').val();
	if(naivas!=1){naivas=0}

	var reserved = $('input[name=reserved]:checked').val();
	if(reserved!=1){reserved=0}

	if(regn==''){
		swal("Error", "Enter the Registration Number of the Vehicle!", "error");
	}else{

		swal({
		  title: "Confirmation-"+regn,
		  text: "Are you sure you want to submit ticket?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, Continue!",
		  closeOnConfirm: false
		},
		function(){

			$("#parkdiv").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
			$.ajax({
			url:'http://qet.co.ke/eazzyparkapp/www/data.php',
			data:{id:1,user:username,regn:regn,naivas:naivas,reserved:reserved},
			success:function(data){
			$('#parkdiv').html(data);
			}
			});
		  
		});



	

	}


	

}

function searchtickets(e){
		var param = $('#searchtickets').val();
		var enterKey = 13;
        if (e.which == enterKey&&param!=''){

        	$("#currtick").prepend('<a id="clicker" href="bridge.php?id=2&param=' + param + '"><span></span></a>');
        	$("#clicker").find('span').trigger("click");
           
		}
}

function searchreserve(e){
		var param = $('#searchtickets').val();
		var enterKey = 13;
        if (e.which == enterKey&&param!=''){

        	$("#currtick").prepend('<a id="clicker" href="bridge.php?id=8&param=' + param + '"><span></span></a>');
        	$("#clicker").find('span').trigger("click");
           
		}
}

function savereceipt(ticketno){
	var checkoutdate=$('#checkoutdate').val();
	var checkouttime=$('#checkouttime').val();
	var checkouttimestamp=$('#checkouttimestamp').val();
	var timediff=$('#timediff').val();
	var parkcateg=$('#parkcateg').val();
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	swal({
		  title: "Submit Confirmation",
		  text: "Are you sure you want to submit?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, Continue!",
		  closeOnConfirm: false
		},
		function(){

			$("#recdiv").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
			$.ajax({
			url:'data.php',
			data:{id:2,ticketno:ticketno,parkcateg:parkcateg,checkoutdate:checkoutdate,checkouttime:checkouttime,checkouttimestamp:checkouttimestamp,timediff:timediff,amount:amount},
			success:function(data){
			$('#recdiv').html(data);
			}
			});
		  
		});


}

function savepass(userid){
	
	var opass=$('#opass').val();
	var npass=$('#npass').val();
	var cpass=$('#cpass').val();

	if(opass==''){
	swal("Error", "Enter your old password!", "error");
	}
	else if(npass==''){
	swal("Error", "Enter a new password!", "error");
	}
	else if(cpass==''){
	swal("Error", "Confirm password!", "error");
	}
	else{
	$("#savepass").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:3,opass:opass,npass:npass,cpass:cpass,userid:userid},
	success:function(data){
	$('#savepass').html(data);
	}
	});
	}
}

function addnewuser(){
var user = $('#username').val();
var name = $('#userfullname').val();
var pass = $('#userpass').val();
var pos = $('#userpos').val();
		if(user==''){
		swal("Error", "Enter the User name!", "error");
		}
		else if(name==''){
		swal("Error", "Enter the full names!", "error");
		}
		else if(pass==''){
		swal("Error", "Enter a valid Password!", "error");
		}
		else if(pos==''){
		swal("Error", "Select the user position!", "error");
		}
		
		
	else{
		$("#saveuser").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:4,user:user,name:name,pos:pos,pass:pass},
		success:function(data){
		$('#saveuser').html(data);
		}
		});	
		}	
}


function setpass(){
	 var str = $('#seluser').val();
	 var parts=str.split('#',4);
	 $('#userid2').val(parts[0]);
	 $('#username2').val(parts[1]);
	 $('#userfullname2').val(parts[2]);
	 $('#userpos2').val(parts[3]);
}


function edituser(){
var userid = $('#userid2').val();
var user = $('#username2').val();
var name = $('#userfullname2').val();
var pos = $('#userpos2').val();
var respass = $('input[name=respass]:checked').val();
if(respass!=1){respass=0}

		if(userid==''){
		swal("Error", "Select the User name!", "error");
		}
		else if(user==''){
		swal("Error", "Enter the User name!", "error");
		}
		else if(name==''){
		swal("Error", "Enter the full names!", "error");
		}
		else if(pos==''){
		swal("Error", "Select the user position!", "error");
		}
		
		
	else{
		$("#saveuser2").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:5,user:user,name:name,pos:pos,userid:userid,respass:respass},
		success:function(data){
		$('#saveuser2').html(data);
		}
		});	
		}	
}

function tickaccess(a,b){

		var param = $('input[name='+a+b+']:checked').val();
        if(param!='YES'){param='NO';}

		$.ajax({
		url:'data.php',
		data:{id:6,categ:a,code:b,rght:param},
		success:function(data){
		}
		});	
}


function saverate(code){

		var amount = $('#rate'+code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		if(amount==''){
		swal("Error", "Enter the Amount!", "error");
		}
		else{
		$("#saverate"+code).html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:7,code:code,amount:amount},
		success:function(data){
		$("#saverate"+code).html(data);
		}
		});	
		}
}

function ticketrep(code){
		var a=3;
		var from = $('#from'+code).val();
		var to = $('#to'+code).val();
		var view = $('input[name=viewall'+code+']:checked').val();
		if(!(view)){view=0}
		if((from==''||to=='')&&view==0){
		swal("Error", "Enter both Start and End dates!", "error");
		}
		else if(view==1){
		window.open("report.php?id=" + a + '&' + "\ncode=" + code);
		}
		else{
		window.open("report.php?id=" + a + '&' + "\nd1=" + from + '&' + "\nd2=" + to + '&' + "\ncode=" + code);
		}
}

function receiptrep(code){
		var a=4;
		var from = $('#bfrom'+code).val();
		var to = $('#bto'+code).val();
		var view = $('input[name=bviewall'+code+']:checked').val();
		if(!(view)){view=0}
		if((from==''||to=='')&&view==0){
		swal("Error", "Enter both Start and End dates!", "error");
		}
		else if(view==1){
		window.open("report.php?id=" + a + '&' + "\ncode=" + code);
		}
		else{
		window.open("report.php?id=" + a + '&' + "\nd1=" + from + '&' + "\nd2=" + to + '&' + "\ncode=" + code);
		}
}

function vehiclelog(){
		var a=5;code=0;
		var from = $('#cfrom').val();
		var to = $('#cto').val();
		var view = $('input[name=cviewall]:checked').val();
		if(!(view)){view=0}
		if((from==''||to=='')&&view==0){
		swal("Error", "Enter both Start and End dates!", "error");
		}
		else if(view==1){
		window.open("report.php?id=" + a + '&' + "\ncode=" + code);
		}
		else{
		window.open("report.php?id=" + a + '&' + "\nd1=" + from + '&' + "\nd2=" + to + '&' + "\ncode=" + code);
		}
}

function audittrail(){
		var a=6;code=0;
		var from = $('#dfrom').val();
		var to = $('#dto').val();
		var view = $('input[name=dviewall]:checked').val();
		if(!(view)){view=0}
		if((from==''||to=='')&&view==0){
		swal("Error", "Enter both Start and End dates!", "error");
		}
		else if(view==1){
		window.open("report.php?id=" + a + '&' + "\ncode=" + code);
		}
		else{
		window.open("report.php?id=" + a + '&' + "\nd1=" + from + '&' + "\nd2=" + to + '&' + "\ncode=" + code);
		}
}


function reserve(){
var regn = $('#regn').val();
var tenant = $('#tenant').val();
var unitno = $('#unitno').val();
var from = $('#from').val();
var to = $('#to').val();
var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

		if(regn==''||tenant==''||unitno==''||from==''||to==''||amount==''){
		swal("Error", "All fields are required!", "error");
		}
		
		
	else{
		$("#saveuser").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:8,regn:regn,tenant:tenant,unitno:unitno,from:from,to:to,amount:amount},
		success:function(data){
		$('#saveuser').html(data);
		}
		});	
		}	
}

function reserverep(code){
		var a=7;
		var from = $('#from'+code).val();
		var to = $('#to'+code).val();
		var view = $('input[name=viewall'+code+']:checked').val();
		if(!(view)){view=0}
		if((from==''||to=='')&&view==0){
		swal("Error", "Enter both Start and End dates!", "error");
		}
		else if(view==1){
		window.open("report.php?id=" + a + '&' + "\ncode=" + code);
		}
		else{
		window.open("report.php?id=" + a + '&' + "\nd1=" + from + '&' + "\nd2=" + to + '&' + "\ncode=" + code);
		}
}
