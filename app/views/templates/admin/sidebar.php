
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Halo, Admin</span>
    </a>
    <ul class="side-menu top">
        <li class="<?= $currentPage === 'home' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>/homeAdmin">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="<?= $currentPage === 'dataitem' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>/dataitem">
                <i class='bx bxs-shopping-bag'></i>
                <span class="text">Data Item</span>
            </a>
        </li>
        <!-- Peminjaman -->
        <li class="<?= $currentPage === 'dataPeminjaman' ? 'active' : ''; ?>">
          <a href="<?= BASEURL; ?>/dataPeminjaman">
            <i class="bx bxs-message-dots"></i>
            <span class="text">Peminjaman</span>
          </a>
        </li>
        <!-- Akun -->
        <li class="<?= $currentPage === 'akun' ? 'active' : ''; ?>">
          <a href="<?= BASEURL; ?>/akun">
            <i class="bx bxs-group"></i>
            <span class="text">Akun</span>
          </a>
        </li>
        <!-- Maintainer -->
        <li class="<?= $currentPage === 'maintainer' ? 'active' : ''; ?>">
          <a href="<?= BASEURL; ?>/maintainer">
            <i class="bx bxs-group"></i>
            <span class="text">Maintainer</span>
          </a>
        </li>
      </ul>
      <!-- History -->
      <ul class="side-menu">
        <li>
          <a href="<?= BASEURL; ?>/login" class="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>

