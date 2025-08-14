<?php
$page = "Home";
$ip_no = "*";
include('includes/header.php');

?>
<div class="text-center">
    <?php if (isset($_REQUEST['ip'])) {
        $ip = $_REQUEST['ip']; ?>

        <div class="row justify-content-md-center">
            <div class="col-12">
                <h1 class="mt-4">
                    <span class="badge badge-success"><i class="fa-solid fa-satellite-dish"></i></span>
                    <span class="badge badge-primary"><i class="fa-solid fa-server"></i> <?php echo $ip; ?></span>
                </h1>
                <hr>
                <iframe name="123" scrolling="no" style="width: 1226px; height: 600px;"
                    src="http://<?php echo $ip; ?>/default/en_US/status.html?type=list" frameborder="0"></iframe>
            </div>
        </div>
        <hr>
        <a type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark"
            href="index.php"><i class="fa-solid fa-house"></i></a>
        <a type="button" class="btn btn-secondary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark"
            href="call.php?ip=<?php echo $ip; ?>"><i class="fa-solid fa-phone"></i></a>
        <a type="button" class="btn btn-secondary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark"
            href="ussd.php?ip=<?php echo $ip; ?>"><i class="fa-solid fa-hashtag"></i></a>
        <a type="button" class="btn btn-secondary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" target="_blank"
            href="http://<?php echo $ip; ?>/"><i class="fa-solid fa-server"></i></a>
        <!-- <a type="button" class="btn btn-danger btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="http://<?php echo $ip; ?>/default/en_US/reboot.html">Re-Boot</a> -->
        <hr>
        <form target="123" class="form-inline" method="post" action="http://<?php echo $ip; ?>/default/en_US/reboot.html">
            <button type="submit" class="btn btn-danger btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark"><i
                    class="fa-solid fa-arrow-rotate-left"></i></button>
        </form>
        <hr>
    <?php } else {

        $ips = array();
        $r = range(100, 103);

        foreach ($r as $rr) {
            $ips[] = '192.168.1.' . $rr;
        }
        ?>
        <div class="position-absolute top-50 start-50 translate-middle">

            <?php foreach ($ips as $ip) { ?>
                <hr>
                <form class="row g-3 justify-content-md-center" action="" method="get">
                    <div class="col-auto"><input required class="form-control form-control-lg" type="text" name="ip"
                            value="<?php echo $ip; ?>" /></div>
                    <?php if (availableUrl($ip)) {
                        echo '<div class="col-auto">
                    <button type="submit" class="btn btn-success btn-lg" value="Start"><i class="fa-solid fa-power-off"></i></button>
                    <a type="button" target="_blank" class="btn btn-danger btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="http://' . $ip . '/default/en_US/reboot.html"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                    </div>';
                    } else {
                        echo '<div class="col-auto"><button type="button" disabled class="btn btn-dark btn-lg" value="Start"><i class="fa-solid fa-link-slash"></i></button></div>';
                    } ?>

                </form>

            <?php } ?>
            <hr>
            <a type="button" target="_blank" class="btn btn-info btn-lg btn-block" data-mdb-ripple-init
                data-mdb-ripple-color="dark" href="dashboard.php"><i class="fa-solid fa-table-columns"></i></a>

        </div>
    <?php } ?>

    <!-- </div>
    </div> -->
</div>
</body>

</html>