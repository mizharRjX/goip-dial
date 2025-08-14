<?php
$page = "Dashboard";
$ip_no = "*";
include('includes/header.php');

?>
<div class="text-center">

    <div class="row">
        <a type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark"
            href="index.php"><i class="fa-solid fa-house"></i></a>
        <hr>
        <?php
        $ips = array();
        $r = range(100, 103);

        foreach ($r as $rr) {
            $ips[$rr] = '192.168.1.' . $rr;
        }
        ?>


        <?php foreach ($ips as $k => $ip) { ?>

            <?php if (availableUrl($ip)) { ?>
                <div class="col-12">
                    <h1 class="mt-4">
                        <span class="badge badge-success"><i class="fa-solid fa-satellite-dish"></i></span>
                        <span class="badge badge-primary"><i class="fa-solid fa-server"></i> <?php echo $ip; ?></span>
                        <a href="<?php echo $localhost; ?>/index.php?ip=<?php echo $ip; ?>" class="badge badge-success"><i
                                class="fa-solid fa-power-off"></i></a>
                    </h1>
                    <hr>
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <iframe name="calls_<?php echo $k; ?>" scrolling="no" style="width: 1226px; height: 600px;"
                                src="http://<?php echo $ip; ?>/default/en_US/status.html?type=list" frameborder="0"></iframe>
                        </div>

                        <div class="col-2">
                            <form target="<?php echo $k; ?>" method="post"
                                action="http://<?php echo $ip; ?>/default/en_US/ussd_info.html?type=ussd">
                                <div class="row">
                                    <?php
                                    $no = range(1, 8);
                                    foreach ($no as $d) {
                                        echo '<input type="hidden" role="switch" value="1" name="line' . $d . '" id="line-' . $d . '" checked>';
                                    }
                                    ?>
                                </div>

                                <input type="hidden" name="smskey" value="6468e50f" />
                                <input type="hidden" name="action" value="USSD" />
                                <input type="hidden" name="send" value="Send" />
                                <input type="submit" name="telnum" value="*550*1#" class="dial btn btn-lg btn-success">
                            </form>
                        </div>

                        <div class="col-4">
                            <iframe name="<?php echo $k; ?>" scrolling="no" style="width: 1000px; height: 600px;"
                                src="http://<?php echo $ip; ?>/default/en_US/ussd_info.html?type=ussd" frameborder="0"></iframe>
                        </div>
                    </div>


                    <hr>
                    <hr>
                </div>



            <?php }
        } ?>






    </div>

</div>
</body>

</html>