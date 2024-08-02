<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

		<!--SITE DATA-->
		<title>FORMSTYLER | TEST 1 | TUTTI I CAMPI</title>
		<link rel="stylesheet" href="../../screen.css" type="text/css" media="screen" />
		<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
		
		<!--formStyler -->
		<link rel="stylesheet" href="css/formStyler.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/formTheme_standard.css" type="text/css" media="screen" />
		<script src="js/formStyler.min.js"></script>
		<!--
		<script src="js/formValidator.js"></script>
		<script src="js/formStyler.js"></script>
		-->
		<script src="js/query.js"></script>

</head>

<body>
<br />
		<style>
  		h1,h2,h3{ color:#000; font-family:Arial, Helvetica, sans-serif; text-shadow: 0 2px 2px #999999; }
  		p,span,blockquote,strong,b,i,li,td,tl,dt,dl,dd 	{
     font-family:Arial, Helvetica, sans-serif;
     font-weight:500;
     line-height:18px;
     color:#484848;
     text-shadow:0 1px 1px #FFF;
    }
    a															{ color:#000; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:20px; }
    a:hover									{ color:#000 !important; }
    hr 													{ height:0px; border:0px solid; border-bottom:1px solid #484848 !important; margin:;}
    img 												{ border:0px !important;}
    #content								{ margin:0 auto !important; width:50%; background:#FFF; margin:0 auto; padding:100px; }
    .code											{ padding:20px 20px 20px 20px; background:#333; color:#FFF; text-shadow: 0 -1 2px #FFF; font-family:Arial, Helvetica, sans-serif;}
			#form{
    width:50%;
    margin:20px auto 20px auto;
   }
   form/*create a class or id for all form please!*/{
    box-sizing: 										 border-box;
    -moz-box-sizing: 						border-box;
    -webkit-box-sizing:				border-box;
    padding:10px 10px 10px 10px;
    line-height: 		 		 		 	1;
    background: 		 		 		 		#FFF;
   }

		</style>

<div id="form">
<h1 style="text-align:center;">FormStyeler V1.0<br />TUTTI I CAMPI</h1><br />
			<!-- buttonStyler/ -->
			<form>
			
					<div class="wrap_checkbox">
						<label>Label</label>
						<input type="checkbox" />
					</div>
					<div class="wrap_radio">
						<label>Label</label>
						<input name="AA" type="radio" />
					</div>
					<div class="wrap_radio">
						<label>Label</label>
						<input name="AA" type="radio" />
					</div>
					<div class="wrap_inputfile">
						<input type="file" id="file" name="myfiles[]" multiple />
					</div>
					<div>
						<label class="inputlabel">my text</label>
						<input name="user"		type="text" value="text" />
					</div>
					<div>
						<label class="inputlabel">my url</label>
						<input name="site" 		type="text" value="http://" />
					</div>
					<div>
						<label class="inputlabel">my password</label>
						<input	name="pass" 	type="password" value="password" />
					</div>
					<div>
						<label class="inputlabel">my email</label>
						<input name="email" type="email" value="your@email.com" />
					</div>
					<div class="wrap_select">
						<select class="select">
							<option value="0" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/facebook-icon-32.png" data-description="Description with Facebook">Facebook</option>
							<option value="1" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/twitter-icon-32.png" data-description="Description with Twitter">Twitter</option>
							<option value="2" selected="selected" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/linkedin-icon-32.png" data-description="Description with LinkedIn">LinkedIn</option>
							<option value="3" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/foursquare-icon-32.png" data-description="Description with Foursquare">Foursquare</option>
							<!--or
							<option>SIMPLE OPTION</option>
							<option>SIMPLE OPTION</option>
							<option>SIMPLE OPTION</option>
							<option>SIMPLE OPTION</option>
							-->
						</select>
					</div>
					<div class="message">
						<textarea>
But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
									</textarea>
					</div>
					<div class="privacy">
						<textarea>
But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
									</textarea>
					</div>
					<div class="clr"></div>
					<div class="QapTcha">
						<div class="QapTchainfo">Scorri la freccia per attivare l'invio mail &raquo;</div>
					</div>
					<div>
						<button disabled >DISABLE</button>
					</div>
					<div>
						<input type="reset" value="resetta" />
					</div>
					<div>
						<input type="submit" value="invia" />
					</div>
			</form>
			<!-- /buttonStyler -->
</body>
</html>