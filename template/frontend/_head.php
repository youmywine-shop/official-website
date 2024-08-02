

	<!--METATAG-->
	<title>YOUMYWINE.COM</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index">
	<meta name="robots" content="follow">
	<meta name="author" content="Alberto Marà"/>
	<meta name="copyright" content="Pixo (R)(C) - Italy Rome - Alberto Marà"/>
	<meta name="reply-to" content="segreteria@pixoagency.com">
	<meta http-equiv="content-language" content="Italian"/>
	<meta name="language" content="it-IT"/>
	<meta name="description" content="MYDESCRIPTION"/>
	<meta name="keywords" content="MYKEY"/>	



	<!--//CSS & STYLING-->

	<!--FAVICON-->   <link href="template/frontend/media/image/favico.png" rel="shortcut icon" />
	<!--CICLEFONT--> <link href="template/frontend/media/font/Ciclefont/Ciclefont.css" rel="stylesheet" type="text/css" />
	<!--VIBESFONT--> <link href="template/frontend/media/font/Vibesfont/Vibesfont.css" rel="stylesheet" type="text/css" />

	<!--[if !IE]><!-->
		<link rel="stylesheet" href="template/frontend/style_notIe.css" media="screen" type="text/css" />
	<!--[if IE 10]>
		<link rel="stylesheet" href="template/frontend/style-notIe.css" media="screen" type="text/css" />
	<![endif]-->
	<!--[if gte IE 9]>
		<style type="text/css">*{filter:none;}</style>
		<link rel="stylesheet" href="template/frontend/style-notIe.css" media="screen" type="text/css" />
	<![endif]-->
	<!--[if gte IE 8]>
		<link rel="stylesheet" href="template/frontend/style_forIe.css" media="screen" type="text/css" />
	<![endif]-->
	<!--[if lte IE 8]>
		<meta http-equiv="REFRESH" content="0;url=http://www.google.com/">
		<script type="text/javascript">window.location = "http://www.google.com/";</script>
	<![endif]-->



	<!--//SCRIPTS-->		

	<!--JQuery-->
	<script type="text/javascript" src="libs/js/Jquery-1.10.1/Jquery-1.10.1.js"></script>
	<script type="text/javascript" src="libs/js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js"></script>
	<link rel="stylesheet" href="libs/js/jquery-ui-1.10.3/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" />

	<!--preLoader-->
	<script type="text/javascript">
		$(window).load(function() {
			$("#preloader").fadeOut();
		});
	</script>

	<!--formStyler--><!--graphics-->
	<link rel="stylesheet" href="template/frontend/js/formStyler/css/formStyler.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="template/frontend/js/formStyler/css/formTheme_standard.css" type="text/css" media="screen" />
	<script type="text/javascript" src="template/frontend/js/formStyler/js/formStyler.js"></script>

	<!--formStyler--><!--radio & check button-->
	<script type="text/javascript">
		$(document).ready(function(){
			//	custom check and radio
			$('input[type="checkbox"]').checkStyler();
			$('input[type="radio"]').checkStyler();			
			// reset all
			$('input[type="reset"]').click(function() {
				$('.checkbox').removeClass('checked');
			});
			$('input[type="reset"]').click(function() {
				$('.radio').removeClass('selected');
			});
		});
	</script>

	<!--formStyler--><!--datapicker-->
	<script type="text/javascript" src="template/frontend/js/formStyler/js/datepicker/javascript/zebra_datepicker.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#data_spedizione').datepicker({ minDate: 0, maxDate: "+12M +0D" });
		});
	</script>

	<!--formStyler--><!--textarea control-->
	<script type="text/javascript">
		
  		//show-hide della textarea
//      $(document).ready(function valider() {
//        $(".message").css("display","none");
//        $('#messageto').change(function hideshow(){
//          theMessage = false;
//          if($("#messageto").is(':checked')){ theMessage = true; }
//          else { theMessage = false; }
//            if(theMessage == true ) $(".message").fadeIn(1000);
//            if(theMessage == false ) $(".message").fadeOut(1000);
//          $('#messageto').change(hideshow);
//        });
//      });			
			//imposto la larghezza massima della textarea
