<!--content-->
<div id="content" class="block-full">
    <div class="bkg-1"><br /></div>
</div>


<div class="block-full bkg-2">
    
    <div class="wrap">

        <br /><br /><br />
        
        <div class="cart">
            
            <div style="text-align:center">
                <h1>Change your password !</h1>
                <br /><br />
            </div>
            
        </div>
        
        
        <form id="user_login" action="<?php echo $_SERVER['PHP_SELF'] ?>?m=<?php echo $email; ?>&tk=<?php echo $token_ricevuto; ?>"  method="POST">
            
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
            
            <?php show_errors($error); ?>
            
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
                </table>
        
        </form>
        
        
    </div>
    
</div>