<div class="row mt-5">
    <div class="col-lg-4 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-chart text-warning fz-21px "></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <?php
                            $sql = "SELECT COUNT(id) as SLNews FROM Donhang where trangthai=0";
                            $count = mysqli_query($conn, $sql);
                            $rowCount = mysqli_fetch_array($count);
                        ?>
                        <div class="numbers">
                            <p class="card-category">Đơn hàng cần duyệt</p>
                            <h4 class="card-title"><?= $rowCount['SLNews']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-light-3 text-success"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <?php
                            $sql = "SELECT COUNT(id) as SLNotify FROM  Donhang where trangthai=1";
                            $count = mysqli_query($conn, $sql);
                            $rowCount = mysqli_fetch_array($count);
                        ?>
                        <div class="numbers">
                            <p class="card-category">Đơn hàng chưa hoàn thành</p>
                            <h4 class="card-title"><?= $rowCount['SLNotify']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-calendar-o"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-favourite-28 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <?php
                            $sqlUser = "SELECT COUNT(*) as SL FROM Donhang";
                            $countUser = mysqli_query($conn, $sqlUser);
                            $rowCount = mysqli_fetch_array($countUser);
                        ?>
                        <div class="numbers">
                            <p class="card-category">Đơn hàng trong tháng</p>
                            <h4 class="card-title"><?= $rowCount['SL']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i>
                </div>
            </div>
        </div>
    </div>
</div>
