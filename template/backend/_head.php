


	<!--METATAG-->
	<title>YMW &raquo; ADMINISTRATION</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="noindex,nofollow">
	<meta name="author" content="Alberto Marà"/>
	<meta name="copyright" content="Pixo (R)(C) - Italy Rome - Alberto Marà"/>
	<meta name="reply-to" content="segreteria@pixoagency.com">
	<meta http-equiv="content-language" content="Italian"/>
	<meta name="language" content="it-IT"/>
	<meta name="description" content="Amministrazione youmywine.com"/>



	<!--//CSS & STYLING-->

	<!--FAVICON-->   <link href="../template/backend/media/image/favicon.png" rel="shortcut icon" />
	<!--CICLEFONT--> <link href="../template/backend/media/font/Ciclefont/Ciclefont.css" rel="stylesheet" type="text/css" />
	<!--VIBESFONT--> <link href="../template/backend/media/font/Vibesfont/Vibesfont.css" rel="stylesheet" type="text/css" />
	<!--STYLE-->     <link rel="stylesheet" href="../template/backend/style.css" media="screen" type="text/css" />



	<!--//SCRIPTS-->		

	<!--JQuery-->
	<script type="text/javascript" src="../libs/js/Jquery-1.10.1/Jquery-1.10.1.js"></script>
	<script type="text/javascript" src="../libs/js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js"></script>
	<link rel="stylesheet" href="../libs/js/jquery-ui-1.10.3/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" />

	<!--preLoader-->
	<script type="text/javascript">
		$(window).load(function() {
			$("#preloader").fadeOut();
		});
	</script>

	<!--formStyler--><!--graphics-->
	<link rel="stylesheet" href="../template/backend/js/formStyler/css/formStyler.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../template/backend/js/formStyler/css/formTheme_standard.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../template/backend/js/formStyler/js/formStyler.js"></script>

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
	<script type="text/javascript" src="../template/backend/js/formStyler/js/datepicker/javascript/zebra_datepicker.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datepicker').datepicker({ minDate: 0, maxDate: "+12M +0D" });
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
	<link rel="stylesheet" href="../template/backend/js/transtionTime/transtiontime.css" media="screen" type="text/css" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("a,.to-bkg").addClass("tt_classic_fastIn_mediumOut");
			$("button,input,tr,td,.wrap_checkbox,.checkbox,.wrap_radio,.radio").addClass("tt_classic_fastIn_mediumOut");
		});
	</script>


