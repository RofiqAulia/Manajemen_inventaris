<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text" >Halo, User</span>
    </a>

      <!-- Halaman Dashboard -->
  <ul class="side-menu top">
    <li class="<?= $currentPage === 'homeUser' ? 'active' : ''; ?>">
    <a href="<?= BASEURL; ?>/homeUser">
      <i class="bx bxs-dashboard"></i>
      <span class="text">Dashboard</span>
    </a>
  </li>
  <!-- Ajukan Peminjaman  -->
    <li class="<?= $currentPage === 'ajukanPeminjaman' ? 'active' : ''; ?>">
      <a href="<?= BASEURL; ?>/ajukanPeminjaman">
        <i class="bx bxs-shopping-bag-alt"></i>
        <span class="text">Ajukan peminjaman</span>
        </a>
        </li>
        
      <br>
      <!-- History -->
        <li>
          <a href="<?= BASEURL; ?>/histori">
            <i class="bx bxs-cog"></i>
            <span class="text">History</span>
          </a>
        </li> 
        <!-- Download Histori -->
        <li>
          <a href="<?= BASEURL; ?>/downloadHistori" target="_blank">
            <i class="bx bxs-download"></i>
            <span class="text">Download Histori</span>
          </a>
        </li>
        <!-- Logout -->
        <li>
          <a href="<?= BASEURL; ?>/login" class="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- SIDEBAR -->

  </body>


