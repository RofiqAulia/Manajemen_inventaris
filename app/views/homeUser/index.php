<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/styleUser.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <div class="jumbotron">
    <!-- ... Konten Jumbotron ... -->
    <h1>Selamat Datang di Situs Kami!</h1>
    <p>Ini adalah Admin.</p>
  </div>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <!-- <h3 class="mt-5 mb-5 center-text">SELAMAT DATANG, User</h3>
        <hr class="ml-5 mr-5"> -->
      </div>
    </div>
    <div class="row justify-content-around mt-4">
      <!-- Card 1 - JUMLAH BARANG -->
      <div class="col-md-3 mb-4">
        <div class="info-card">
          <div class="info-block blue-block">
            <div class="icon-text">
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <div class="text">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  JUMLAH BARANG
                </div>
                <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah_brgpeminjam'][0]['total']?></div>
              </div>
            </div>
          </div>


          <!-- Detail -->
          <div class="detail-content">
            <p>Informasi lebih lanjut tentang jumlah barang.</p>
            <a href="<?= BASEURL; ?>/ajukanPeminjaman" class="text-primary detail-link">Lihat Detail</a>
          </div>
        </div>
      </div>
      <!-- Card 2 - DATA PEMINJAMAN -->
      <div class="col-md-3 mb-4">
        <div class="info-card">
          <div class="info-block green-block">
            <div class="icon-text">
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <div class="text">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Jumlah Keseluruhan
                </div>
                <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah_brg'][0]['total']?></div>
              </div>
            </div>
          </div>
          <!-- Detail -->
          <div class="detail-content">
            <p>Informasi lebih lanjut tentang data peminjaman.</p>
            <a href="<?= BASEURL; ?>/ajukanPeminjaman" class="text-primary detail-link">Lihat Detail</a>
          </div>
        </div>
      </div>
      <!-- Card 3 - JUMLAH USER -->
      <div class="col-md-3 mb-4">
        <div class="info-card">
          <div class="info-block orange-block">
            <div class="icon-text">
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <div class="text">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  JUMLAH USER
                </div>
                <div class="h3 mb-0 font-weight-bold text-gray-800">80</div>
              </div>
            </div>
          </div>
          <!-- Detail -->
          <div class="detail-content">
            <p>Informasi lebih lanjut tentang jumlah user.</p>
            <a href="#" class="text-primary detail-link">Lihat Detail</a>
          </div>
        </div>
      </div>
      <!-- Card 4 - JUMLAH MAINTAINER -->
      <div class="col-md-3 mb-4">
        <div class="info-card">
          <div class="info-block blue-light-block">
            <div class="icon-text">
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <div class="text">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                  JUMLAH MAINTAINER
                </div>
                <div class="h3 mb-0 font-weight-bold text-gray-800">25</div>
              </div>
            </div>
          </div>
          <!-- Detail -->
          <div class="detail-content">
            <p>Informasi lebih lanjut tentang jumlah maintainer.</p>
            <a href="#" class="text-primary detail-link">Lihat Detail</a>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>
</html>
