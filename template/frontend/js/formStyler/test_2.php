<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

		<!--SITE DATA-->
		<title>FORMSTYLER</title>
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
			
   form/*create a class or id for all form please!*/{
    box-sizing: 										 border-box;
    -moz-box-sizing: 						border-box;
    -webkit-box-sizing:				border-box;
    padding:10px 10px 10px 10px;
    line-height: 		 		 		 	1;
    background: 		 		 		 		#FFF;
   }
   
   #wrap												{	position:absolute; top:6%; right:3%; width:22%; padding:22px; box-sizing:content-box; background:#FFF;}
   .myrec											{ text-align:center; width:100%;}
   .myrec .0								{	font: #09F !important; font-size: 20px !important;}
   .myrec a									{ font: #FFF !important; font-size: 16px !important;}

		</style>

<h1>FormStyeler V1.0</h1>
<h2>DEMO:</h2>
		<b>LOG ABSOLUTE</b><br /><br />

		<p class="description">
&nbsp;&nbsp;&lt;style&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;#wrap												      {	position:absolute; top:6%; right:3%; width:22%; padding:22px; box-sizing:content-box; background:#FFF;}<br />
&nbsp;&nbsp;&nbsp;&nbsp;.myrec											{ text-align:center; width:100%;}<br />
&nbsp;&nbsp;&nbsp;&nbsp;.myrec .0								{	font: #09F !important; font-size: 20px !important;}<br />
&nbsp;&nbsp;&nbsp;&nbsp;.myrec a									{ font: #FFF !important; font-size: 16px !important;}<br />
&nbsp;&nbsp;&lt;/style&gt;<br /><br />
			
&nbsp;&nbsp;&lt;div id=&quot;wrap&quot;&gt;<br/>
&nbsp;&nbsp;&lt;!-- buttonStyler/ --&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;form&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label class=&quot;inputlabel&quot;&gt;USER/MAIL&lt;/label&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input name=&quot;user&quot; type=&quot;text&quot; value=&quot;text&quot; /&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label class=&quot;inputlabel&quot;&gt;PASSWORD&lt;/label&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input name=&quot;pass&quot;  type=&quot;password&quot; value=&quot;password&quot; /&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type=&quot;submit&quot; value=&quot;invia&quot; /&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/form&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;!-- /buttonStyler --&gt;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class=&quot;myrec&quot;&gt;&lt;span class=&quot;0&quot;&gt;OPPURE... &lt;/span&gt;&lt;span&gt;&lt;a href=&quot;#&quot;&gt;REGISTRATI!&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;<br/>
&nbsp;&nbsp;&lt;/div&gt;<br/>
		</p>


			<div id="wrap">
					<!-- buttonStyler/ -->
					<form>
						<div>
								<label class="inputlabel">USER/MAIL</label>
								<input name="user" type="text" value="text" />
						</div>
						<div>
							<label class="inputlabel">PASSWORD</label>
							<input name="pass"  type="password" value="password" />
					</div>
					<div>
							<input type="submit" value="invia" />
					</div>
			</form>
			<!-- /buttonStyler -->
			<div class="myrec"><span class="0">OPPURE... </span><span><a href="#">REGISTRATI!</a></span></div>
		</div>

</body>
</html>