//      $(document).ready(function valider() {
//        maWidth = $(".baloon tr>td").width();
//				$(".message>textarea").css("max-width",maWidth);
//				$(".message>textarea").css("min-width",maWidth);
//				$(".message>textarea").css("width",maWidth);
//      });
		
    </script>

	<!--formStyler--><!--hide/show modulo messaggio-->
	<script type="text/javascript">
		$(document).ready(function() {
			//hide
			$("a.showmessageto").css("display","none");
				$(".closeme").click(function(){
					$(".closeme").fadeOut(1200);
					$(".messageto").fadeOut(1200);
					$(".closeme").hide(2000),2000;
					$(".messageto").hide(2000),2000;
					$("a.showmessageto").fadeIn(1500);
			});
			//show
			$("a.showmessageto").click(function show(){
				$(".messageto").fadeIn(1500);
					$(".closeme").fadeIn(2000),2000;
					$("a.showmessageto").fadeOut(1500);
					$("a.showmessageto").hide(1500),2000;
			});

		});
	</script>

	<!--formStyler--><!--hide/show modulo fattura-->
	<script type="text/javascript">
		//show-hide del campo fattura
		$(document).ready(function valider() {
			$(".tr_fattura").css("display","none");
			$('#invoice_details').change(function hideshow(){
				theMessage = false;
				if($("#invoice_details").is(':checked')){ theMessage = true; }
				else { theMessage = false; }
				if(theMessage == true ) $(".tr_fattura").fadeIn(1000);
				if(theMessage == false ) $(".tr_fattura").fadeOut(1000);
				$('#order').change(hideshow);
			});
		});
	</script>

	<!--formStyler--><!--hide/show modulo registrazione-->
	<script type="text/javascript">
		$(document).ready(function() {
			//show
//			$("#user_registration").css("display","none");
			$("input[name='registerme']").click(function show(){
				$("#user_registration").fadeIn(200);
			});
			$("input[name='registerme']").click(function show(){
				$(".closeme").fadeIn(200);
			});
			//hide
			$(".closeme").click(function(){
				$(".closeme").fadeOut(1200);
				$("#user_registration").fadeOut(1200);
				$(".closeme").hide(2000),2000;
				$("#user_registration").hide(2000),2000;
			});
		});
	</script>

	<!--imgToBkg-->
	<script type="text/javascript">
		$(window).ready(function changelink() {
			$('.tobkg').each(function(index) {
				//recupera gli attributi e inseriscili come variabili
				var src = $(this).attr('src');
				//imposto una nuova struttura
				var structure = '<div class="to-bkg" style="background-image: url('+src+');"></div>'
				$(this).after(structure);
			});
			//Rimuovi la vecchia immagine
			$('img.tobkg').remove();
		});
	</script>

	<!--TransitionTime-->
	<link rel="stylesheet" href="template/frontend/js/transtionTime/transtiontime.css" media="screen" type="text/css" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("a,.followme,.normalCategory li a span,.specialCategory .to-bkg,.specialCategory li a span,.categoryList li div,.locationList li .to-bkg,.city,.cityshadow,.cityname p,.productList li div,.buythis input,.product-selected>div,.location-selected>div").addClass("tt_classic_fastIn_mediumOut");
			$("button,input,.baloon,.baloon td,.baloon td tr,.message,.wrap_checkbox,.checkbox,.wrap_radio,.radio,textarea,.wrap_select,.wrap_inputfile,.inputfile-upload,.select,option,.QapTcha,.bgSlider,.wrap_rangeamount,.wrap_quantity,.form-condizioni,.form-privacy,.payme").addClass("tt_classic_fastIn_mediumOut");
		});
	</script>

	<!--SwipeSlider-->
	<link rel="stylesheet" href="template/frontend/js/swiperSlide/css/idangerous.swiper.css" />
	<script src="template/frontend/js/swiperSlide/js/idangerous.swiper-2.0.min.js"></script>
	<script>
		$(document).ready(function(){
			var mySwiper = new Swiper('.slide-top',{
				mode:'horizontal',
				loop: true,
				speed:900,
				autoplay: 5000,
				calculateHeight: true,
				visibilityFullFit: true,
			});
		});
	</script>

