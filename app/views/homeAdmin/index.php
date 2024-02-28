<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
      .info-cards {
        display: flex;
        justify-content: space-around;
        margin-top: 40px;
      }

    .info-card {
        text-align: center;
        padding: 20px;
        border-radius: 8px;
        background-color: #adb5bd;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .info-card:hover {
        transform: translateY(-5px);
    }

    .info-card i {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .info-card h3 {
        font-size: 28px;
        margin-bottom: 5px;
    }

    .info-card p {
        font-size: 16px;
        color: #888;
    }

    .jumbotron {
        background-image: url('path-to-your-image.jpg');
        background-size: cover;
        color: #fff;
        text-align: center;
        padding: 100px 20px;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .center-text {
    text-align: center;
  }

/* Tambahkan CSS berikut */
.info-block {
  padding: 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease-in-out;
}


.detail-content {
  padding: 20px;
  border-radius: 8px;
  display: none;
}

.info-card:hover .detail-content {
  display: block;
}

.info-card {
    /* ... (properti lain) */
    background-color: #fff; /* Mengubah latar belakang menjadi putih */
    /* ... (properti lain) */
}

/* Tambahkan CSS berikut */
.green-block {
  background-color: #a7ebc5; /* Ubah ke warna hijau pastel yang diinginkan */
  padding: 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease-in-out;
}

.icon {
  margin-right: 15px;
}


/* Tambahkan CSS berikut */
.orange-light-block {
  background-color: #ffc04c; /* Ubah ke warna orange muda yang diinginkan */
  padding: 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease-in-out;
}

/* Tambahkan CSS berikut */
.blue-pastel-block {
  background-color: #a4c4e3; /* Ganti dengan warna biru pastel yang diinginkan */
  padding: 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease-in-out;
}

/* Tambahkan CSS berikut */
.light-blue-block {
  background-color: #a4c4e3; /* Ganti dengan warna biru muda yang diinginkan */
  padding: 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease-in-out;
}



  </style>

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col">
      <h3 class="mt-5 mb-5 center-text">SELAMAT DATANG, ADMIN</h3>
      <hr class="ml-5 mr-5">
    </div>
  </div>

    <!-- Info Cards -->
    <div class="row justify-content-around mt-4">
      <!-- Card 1 -->
      <div class="col-md-3 mb-4">
  <div class="info-card ">
    <div class="info-block blue-pastel-block">
      <div class="icon-text">
        <div class="icon">
          <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
        </div>
        <div class="text">
          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
            JUMLAH BARANG
          </div>
          <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah_barang'][0]['total']?></div>
        </div>
      </div>
    </div>
    <!-- Detail -->
    <div class="detail-content">
      <!-- Detail Content Here -->
      <a href="<?= BASEURL; ?>/dataitem" class="text-primary detail-link">Klik Lebih Lanjut</a>
    </div>
  </div>
</div>





<!-- Card 2 -->
<div class="col-md-3 mb-4">
  <div class="info-card">
    <div class="info-block green-block">
      <div class="icon-text">
        <div class="icon">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
        <div class="text">
          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
            DATA PEMINJAMAN
          </div>
          <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah_peminjaman'][0]['total']?></div>
        </div>
      </div>
    </div>
    <!-- Detail -->
    <div class="detail-content">
      <!-- Detail Content Here -->
      <a href="<?= BASEURL; ?>/dataPeminjaman" class="text-primary detail-link">Klik Lebih Lanjut</a>
    </div>
  </div>
</div>


      <!-- Card 3 -->
 <!-- Card 3 -->
<div class="col-md-3 mb-4">
  <div class="info-card">
    <div class="info-block orange-light-block">
      <div class="icon-text">
        <div class="icon">
          <i class="fas fa-user fa-2x text-gray-300"></i>
        </div>
        <div class="text">
          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
            JUMLAH USER
          </div>
          <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah_anggota'][0]['total']?></div>
        </div>
      </div>
    </div>
    <!-- Detail -->
    <div class="detail-content">
      <!-- Detail Content Here -->
      <a href="<?= BASEURL; ?>/akun" class="text-primary detail-link">Klik Lebih Lanjut</a>
    </div>
  </div>
</div>


      <!-- Card 4 -->
      <div class="col-md-3 mb-4">
  <div class="info-card">
    <div class="info-block light-blue-block">
      <div class="icon-text">
        <div class="icon">
          <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
          <!-- Ganti kelas ikon di atas dengan ikon orang yang diinginkan -->
        </div>
        <div class="text">
          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
            JUMLAH MAINTAINER
          </div>
          <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah_maintainer'][0]['total']?></div>
        </div>
      </div>
    </div>
    <!-- Detail -->
    <div class="detail-content">
      <!-- Detail Content Here -->
      <a href="<?= BASEURL; ?>/maintainer" class="text-primary detail-link">Klik Lebih Lanjut</a>

    </div>
  </div>
</div>




  <!-- Optional: Load Font Awesome -->
  <!-- <script
</html>
