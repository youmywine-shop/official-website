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
            min_num = $(value).parents('.requiredif_group').find('.requiredif').length;
            num_empty=0;
            $.each($(value).parents('.requiredif_group').find('.requiredif'), function(k,v){
                if(!empty($(v).val())){
                    num_empty++;
                }
            });
            if(num_empty>0 && num_empty<min_num ){
                $(value).addClass('error');
                $(value).bind('change', function(){
                        n = 0;
                        $.each($(this).parents('.requiredif_group').find('.requiredif'), function(k, v) {
                            if (!empty($(v).val())) {
                                n++;
                            }
                        });
                        if(n==0 || n==min_num ){
                            $(this).parents('.requiredif_group').find('.requiredif').removeClass('error');
                        }
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



<!--content-->
<div id="content" class="block-full">
    <div class="bkg-1"><br /></div>
</div>

<div class="block-full bkg-2">

    <div class="wrap">
        
        <br /><br /><br />
        
        <div class="cart">

            <div style="text-align:center">
                <h1>WELCOME</h1>
                <p style="text-align:center"><i>Login or sign up!</i></p>
            </div>

            <hr />

            <form id="user_login" action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST">

                <?php
                    if($error){
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
<!--                <div  class="alarm" style="margin:60px 0 60px 0; display:block;">
                    <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr class="greenAlarm"><td><p>Operation was completed successfully ...</p></td></tr>
                        <tr class="redAlarm"><td><p> ERROR &raquo; It has been an error occurred ... Please recheck.</p></td></tr>
                    </table>
                </div>-->


                <!--Dati cliente-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="2"><br /><p style="text-align:center;">LOG IN NOW</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">EMAIL</label><input type="text" name="login_email" id="login_email" placeholder="your email" value=""/></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">PASSWORD</label><input name="login_password" id="login_password" type="password" placeholder="password" value="" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input name="accedi" id="accedi" type="submit" value="S U B M I T" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td style="width:50% !important;">
                            <div><input name="nome" type="button" value="you have lost your password ?" onclick="javascript: window.location ='lost_password.php';" /><br/>
                            </div>
                        </td>
                        <td style="width:50% !important;">
                            <div><input name="registerme" type="button" value="Aren't you registered yet? Click here!" style="padding-left:10px !important" /></div>
                        </td>
                    </tr>
                </table>

            </form>

            <form id="user_registration" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="<?php echo array_key_exists('registra', $_POST)? 'display:block;':'display:none;'; ?>">
                
                <?php show_errors($error_reg); ?>
                
                <br /><br /><hr /><br />
                <?php
                if(count($error_reg)){
                    echo <<<ERROR_REG
                    <div  class="alarm" style="margin:60px 0 60px 0; display:block;">
                        <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <!-- <tr class="greenAlarm"><td><p>Operation was completed successfully ...</p></td></tr> -->
                            <tr class="redAlarm"><td><p> ERROR &raquo; It has been an error occurred ... Please recheck.</p></td></tr>
                        </table>
                    </div>
ERROR_REG;
                }
                ?>

                <img class="closeme" src="template/frontend/media/image/close.png" style="float:right; margin:0 -10px -19px 0; cursor:pointer;" />

                <!--Dati cliente-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="2"><br /><p style="text-align:center;">ACCOUNT DETAILS</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">NAME</label><input class="required" name="nome" id="nome" type="text" placeholder="your name" value="<?php echo htmlspecialchars($nuovo_utente['nome']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">SURNAME</label><input class="required" name="cognome" id="cognome" type="text" placeholder="your surname" value="<?php echo htmlspecialchars($nuovo_utente['cognome']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">PHONE</label><input name="telefono" id="telefono" type="text" placeholder="your phone" value="<?php echo htmlspecialchars($nuovo_utente['telefono']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">EMAIL</label><input class="required" name="email" id="email" type="email" placeholder="your@email.com" value="<?php echo htmlspecialchars($nuovo_utente['email']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">PASSWORD</label><input class="required" name="password" id="password" type="password" placeholder="yourpassword1" value="" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">REPEAT PASS</label><input class="required" name="password2" id="password2" type="password" placeholder="yourpassword2" value="" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td style="width:50% !important;">
                            <div><input name="state" id="state" class="required" type="text" placeholder="Your state" value="<?php echo htmlspecialchars($nuovo_utente['state']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                        <td style="width:50% !important;">
                            <div><input name="country" id="country" class="required" type="text" placeholder="Your country" value="<?php echo htmlspecialchars($nuovo_utente['country']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50% !important;">
                            <div><input name="city" id="city" class="required" type="text" placeholder="Your city" value="<?php echo htmlspecialchars($nuovo_utente['city']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                        <td style="width:50% !important;">
                            <div><input name="address" id="address" class="required" type="text" placeholder="Your address" value="<?php echo htmlspecialchars($nuovo_utente['address']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin:0px 0px 0px 0px !important; padding:0px 0px 0px 0px !important;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td colspan="5"><br /><h4><i>What wine are you?</i></h4><br /></td>
                                </tr>
                                <tr>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>RED</label><input class="questions" name="whatwine" type="radio" value="red" checked="checked"/>
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>WHITE</label><input class="questions" name="whatwine" type="radio" value="white"/>
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>BOOZE</label><input class="questions" name="whatwine" type="radio" value="booze"/>
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>SPARKLING</label><input class="questions" name="whatwine" type="radio" value="sparkling" />
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>BODIED</label><input class="questions" name="whatwine" type="radio" value="bodied"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"><br /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><br /><p style="text-align:center;">INVOICE DETAILS <i>(not request)</i></p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tbody class="requiredif_group">
                        <tr>
                            <td colspan="2">
                                <div><label class="inputlabel">AGENCY</label><input class="requiredif" name="agency_name" id="agency_name" type="text" placeholder="Name of the agency" value="<?php echo htmlspecialchars($nuovo_utente['agency_name']); ?>" /></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div><label class="inputlabel">ANDRESS</label><input class="requiredif" name="agency_address" id="agency_address" type="text" placeholder="andress of the agency" value="<?php echo htmlspecialchars($nuovo_utente['agency_address']); ?>" /></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div><label class="inputlabel">CODE</label><input class="requiredif" name="agency_code" id="agency_code" type="text" placeholder="code of the agency" value="<?php echo htmlspecialchars($nuovo_utente['agency_code']); ?>" /></div>
                            </td>
                        </tr>
                    </tbody>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin:0px 0px 0px 0px !important; padding:0px 0px 0px 0px !important;">
                            <table style="width:100%">
                                <tr>
                                    <td style="width:80% !important;">
                                        <div class="form-condizioni">
                                            <a href="condizioni.php">SEE CONDITIONS & PRIVACY</a>
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div id="pr" class="wrap_checkbox">
                                            <label>I'M AGREE</label><input id="policy" name="policy" type="checkbox" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input name="registra" id="registra" type="submit" value="R E G I S T E R  M E !" onclick="javascript: return validate('user_registration');" /></div></td>
                    </tr>
                </table>

            </form>

            <br /><br />
        </div>

    </div>

</div>