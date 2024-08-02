

<!--content-->
<div id="content" class="block-full">
    <div class="bkg-1"><br /></div>
</div>

<div class="block-full bkg-2">
    <div class="wrap">

        <br /><br /><br />

        <div class="cart">

            <h3>USER PROFILE</h3>
            <h4>Your data for your shipping</h4>

            <hr />

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
                    
                    if($salvataggio_completato){
                        echo <<<ALARM
                            <div  class="alarm" style="margin:60px 0 60px 0; display:block;">
                                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr class="greenAlarm"><td><p>Operation was completed successfully ...</p></td></tr> 
                                </table>
                            </div>
ALARM;
                    }
                    
                ?>
            
            <form id="user_data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <?php show_errors($error); ?>
                <!--Dati cliente-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="2"><br /><p style="text-align:center;">YOUR DETAILS</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">NAME</label><input name="nome" id="nome" type="text" value="<?php echo htmlspecialchars($utente['nome']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">SURNAME</label><input name="cognome" id="cognome" type="text" value="<?php echo htmlspecialchars($utente['cognome']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">PHONE</label><input name="telefono" id="telefono" type="text" value="<?php echo htmlspecialchars($utente['telefono']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><label class="inputlabel">EMAIL</label><input name="email" id="email" type="email" value="<?php echo htmlspecialchars($utente['email']); ?>" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td style="width:50% !important;">
                            <div><input name="state" id="state" type="text" value="<?php echo htmlspecialchars($utente['state']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                        <td style="width:50% !important;">
                            <div><input name="country" id="country" type="text" value="<?php echo htmlspecialchars($utente['country']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50% !important;">
                            <div><input name="city" id="city" type="text" value="<?php echo htmlspecialchars($utente['city']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                        <td style="width:50% !important;">
                            <div><input name="address" id="address" type="text" value="<?php echo htmlspecialchars($utente['address']); ?>" style="padding-left:10px !important" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <!--
                    <tr>
                        <td colspan="2" style="margin:0px 0px 0px 0px !important; padding:0px 0px 0px 0px !important;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td colspan="5"><br /><h4><i>What wine are you?</i></h4><br /></td>
                                </tr>
                                <tr>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>RED</label><input class="questions" name="questions" type="radio" />
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>WHITE</label><input class="questions" name="questions" type="radio" />
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>BOOZE</label><input class="questions" name="questions" type="radio" />
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>SPARKLING</label><input class="questions" name="questions" type="radio" />
                                        </div>
                                    </td>
                                    <td style="width:20% !important;">
                                        <div class="wrap_radio">
                                            <label>BODIED</label><input class="questions" name="questions" type="radio" />
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
                    -->
                    <tr>
                        <td colspan="2"><div><input id="save_details" name="save_details" type="submit" value="S A V E" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input type="reset" value="R E S E T" /></div></td>
                    </tr>
                </table>

            </form>

            <br /><br /><br />

            <form id="user_invoice" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="2"><br /><p style="text-align:center;">INVOICE DETAILS</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div><label class="inputlabel">AGENCY</label><input name="agency_name" id="agency_name" type="text" placeholder="Name of the agency" value="<?php echo htmlspecialchars($utente['agency_name']); ?>" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div><label class="inputlabel">ADDRESS</label><input name="agency_address" id="agency_address" type="text" placeholder="andress of the agency" value="<?php echo htmlspecialchars($utente['agency_address']); ?>" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div><label class="inputlabel">CODE</label><input name="agency_code" id="agency_code" type="text" placeholder="code of the agency" value="<?php echo htmlspecialchars($utente['agency_code']); ?>" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input id="save_invoice" name="save_invoice" type="submit" value="S A V E" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input type="reset" value="R E S E T" /></div></td>
                    </tr>
                </table>

                <br /><br /><br />

            </form>

            <form id="password_change" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <!--user e password-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">            
                    <tr>
                        <td colspan="2"><br /><p style="text-align:center;">YOUR ACCOUNT</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div><label class="inputlabel">New Password</label><input name="password" id="password" type="password" placeholder="New Password" value="" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div><label class="inputlabel">REPEAT PASS</label><input name="password2" id="password2" type="password" placeholder="Retype New Password" value="" /></div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input id="save_password" name="save_password" type="submit" value="S A V E" /></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div><input type="reset" value="R E S E T" /></div></td>
                    </tr>
                </table>

            </form>

            <br /><br />

        </div>

    </div>
</div>
