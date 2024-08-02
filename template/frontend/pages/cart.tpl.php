<script type="text/javascript" src="libs/js/various_lib.js"></script>
<script type="text/javascript">

    function validate(id_container){
        var no_error = true;
        $.each( $('#'+id_container+' .required'), function(index, value){
            if( $(value).is(':visible') && (($(value).val() == '') || ($(this).hasClass('not_zero') && empty($(this).val()))) ){
                $(value).addClass('error');
                $(value).bind('change', function(){
                    $(this).removeClass('error');
                });
                no_error = false;
            }else{
                $(value).removeClass('error');
            }
        });
        $.each($('#'+id_container+' .requiredif'), function(index, value){
            if( !empty($('#'+ $(value).attr('needed') ).val()) && empty($(value).val())  ){
                $(value).addClass('error');
                $(value).bind('change', function(){
                    $(this).removeClass('error');
                });
                no_error = false;
            }else{
                $(value).removeClass('error');
            }
        });
        $.each($('#'+id_container+' .atLeastOne'), function(index, value){
            elements_id = $(value).attr('group').split('|');
            num_empty_field = 0;
            $.each(elements_id, function(array_index, id){
               if( ($('#'+id).attr('type')=='text') && ($('#'+id).val()=='') ){
                   num_empty_field++;
               }
               if( ($('#'+id).attr('type')=='radio') && (! $('#'+id).is(':checked')) ){
                   num_empty_field++;
               }
            });
            if(num_empty_field==elements_id.length){
                no_error = false;
                $.each(elements_id, function(array_index, id){
                    $('#'+id).addClass('error');
                    $('#'+id).bind('change', function(){
                        group_elements = $(this).attr('group').split('|');
                        $.each(group_elements, function(index, id){
                            $('#'+id).removeClass('error');
                        });
                    });
                }); 
            }
        });


        if( !$('#policy').is(':checked')){
            $('#pr').addClass('error');
            alert('You must accept privacy terms and conditions');
            no_error = false;
            $('#policy').bind('change', function(){
                $('#pr').removeClass('error');
            });
        }
        return no_error;
    }

</script>

<script type="text/javascript">
    
    frasi = new Array(); 
    frasi['FORHIMHER']    = <?php echo json_encode($impostazione_FORHIMHER['valore']); ?>;
    frasi['FORAMAZE']     = <?php echo json_encode($impostazione_FORAMAZE['valore']); ?>;
    frasi['FOREXPERT']    = <?php echo json_encode($impostazione_FOREXPERT['valore']) ?>;
    frasi['SUPERIOR']     = <?php echo json_encode($impostazione_SUPERIOR['valore']); ?>;
    frasi['FORFRIENDS']   = <?php echo json_encode($impostazione_FORFRIENDS['valore']); ?>;
    frasi['FORFAMILY']    = <?php echo json_encode($impostazione_FORFAMILY['valore']); ?>;
    frasi['FORLOVE']      = <?php echo json_encode($impostazione_FORLOVE['valore']); ?>;
    frasi['FORBUSSINESS'] = <?php echo json_encode($impostazione_FORBUSSINESS['valore']); ?>;

     function fill_biglietto(index){
         $('#biglietto').val( frasi[index] );
         return false;
     }
     
</script>


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

            <div class="cart">

                <div class="baloon date headcart">
                    <div class="baloon">
                        <div class="leftprice">
                            <p class="uorder">Your order:</p>
                            <p class="cost" style="word-spacing:0px;"><?php echo htmlspecialchars($prodotto['nome']); ?> <span><?php echo number_format($prodotto['prezzo'], 2, '.', ''); ?></span> + service <span><?php echo number_format($location['spedizione'], 2, '.', ''); ?></span></p>
                            <p class="price">Final price: <span><?php echo number_format($prodotto['prezzo']+$location['spedizione'], 2, '.', ''); ?></span> €</p>
                        </div>
                        <div class="rightprice">
                            <div class="box-datiacquisto">
                                <div class="product-selected">
                                    <img class="tobkg" src="<?php echo "{$img_prodotti_path}{$prodotto['id_prodotto']}.png"; ?>" alt="<?php echo htmlspecialchars($prodotto['descrizione']); ?>" />
                                    <h3><?php echo htmlspecialchars($prodotto['nome']); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <br /><br />
                <a style="float:right; border:none !important; font-size:15px;" href="user_login.php"> - not registered yet? <b>login or carry on</b> -&nbsp;&nbsp;&nbsp;</a>
                <br /><br />

                <form id="paynow" action="<?php echo "{$_SERVER['PHP_SELF']}?p={$prodotto['id_prodotto']}" ?>" method="POST">

                    <!--Alarm-->
                    <?php
                    if( count($error) ){
                        echo <<<ALARM
                            <div  class="alarm" style="margin:60px 0 60px 0; display:block;">
                                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <!-- <tr class="greenAlarm"><td><p>Operation was completed successfully ...</p></td></tr> -->
                                    <tr class="redAlarm"><td><p> ERROR &raquo; It has been an error occurred ... Please recheck.</p></td></tr>
                                </table>
                            </div>
ALARM;
                    }
                ?>

                    <?php show_errors($error); ?>
                    
                    
                    <!--Messaggio-->
                    <div class="messageto">
                        <img class="closeme" src="template/frontend/media/image/close.png" style="float:right; margin:10px 10px -30px 0; cursor:pointer;" />
                        <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="8">
                                    <div class="message">
                                        <textarea name="biglietto" id="biglietto" maxlenght="300">Write your message (max 300 characters)... 
