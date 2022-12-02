<main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-head text-center py-5">
              Pelanggan
            </div>
            <div class="card-body py-5 text-center"><?php echo $pelanggan; ?></div>

          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-white h-100">
            <div class="card-head text-center py-5">
              Karyawan
            </div>
            <div class="card-body py-5 text-center"><?php echo $karyawan; ?></div>

          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-head text-center py-5">
              Laundry
            </div>
            <div class="card-body py-5 text-center"><?php echo $laundry; ?></div>

          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-white h-100">
            <div class="card-head text-center py-5">
              Total Pendapatan
            </div>
            <div class="card-body py-5 text-center"><?php echo $total_pendapatan; ?></div>

          </div>
        </div>

        
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <canvas class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <canvas class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>