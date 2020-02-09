<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= count($this->db->get('transaksi')->result()) ?></h3>
                    <p>Pesanan Baru</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= site_url('pesanan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php $sum = $this->db->get('laporan')->result();
                        $data = 0;
                        foreach ($sum as $row) {
                            $data += $row->jumlah;
                        }
                        echo $data;
                        ?></h3>
                    <p>Barang Terjual</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= site_url('laporan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= count($this->db->query("SELECT * FROM user WHERE status != 'admin' ")->result()) ?></h3>

                    <p>Member</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= site_url('pelanggan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= count($this->db->get('barang')->result()) ?></h3>

                    <p>Barang jualan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?= site_url('barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Sales
                </h3>

            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <?php
                    $data = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
                    $tahun = date('Y');

                    foreach ($data as $rows) :
                        $lop = $this->db->query("SELECT * FROM laporan WHERE year(tanggal)= $tahun AND month(tanggal)= $rows")->result();
                        $jumlah = 0;
                        foreach ($lop as $row) {
                            $jumlah += $row->jumlah;
                        } ?>
                        <input type="hidden" id="<?= $rows ?>" value="<?= $jumlah ?>">
                    <?php endforeach; ?>
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-gradient-info">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Sales Graph
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <div class="card-footer bg-transparent">
                <div class="row">
                    <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="text-white">Mail-Orders</div>
                    </div>
                    <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="text-white">Online</div>
                    </div>
                    <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="text-white">In-Store</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-5 connectedSortable">
        <div class="card bg-gradient-success">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                </h3>
                <div class="card-tools">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-bars"></i></button>
                        <div class="dropdown-menu float-right" role="menu">
                            <a href="#" class="dropdown-item">Add new event</a>
                            <a href="#" class="dropdown-item">Clear events</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body pt-0">
                <div id="calendar" style="width: 100%"></div>
            </div>
        </div>
        <div class="card bg-gradient-primary">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Visitors
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip" title="Date range">
                        <i class="far fa-calendar-alt"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="row">
                    <div class="col-4 text-center">
                        <div id="sparkline-1"></div>
                        <div class="text-white">Visitors</div>
                    </div>
                    <div class="col-4 text-center">
                        <div id="sparkline-2"></div>
                        <div class="text-white">Online</div>
                    </div>
                    <div class="col-4 text-center">
                        <div id="sparkline-3"></div>
                        <div class="text-white">Sales</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>