or let us suggest you...

</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FORHIMHER');">For him&frasl;her</a></td>
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FORAMAZE');">For amazing</a></td>
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FOREXPERT');">For expert</a></td>
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('SUPERIOR');">Superior</a></td>
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FORFRIENDS');">For friends</a></td>
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FORFAMILY');">For family</a></td>                	
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FORLOVE');">For love</a></td>                	
                                <td class="mex_opt"><a href='#' onclick="javascript: return fill_biglietto('FORBUSSINESS');">For business</a></td>
                            </tr>
                        </table>
                    </div>

                    <div class="messageto" style="margin:40px 0 0px 0; display:block;" /></div>
                <a style="float:right; margin:-10px 0px 0px 0; display:block;" class="showmessageto">&nbsp;&nbsp;&nbsp;OPS! VIEW THE MESSAGE AGAIN!&nbsp;&nbsp;&nbsp;</a>

                <hr />

                <!--Consegna-->
                <!-- SALVATO PER FUTURI AGGIORNAMENTI, NON CANCELLARE
                <table class="baloon date" width="100%" border="0" cellspacing="0" cellpadding="0">             
                        <tr>
                                <td style="width:50%"><label style="width:90px;" class="inputlabel">DELIVERY:</label><input id="datepicker" type="text" readonly></td>
                                <td style="width:50%"><label style="width:100px;" class="inputlabel">PREFERED TIME:</label><input id="timepicker" type="text" readonly></td>
                        </tr>
                </table>
                -->
                <table class="baloon date" width="100%" border="0" cellspacing="0" cellpadding="0">             
                    <tr>
                        <td style="width:30%"><p style="margin:0 !important; padding:0 !important;">► CHOOSE DATE AND TIME : </p></td>
                        <td style="width:40%"><label style="width:90px;" class="inputlabel">DELIVERY:</label><input name="data_spedizione" id="data_spedizione" type="text" class="required" value="<?php echo (!empty($order['data_spedizione'])) ? htmlspecialchars(date('m/d/Y',  strtotime($order['data_spedizione']))) : ''; ?>" readonly></td>
                        <td style="width:30%">
                            <select name="sliceofday" id="sliceofday" class="required">
                                <option value="morning">morning</option>
                                <option value="afternoon">afternoon</option>
                                <option value="evening">evening</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <hr />

                <!--Dati destinatario-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">             
                    <tr>
                        <td colspan="2"><br /><h5>&nbsp;Delivery to:</h5><br /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel" style="padding-right:35px !important;">NAME</label><input name="nome_sped" id="nome_sped" type="text" class="required" placeholder="" value="<?php echo htmlspecialchars($order['nome_sped']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel" style="padding-right:35px !important;">SURNAME</label><input name="cognome_sped" id="cognome_sped" type="text" class="required" placeholder="" value="<?php echo htmlspecialchars($order['cognome_sped']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label class="inputlabel">PHONE NUMBER</label><input name="telefono_sped" id="telefono_sped" type="text" placeholder="" value="<?php echo htmlspecialchars($order['telefono_sped']); ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin:0px 0px 0px 0px !important; padding:0px 0px 0px 0px !important;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr>
                                    <td style="width:50% !important;">
                                        <div><input readonly="readonly" name="state_sped" id="state_sped" type="text" placeholder="" value="<?php echo htmlspecialchars($order['state_sped']); ?>" style="padding-left:10px !important; margin-left:0px !important;" /></div>
                                    </td>
                                    <td style="width:50% !important;">
                                        <div><input readonly="readonly" name="country_sped" id="country_sped" type="text" class="required" placeholder="country of recipient" value="<?php echo htmlspecialchars($order['country_sped']); ?>" style="padding-left:10px !important" /></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50% !important;">
                                        <div><input readonly="readonly" name="city_sped" id="city_sped" type="text" class="required" placeholder="" value="<?php echo htmlspecialchars($order['city_sped']); ?>" style="padding-left:10px !important" /></div>
                                    </td>
                                    <td style="width:50% !important;">
                                        <div>
                                            <?php
                                            if( empty($location['cap']) ){
                                                echo '<input name="cap_sped" id="cap_sped" type="text" class="required" placeholder="ZIP CODE/CAP" value="" style="padding-left:10px !important" />';
                                            }else{
                                                $array_cap = explode("\n", trim($location['cap']));
                                                if(count($array_cap)==1){
                                                    echo '<input readonly="readonly" name="cap_sped" id="cap_sped" type="text" class="required" placeholder="ZIP/CAP of recipient" value="'.trim($array_cap[0]).'" style="padding-left:10px !important" />';
                                                }else{
                                                    echo '<select name="cap_sped" id="cap_sped" class="required">';
                                                    foreach ($array_cap as $cap) {
                                                        $cap = trim($cap);
                                                        echo "<option value=\"$cap\">$cap</option>";
                                                    }
                                                    echo '</select>';
                                                }
                                            }
                                            ?>
<!--                                            -->
<!--                                            <select name="cap" id="cap" class="required">
                                                <option value="00000">00000</option>
                                                <option value="00001">00001</option>
                                                <option value="00002">00002</option>
                                            </select>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width:50% !important;">
                                        <div><input name="address_sped" id="address_sped" type="text" class="required" placeholder="address of recipient" value="<?php echo htmlspecialchars($order['address_sped']); ?>" style="padding-left:10px !important" /></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

				<br /><hr />
            
                <!--Dati cliente-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">

                    <?php if(empty($utente)): ?>
                    <tr>
                        <td colspan="2"><br /><h5>&nbsp;Enter your personal data:</h5><br /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel" style="padding-right:35px !important;">NAME</label><input name="nome" id="nome" type="text" class="required" placeholder="" value="<?php echo htmlspecialchars($order['nome']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel" style="padding-right:35px !important;">SURNAME</label><input name="cognome" id="cognome" class="required" type="text" placeholder="" value="<?php echo htmlspecialchars($order['cognome']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">PHONE NUMBER</label><input name="telefono" id="telefono" type="text" placeholder="" value="<?php echo htmlspecialchars($order['telefono']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel" style="padding-right:35px !important;">EMAIL</label><input name="email" id="email" class="required" type="email" placeholder="" value="<?php echo htmlspecialchars($order['email']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <?php endif; ?>

                    <tr>
                        <td style="width:50% !important;">
                            <div class="wrap_checkbox">
                                <label>DO YOU WANT THE ORDER DETAILS ?</label><input id="order_details" name="order_details" type="checkbox" value="1" <?php echo ($order['order_details'])? 'checked="checked"':'' ?> />
                            </div>
                        </td>
                        <td style="width:50% !important;">
                            <div class="wrap_checkbox">
                                <label>DO YOU WANT THE ORDER INVOICE ?</label><input id="invoice_details" name="invoice_details" type="checkbox" value="1" <?php echo ($order['invoice_details'])? 'checked="checked"':'' ?> />
                            </div>
                        </td>
                    </tr>

                    <?php if(empty($utente['agency_name']) || empty($utente['agency_address']) || empty($utente['agency_code'])): ?>
                    <tr class="tr_fattura">
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr class="tr_fattura">
                        <td colspan="2">
                            <div><label class="inputlabel">AGENCY</label><input name="agency_name" id="agency_name" type="text" class="required" placeholder="COMPANY NAME" value="<?php echo htmlspecialchars($order['agency_name']); ?>" /></div>
                        </td>
                    </tr>
                    <tr class="tr_fattura">
                        <td colspan="2">
                            <div><label class="inputlabel">ANDRESS</label><input name="agency_address" id="agency_address" type="text" class="required" placeholder="ADDRESS" value="<?php echo htmlspecialchars($order['agency_address']); ?>" /></div>
                        </td>
                    </tr>
                    <tr class="tr_fattura">
                        <td colspan="2">
                            <div><label class="inputlabel">CODE</label><input name="agency_code" id="agency_code" type="text" class="required" placeholder="VAT NUMBER" value="<?php echo htmlspecialchars($order['agency_code']); ?>" /></div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr> 
                    <tr>
                        <td colspan="2" style="margin:0px 0px 0px 0px !important; padding:0px 0px 0px 0px !important;">
                            <table style="width:100%">
                                <tr>
                                    <td style="width:80% !important;">
                                        <div class="form-condizioni"><a href="condizioni.php">CONDITIONS & PRIVACY</a></div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div id="pr" class="wrap_checkbox">
                                            <label>I ACCEPT</label><input id="policy" name="policy" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>           

                </table>

                <br /><br />

                <div><input id="confirm" name="confirm" type="submit" value="C O N F I R M" onclick="javascript: return validate('paynow');" /></div>

                </form>

                <br /><br />

            </div>

        </div>
    </div>
</div>
