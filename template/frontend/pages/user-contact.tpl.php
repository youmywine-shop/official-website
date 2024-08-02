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
                <h1>CONTACT</h1>
            </div>

            <hr />

            <form id="frm_contact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

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
                
<!--                <div class="alarm" style="margin:60px 0 60px 0; display:block;">
                    <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr class="greenAlarm"><td><p>Operation was completed successfully ...</p></td></tr>
                        <tr class="redAlarm"><td><p> ERROR &raquo; It has been an error occurred ... Please recheck.</p></td></tr>
                    </table>
                </div>-->
                
                <?php show_errors($error); ?>
                <!--Dati cliente-->
                <table class="baloon" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><div><label class="inputlabel">NAME</label><input name="nome" id="nome" class="required" type="text" placeholder="" value="" /></div></td>
                    </tr>
                    <tr>
                        <td><div><label class="inputlabel">EMAIL</label><input name="email" id="email" class="required" type="text" placeholder="" value="" /></div></td>
                    </tr>
                    <tr>
                        <td><hr/></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea maxlenght="300" name="testo" id="testo" class="required" placeholder="Your request (max 300 character)"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><hr/></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="form-condizioni" style="float:left; width: 80%;">
                                <a href="condizioni.php">SEE CONDITIONS & PRIVACY</a>
                            </div>
                            <div id="pr" class="wrap_checkbox" style="float:right; width: 20%; margin: 0px;">
                                <label>I AGREE</label><input id="policy" name="policy" type="checkbox" />
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><hr/></td>
                    </tr>
                    <tr>
                        <td>
                            <div><input name="send" id="send" type="submit" value="S E N D" onclick="javascript: return validate('frm_contact');" /></div>
                        </td>
                    </tr>
                </table>

            </form>


            <br /><br />
        </div>

    </div>

</div>

