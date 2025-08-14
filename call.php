<?php
$page = "Call";
if (isset($_REQUEST['ip'])) {
    $ip_no = substr(strrchr($_REQUEST['ip'], '.'), 1) . "-";
} else {
    $ip_no = "";
}
include('includes/header.php');
?>
<div class="container text-center">
<?php
// http://192.168.1.2/default/en_US/tools.html?type=dial
if (isset($_REQUEST['ip'])) {
    $ip = $_REQUEST['ip'];
    ?>

        <hr>
        <div class="text-center">
            <a type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="index.php"><i class="fa-solid fa-house"></i></a>
            <a type="button" class="btn btn-secondary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="<?php echo $localhost; ?>index.php?ip=<?php echo $ip; ?>"><i class="fa-solid fa-reply"></i></a>
            <a type="button" class="btn btn-secondary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" target="_blank" href="http://<?php echo $ip; ?>/default/en_US/status.html"><i class="fa-solid fa-server"></i></a>
            <a type="button" class="btn btn-secondary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="<?php echo $localhost; ?>call.php?ip=<?php echo $ip; ?>"><i class="fa-solid fa-arrow-rotate-left"></i> Default Values</a>
            <!-- <a type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="<?php echo $localhost; ?>call.php">Change Target IP</a> -->
            <!-- <a type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init data-mdb-ripple-color="dark" href="http://<?php echo $ip; ?>/default/en_US/reboot.html" target="_blank">Re-Boot</a> -->
        </div>
        <hr>

        <?php
        $no = range(1, 8);
        if (isset($_REQUEST['telnos'])) {
            $full_telno = $telno = explode(',', $_REQUEST['telnos']);
        } else {
            $full_telno = $telno = array("0777678678", "0777679679", "0777123456", "0777676576", "0777999777", "0777997799", "0777678680", "0777887887");
            //$full_telno = $telno = array("555");

        }
        if (isset($_REQUEST['d1'])) {
            $d1 = $_REQUEST['d1'];
        } else {
            $d1 = 15;
        }
        if (isset($_REQUEST['d2'])) {
            $d2 = $_REQUEST['d2'];
        } else {
            $d2 = 59;
        }
        $duration = range($d1, $d2);
        foreach ($no as $d) {
            $tkey = array_rand($telno);

            echo '<div class="row justify-content-md-center mt-3">
                <div class="col-6">
                <form class="row g-3" action="http://' . $ip . '/default/en_US/tools.html?type=dial" method="post" target="123">
        <input type="hidden" name="dialkey" value="64694a61" />
        <input type="hidden" name="action" value="dial" id="" />
        <input type="hidden" name="dial" id="" value="Dial" />
        <input type="hidden" name="line" value="' . $d . '" />
        <div class="col-auto"><div style="width:38px; line-height: 46px;">0' . $d . '</div></div>
        <div class="col-auto"><input type="text" class="form-control form-control-lg" placeholder="Dail Number" name="telnum" id="l' . $d . 'no" value="' . $telno[$tkey] . '" /></div>
        <div class="col-auto"><input type="text" class="form-control form-control-lg" placeholder="Call Duration" name="duration" id="l' . $d . 'dr" value="' . $duration[array_rand($duration)] . '" /></div>
        <div class="col-auto"><button id="submitButton' . $d . '" type="submit" value="Call" name="ok" class="btn btn-success btn-lg dial" ><i class="fa-solid fa-phone"></i></button></div>
        <div class="col-auto"><a class="btn btn-lg btn-light" style="display:none;" target="_blank" href="http://' . $ip . '/default/en_US/status.html">Check Now</a></div>
        </form>
        </div>
        </div>';
            //  if (!isset($_REQUEST['telnos'])) {
            unset($telno[$tkey]);
            $telno = array_values($telno);
            if (!$telno) {
                $telno = $full_telno;
            }
            //  }
        }
        ?>
        <iframe style="display: none;"  src="" name="123" frameborder="0"></iframe>
        <!-- <button type="button" id="all">Dial All</button> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function () {
                $('button[type="submit"]').click(function () {
                    // $(this).parent('div').siblings('div').children('a').show();
                    $(this).html('<i class="fa-solid fa-tty"></i>');
                    $(this).removeClass('btn-warning');
                    $(this).addClass('btn-danger');
                    // $(this).prop('disabled', true);
                });
            });
        </script>
        <hr>
        <div class="row justify-content-md-center">
            <div class="col-12">
            <h1><span class="badge badge-success"><i class="fa-solid fa-satellite-dish"></i></span>&nbsp;<span class="badge badge-primary"><i class="fa-solid fa-server"></i> <?php echo $ip; ?></span></h1>
            <iframe scrolling="no" style="width: 1226px; height: 500px;" src="http://<?php echo $ip; ?>/default/en_US/status.html?type=list" frameborder="0"></iframe>
            </div>
            </div>
        <hr>
        <form action="" method="get">
            <input type="hidden" name="ip" value="<?php echo $ip; ?>">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">List of Generating Numbers / seperated by coma (,)</label>
                <textarea name='telnos' class="form-control text-center" id="exampleFormControlTextarea1" rows="3"><?php echo implode(',', $full_telno); ?></textarea>
            </div>
            <div class="row justify-content-md-center mt-3">
                <div class="col-auto">
                    <div class="mb-3 row g-3">
                        <label for="exampleFormControlTextarea2" class="form-label">Duration Range</label>
                        <div class="col-6"><input type="number" class="form-control form-control-lg" name="d1" id="d1" value="<?php echo $d1; ?>" /></div>
                        <div class="col-6"><input type="number" class="form-control form-control-lg" name="d2" id="d2" value="<?php echo $d2; ?>" /></div>
                    </div>
                </div>
            </div>


            <button type="submit" value='Add all these numbers and generate' class="btn btn-lg btn-danger" ><i class="fa-solid fa-upload"></i> Add to re-generate</button>
            <a href="<?php echo $localhost; ?>call.php?ip=<?php echo $ip; ?>&telnos=555&d1=15&d2=59" class="btn btn-lg btn-danger">Dial all 555</a>
        </form>
<?php } else { ?>
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
</div>
<hr>
</body>
</html>