


<!--content-->
<div id="content" class="block-full">
    <div class="bkg-1"><br /></div>
</div>


<div class="block-full bkg-2">
    
    <div class="wrap">

        <br /><br /><br />
        
        <div class="cart">
            
            <div style="text-align:center">
                <h1>Retrieve your password !</h1>
            </div>
            
        </div>
        
        
        <form id="user_login" action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST">
            <?php show_errors($error); ?>
            
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
                    
                    
                    if($mail_inviata){
                        echo <<<ALARM
                            <div  class="alarm" style="margin:60px 0 60px 0; display:block;">
                                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr class="greenAlarm"><td><p>Operation was completed successfully ...</p></td></tr> 
                                </table>
                            </div>
ALARM;
                    }
                    
                ?>
            
            <p>
                Insert your registration email
            </p>
            
            <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><div><label class="inputlabel">EMAIL</label><input type="text" name="email" id="email" placeholder="your email" value=""/></div></td>
                </tr>
                <tr>
                    <td><div><input name="retrieve" id="retrieve" type="submit" value="S E N D   M E" /></div></td>
                </tr>
            </table>
            
        </form>
        
        
    </div>
    
</div>