<?php
$page = "USSD";
if (isset($_REQUEST['ip'])) {
    $ip_no = substr(strrchr($_REQUEST['ip'], '.'), 1) . "-";
} else {
    $ip_no = "";
}
include('includes/header.php');
?>
<div class="container text-center">

    <?php
    // print_r($_REQUEST);
    // http://192.168.1.2/default/en_US/tools.html?type=dial
    if (isset($_REQUEST['ip'])) {
        $ip = $_REQUEST['ip'];
    ?>
        <hr>
        <div class="text-center">
        <a type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="index.php"><i class="fa-solid fa-house"></i></a>
            <a href="<?php echo $localhost; ?>index.php?ip=<?php echo $ip; ?>" class="btn btn-secondary btn-lg"><i class="fa-solid fa-reply"></i></a>
            <a class="btn btn-secondary btn-lg" target="_blank" href="http://<?php echo $ip; ?>/default/en_US/status.html"><i class="fa-solid fa-server"></i></a>
            <!-- <a href="<?php echo $localhost; ?>ussd.php" class="btn btn-primary btn-lg">Change Target IP</a> -->
            <a href="<?php echo $localhost; ?>ussd.php?ip=<?php echo $ip; ?>" class="btn btn-secondary btn-lg"><i class="fa-solid fa-arrow-rotate-left"></i> Reset Switches</a>
            <!-- <a href="http://<?php echo $ip; ?>/default/en_US/reboot.html" class="btn btn-primary btn-lg" target="_blank">Re-Boot</a> -->
        </div>
        <hr>
        <?php

        $no = range(1, 8);
        ?>
        <form target="123" method="post" action="http://<?php echo $ip; ?>/default/en_US/ussd_info.html?type=ussd">
            <div class="row">

                <?php
                foreach ($no as $d) {
                    echo '<div class="col"><div class="form-check form-switch">
                <input class="form-check-input lines" type="checkbox" role="switch" value="1" name="line' . $d . '" id="line-' . $d . '" checked>
                <label class="form-check-label" for="line-' . $d . '">Line ' . $d . '</label>
              </div></div>';
                }
                ?>
            </div>
            <hr>
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input selectall" value="1" type="checkbox" name="all" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        All Lines
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input 1to4" value="1" type="checkbox" name="1to4" id="1to4Checked">
                    <label class="form-check-label" for="1to4Checked">
                        1 to 4 Lines
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input 5to8" value="1" type="checkbox" name="5to8" id="5to8Checked">
                    <label class="form-check-label" for="5to8Checked">
                        5 to 8 Lines
                    </label>
                </div>
            </div>
            <hr>
            <input type="hidden" name="smskey" value="6468e50f" />
            <input type="hidden" name="action" value="USSD" />
            <input type="hidden" name="send" value="Send" />
            <input type="submit" name="telnum" value="*550*1#" class="dial btn btn-lg btn-success">
            <input type="submit" name="telnum" value="*550#" class="dial btn btn-lg btn-success">
            <input type="submit" name="telnum" value="*#456#" class="dial btn btn-lg btn-success">
            <input type="submit" name="telnum" value="#11#" class="dial btn btn-lg btn-success">
            <input type="submit" name="telnum" value="#132#" class="dial btn btn-lg btn-success">
            <input type="submit" name="telnum" value="*168#" class="dial btn btn-lg btn-success">
            <input type="submit" name="telnum" value="*344#" class="dial btn btn-lg btn-success">
            <!-- <?php // if (isset($_POST['generate'])) { 
                    ?> -->
            <!-- <input type="submit" name="telnum" value="<?php echo "*235*" . $_POST['amount'] . "*" . $_POST['phonenumber'] . "#"; ?>" class="dial btn btn-lg btn-primary"> -->
            <!-- <?php // } 
                    ?> -->
        </form>
        
        <hr>
        <div class="row justify-content-md-center">
            <div class="col-12">
            <h1><span class="badge badge-success"><i class="fa-solid fa-satellite-dish"></i></span>&nbsp;<span class="badge badge-primary"><i class="fa-solid fa-server"></i> <?php echo $ip; ?></span></h1>
            <iframe name="123" scrolling="no" style="width: 1226px; height: 600px;" src="http://<?php echo $ip; ?>/default/en_US/status.html?type=list" frameborder="0"></iframe>
            </div>
            </div>
        <hr>

        <?php // if (!isset($_POST['generate'])) { 
        ?>

        <!-- <div class="row justify-content-md-center mt-3">
                <div class="col-6">
                    <form class="row g-3" action="" method="post">



                        <div class="col-auto"><input class="form-control form-control-lg" type="text" placeholder="Number" name="phonenumber" value="" /></div>
                        <div class="col-auto"><input class="form-control form-control-lg" type="number" placeholder="Amount" name="amount" value="" /></div>
                        <div class="col-auto"><input type="submit" name="generate" value="Generate USSD!" class="dial btn btn-lg btn-primary"></div>


                    </form>
                </div>
            </div> -->
        <?php
        // }

        $no = range(1, 8);

        foreach($no as $d) {
            echo '<div class="row justify-content-md-center mt-3">
            <div class="col-8">
                <form class="row g-3 myForm">
                    <div class="col-auto">
                        <div style="width:100px; line-height: 46px;">LINE 0'.$d.': </div>
                    </div>
                    <input type="hidden" value="'.$d.'" name="line_no" />
                    <div class="col-auto"><input type="text" class="form-control form-control-lg" name="phone_number" placeholder="Receiver" /></div>
                    <div class="col-auto"><input type="number" class="form-control form-control-lg" name="amount" placeholder="amount" /></div>
                    <div class="col-auto"><button type="submit" value="Transfer" name="transfer" class="btn btn-warning btn-lg"><i class="fa-solid fa-comments-dollar"></i></button></div>
                    <div class="col-auto"><button type="button" value="Clear" name="clear" class="btn btn-danger btn-lg clear"><i class="fa-solid fa-broom"></i></buton></div>
                </form>
            </div>
        </div>';
        }
        ?>


        

        <script>
$(document).ready(function() {
    $('.clear').on('click', function(e){
        $(this).parent('div').siblings('div').children('input[name="phone_number"]').val("");
        $(this).parent('div').siblings('div').children('input[name="amount"]').val("");
    });
  $('.myForm').submit(function(event) {
    event.preventDefault();
    // const formData = $(this).serialize();
    // console.log(formData);
    var line_no = $("input[name='line_no']", this).val();
    var phone_no = $("input[name='phone_number']", this).val();
    var amount = $("input[name='amount']", this).val();

    //this.submit();
    var line_new = 'line' + line_no;

    var newData = {
        smskey: '6468e50f',
        action: 'USSD',
        send: 'Send',
        telnum: '*235*'+(amount-5)+'*'+phone_no+'#'
        };

    var newForm = $('<form>').attr({
            method: 'POST',
            action: 'http://<?php echo $ip; ?>/default/en_US/ussd_info.html?type=ussd',
            target: '123'
        });
        $.each(newData, function(name, value) {
            newForm.append($('<input>').attr({
                type: 'hidden',
                name: name,
                value: value
            }));
        });
        newForm.append($('<input>').attr({
                type: 'hidden',
                name: line_new,
                value: 1
            }));
        $('body').append(newForm);
        newForm.submit();
    

  });
});

</script>







    <?php } else {  ?>

        <div class="row">
            <div class="col">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <form class="row g-3" action="" method="get">
                        <div class="col-auto"><input class="form-control form-control-lg" type="text" name="ip" value="192.168.1.2" /></div>
                        <div class="col-auto"><input type="submit" class="btn btn-primary btn-lg" value="Fix IP Now" /></div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <hr>
</div>
</body>
<script>
    $('.1to4').click(function() {
        if ($(this).is(':checked')) {
            $('#line-1').attr('checked', true);
            $('#line-2').attr('checked', true);
            $('#line-3').attr('checked', true);
            $('#line-4').attr('checked', true);
            $('#line-5').attr('checked', false);
            $('#line-6').attr('checked', false);
            $('#line-7').attr('checked', false);
            $('#line-8').attr('checked', false);
        } else {
            $('#line-5').attr('checked', false);
            $('#line-6').attr('checked', false);
            $('#line-7').attr('checked', false);
            $('#line-8').attr('checked', false);
            $('#line-1').attr('checked', false);
            $('#line-2').attr('checked', false);
            $('#line-3').attr('checked', false);
            $('#line-4').attr('checked', false);
        }
    });

    $('.5to8').click(function() {
        if ($(this).is(':checked')) {
            $('#line-5').attr('checked', true);
            $('#line-6').attr('checked', true);
            $('#line-7').attr('checked', true);
            $('#line-8').attr('checked', true);
            $('#line-1').attr('checked', false);
            $('#line-2').attr('checked', false);
            $('#line-3').attr('checked', false);
            $('#line-4').attr('checked', false);
        } else {
            $('#line-1').attr('checked', false);
            $('#line-2').attr('checked', false);
            $('#line-3').attr('checked', false);
            $('#line-4').attr('checked', false);
            $('#line-5').attr('checked', false);
            $('#line-6').attr('checked', false);
            $('#line-7').attr('checked', false);
            $('#line-8').attr('checked', false);
        }
    });

    $('.lines').click(function() {
        $('.1to4').attr('checked', false);
        $('.5to8').attr('checked', false);
    });

    $('.selectall').click(function() {
        $('.1to4').attr('checked', false);
        $('.5to8').attr('checked', false);

        if ($(this).is(':checked')) {
            $('.form-check-input').attr('checked', true);
        } else {
            $('.form-check-input').attr('checked', false);
        }
    });
</script>

</html>