<!DOCTYPE html>
<?php include "header.php";?><!--page-->
<!--video-->
<div class="container-video text-center">
    <img src="img/action_pic_1.jpg">
</div>
<?php
    echo $_GET['funding_id'];
?>
<!-- End of Video -->
<!-- content -->
<div class="container-fluid bg-pink text-center">
    <div class="row marginbottom">
        <p class="small-title">Funding</p>
        <h1 class="action-title">Shave my head</h1>
        <p>for <a class="link" href="#">Cancer research UK</a></p>
        <a href="actionForm.php" class="btn btn btn-primary btn-default btn-center">take an action</a>
    </div>
    <div style="clear:both;"></div>
    <div class="row marginbottom">
        <!--left-->
        <div class="col-sm-6">
            <p class="money">£ 3684 / 5000 <small class="text">funded</small></p>
        <div class="row">       
        <div class="col-sm-offset-1 col-sm-9 progress transparent-bar marginslight">
            <div class="progress-bar mintgreen bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"></div>
        </div>
        <div class="col-sm-2">
            <p class="text">90%</p>
        </div>
            </div>
            </div>
        
        <!--right-->
        <div class="col-sm-6">
                <p class="money">21 / 30 days <small class="text">left</small></p>
        <div class="row">       
        <div class="col-sm-offset-1 col-sm-9 progress transparent-bar marginslight">
            <div class="progress-bar lemonyellow bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"></div>
        </div>
        <div class="col-sm-2">
            <p class="text">79%</p>
        </div>
            </div>
            </div>
    </div>
    <div>
        <p class="content text-left description">
            Curabitur lobortis id lorem id bibendum. Ut id consectetur magna. Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at. Vestibulum nec erat ut mi sollicitudin porttitor id sit amet risus. Nam tempus vel odio vitae aliquam. In imperdiet eros id lacus vestibulum vestibulum. Suspendisse fermentum sem sagittis ante venenatis egestas quis vel justo. Maecenas semper suscipit nunc, sed aliquam sapien convallis eu. Nulla ut turpis in diam dapibus consequat.Curabitur lobortis id lorem id bibendum. Ut id consectetur magna. Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at.
        </p>
    </div>
</div>
<!-- End of Content -->
<!--Funding Group-->
<div class="container-fluid bg-pink text-left">
    <div class="col-sm-6">
        <div class="titles1">
            <p>Location</p>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="col-sm-6">
        <div class="titles2">
            <p>Action</p>
        </div>
        <div style="clear:both;"></div>
        <div class="row">
            <div class="col-sm-4">
                <img src="img/action_pic_1.jpg" class="img-responsive bar">
            </div>
            <div class="col-sm-8 bar">
                <p class="small-title2">Shave my hair</p>
                <p class="money2">£ 3684 / 5000 <small class="text2">funded</small></p>
                 <div class="row">       
                    <div class="col-sm-9 progress progress2 transparent-bar marginslight">
                    <div class="progress-bar mintgreen bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"></div>
                    </div>
                <div class="col-sm-3">
                    <p class="text2">79%</p>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="img/action_pic_1.jpg" class="img-responsive bar">
            </div>
            <div class="col-sm-8 bar">
                <p class="small-title2">Shave my hair</p>
                <p class="money2">£ 3684 / 5000 <small class="text2">funded</small></p>
                 <div class="row">       
                    <div class="col-sm-9 progress progress2 transparent-bar marginslight">
                    <div class="progress-bar mintgreen bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"></div>
                    </div>
                <div class="col-sm-3">
                    <p class="text2">79%</p>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="img/action_pic_1.jpg" class="img-responsive bar">
            </div>
            <div class="col-sm-8 bar">
                <p class="small-title2">Shave my hair</p>
                <p class="money2">£ 3684 / 5000 <small class="text2">funded</small></p>
                 <div class="row">       
                    <div class="col-sm-9 progress progress2 transparent-bar marginslight">
                    <div class="progress-bar mintgreen bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"></div>
                    </div>
                <div class="col-sm-3">
                    <p class="text2">79%</p>
                </div>
            </div>
            </div>
        </div>
</div>
</div>

<!-- End of Funding Group -->
<?php include "footer.php";?>
</body>
</html>