<!--content-->
<div id="content" class="block-full">
    <div class="bkg-1">
        <div class="wrap">

            <br />

            <?php include "template/frontend/modules/normalcategorymenu/normalcategorymenu.tpl.php"; ?>

            <br />

        </div>
    </div>
    
    <div class="block-full bkg-2">
        <div class="wrap">

            <br /><br /><br />
            

		<div class="paperorder">
			<br />
			<h3 style="text-align:center; margin:-8px auto 10px auto;"">YOUR ORDER HAS BEEN CREATED</h3><br />
			<p style="margin:-10px auto 10px auto; text-align:center; "><font size="-1">Save this data to make a transfer online (<a href="" target="_blank">read info</a>)<br /><font style="margin-top:10px">or pay now with <a href="https://www.paypal.com/us/webapps/mpp/how-paypal-works" target="_blank">PAYPAL (info)</a></font><br /> <font size="-2">the safest method for your online payments</font></font></p> 
			<br />
            
			<p style="text-align:center; margin:-23px auto 0px auto; font-weight:bold;">Order Details:</p>
				
			<br />

			<div style="border:1px dashed #CCCCCC; padding:20px 20px 20px 20px;">
            
				<p style="margin:-18px auto 0px auto;"><b style="font-size:16px;">&diams;</b> buyer <b style="font-size:16px;">&diams;</b></p>
				<p style="margin:-31px auto 0px auto;"><i><?php echo htmlspecialchars($ordine['nome']); ?> <?php echo htmlspecialchars($ordine['cognome']); ?> , <?php echo htmlspecialchars($ordine['email']); ?></i></p>
				
				<br />
					
				<p style="margin:-8px auto 0px auto;"><b style="font-size:16px;">&diams;</b> receiver <b style="font-size:16px;">&diams;</b></p>
				<p style="margin:-26px auto 0px auto;"><i><?php echo htmlspecialchars($ordine['nome_sped']); ?> <?php echo htmlspecialchars($ordine['cognome_sped']); ?></i></p>
				<p style="margin:-28px auto 0px auto;"><i><?php echo htmlspecialchars($ordine['state_sped']); ?>, <?php echo htmlspecialchars($ordine['country_sped']); ?></i></p>
				<p style="margin:-28px auto 0px auto;"><i><?php echo htmlspecialchars($ordine['city_sped']); ?>, <?php echo htmlspecialchars($ordine['address_sped']); ?></i></p>
				
				<br />
					
				<p style="margin:-18px auto 0px auto;"><b style="font-size:16px;">&diams;</b> Other <b style="font-size:16px;">&diams;</b></p>
				<p style="margin:-28px auto 0px auto;">Product :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo htmlspecialchars($ordine['nome_prodotto']); ?></i></p>
				<p style="margin:-28px auto 0px auto;">Product price :&nbsp;&nbsp;€&nbsp;<i><?php echo htmlspecialchars($ordine['costo_prodotto']); ?> </i></p>
				<p style="margin:-28px auto 0px auto;">Service : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;€&nbsp;<i><?php echo htmlspecialchars($ordine['costo_spedizione']); ?></i></p>
				<p style="margin:-25px auto 0px auto;">Shipping data :&nbsp;&nbsp;<i><?php echo htmlspecialchars($ordine['data_spedizione']); ?></i></p>
				<p style="margin:-28px auto 0px auto;">Slice of day :&nbsp;&nbsp;&nbsp;<i><?php echo htmlspecialchars($ordine['sliceofday']); ?></i></p>

			</div>

			<br /><br />

			<div style="border:1px dashed #CCCCCC; padding:20px 20px 20px 20px;">
					
				<a style="color:#999; cursor:pointer; z-index:9999;" target="_blank" href="">
					<p style="position:relative; display:block; text-align:right; right:0%; margin:-2.5% 0 -22px 0;"><b style="font-size:10px; color:#999;  margin-bottom:-10px;">If you want to pay using bank fill the wire transfer with the following data</b></p>
					<p style="text-align:right; display:block; float:right; right:0%; margin:-22px 0 0px 0;"><b style="font-size:10px;">Info payments & bank transfer</b>
				</a>
				<p style="margin:-39px auto 0px auto;"><b style="font-size:16px;">&diams;</b>  bank transfer payment <b style="font-size:16px;">&diams;</b></p>
				
				<p style="margin:-28px auto 0px auto;">Reason&nbsp;: 9876543212345678909</p>
				<p><?php echo $impostazione_BONIFICO['valore'] ?></p>
				<!--<p style="margin:-28px auto 0px auto;">For...&nbsp;&nbsp;&nbsp;: YOUMYWINE DI NICCOLO' MARIA BALLERINI</p>
				<p style="margin:-28px auto 0px auto;">IBAN&nbsp;&nbsp;&nbsp;: IBAN IT0000000000000000000000</p>-->
				<a style="cursor:pointer; z-index:9999; text-align:center;" target="_blank" href="http://youmywine.com/TEST_SITE/" onclick="javascript:alert('DEMO RINGRAZIAMENTI \n \n thanks for your purchase, your order has been saved \n you will be redirected to the homepage')">&nbsp;&nbsp;<b style="font-size:14px; margin-bottom:-10px;">OK, I SAVED EVERYT<font style="letter-spacing:2px;">HIN</font>G AND I WILL PAY BY BANK... CLOSE MY ORDER NOW!</b>&nbsp;&nbsp;</a>

				</div>
                        
            	<br /><br /><br />
            	<p style="text-align:center; color:#FFF !important;">
                	Or confirm & pay the order now! <br /> <font size="-3">( here we use <a style="color:#FFF !important;" href="https://www.paypal.com/us/webapps/mpp/how-paypal-works" target="_blank">PAYPAL (info)</a>, the safest method for your online payments )</font>
            	</p>
		
            
            
            
            <form class="form_paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <!--<form class="form_paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">--> 
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="<?php echo $impostazione_PAYPALMAIL['valore'] ?>">
                <input type="hidden" name="lc" value="IT">
                <input type="hidden" name="item_name" value="Order YouMyWine">
                <input type="hidden" name="item_number" value="<?php echo $ordine['id_ordine']; ?>">
                <input type="hidden" name="amount" value="<?php echo $ordine['totale']; ?>">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                <input class="button_confirm" style="" type="image" src="template/frontend/media/image/paybutton.png" border="0" name="submit" alt="PayPal - Il sistema di pagamento online più facile e sicuro!">
                <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
              
                <!--<input class="button_confirm" style="" type="image" src="template/frontend/media/image/paybutton.png" border="0" name="submit" alt="PayPal - Il sistema di pagamento online più facile e sicuro!">
                <img alt="" border="0" src="https://www.sandbox.paypal.com/it_IT/i/scr/pixel.gif" width="1" height="1">-->
            </form>
         
        </div>
    </div>
</div>

