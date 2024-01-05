  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php if ( $_SESSION['role'] === 'admin' ) : ?>
      <div class="sidebar-nav" id="sidebar-nav">
        <a href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
        <a href="account-list">
          <i class="bi bi-people-fill"></i>
          <span>Daftar Akun</span>
        </a>
        <a href="task-list">
          <i class="bi bi-list-task"></i>
          <span>Daftar Tugas</span>
        </a>
        <a href="category-list">
          <i class="bi bi-tags-fill"></i>
          <span>Daftar Kategori</span>
        </a>
        <a href="about">
          <i class="bi bi-question-octagon-fill"></i>
          <span>Tentang</span>
        </a>
      </div>
    <?php else : ?>
      <div class="sidebar-nav" id="sidebar-nav">
        <a href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
        <a href="task-list">
          <i class="bi bi-list-task"></i>
          <span>Daftar Tugas</span>
        </a>
        <a href="category-list">
          <i class="bi bi-tags-fill"></i>
          <span>Daftar Kategori</span>
        </a>
        <a href="about">
          <i class="bi bi-question-octagon-fill"></i>
          <span>Tentang</span>
        </a>
      </div>
    <?php endif; ?>

  </aside><!-- End Sidebar-->