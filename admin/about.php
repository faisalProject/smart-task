<?php

    session_start();

    if ( $_SESSION['role'] !== 'admin' ) {
        header("Location: ../index");
    }

    // Header
    include '../layouts/header.php';

    // Sidebar
    include '../layouts/sidebar.php';

?>

    <main id="main" class="main">
        <div class="card about-contents" style="min-height: 100px;">
            <div class="logo">
                <img src="../assets/img/logo.png" alt="logo">
                <span class="d-lg-block">SmartTask</span>
            </div>
            <p><span>SmartTask</span> merupakan sebuah aplikasi manajemen tugas yang dirancang untuk membantu pengguna mengoptimalkan produktivitas mereka. Dengan antarmuka yang intuitif, aplikasi ini menyediakan berbagai fitur yang dapat disesuaikan untuk memenuhi kebutuhan individu atau tim kerja.

            Salah satu fitur utama dari SmartTask adalah kemampuannya untuk membantu pengguna mengatur tugas-tugas mereka secara efisien. Pengguna dapat dengan mudah membuat daftar tugas, menetapkan tenggat waktu, dan mengelompokkan tugas berdasarkan kategori atau proyek. Fitur pengingat dan notifikasi juga dapat diaktifkan, membantu pengguna agar tidak melewatkan batas waktu atau tugas yang penting.</p>

            <p><span>Aplikasi</span> ini tidak hanya membantu dalam perencanaan, tetapi juga memberikan kemampuan untuk melacak kemajuan tugas. Pengguna dapat dengan cepat melihat status tugas mereka, menandai tugas yang sudah selesai, dan mendapatkan gambaran keseluruhan mengenai proyek atau pekerjaan yang sedang berlangsung.

            SmartTask juga menawarkan kemudahan kolaborasi, memungkinkan pengguna untuk berbagi tugas atau proyek dengan anggota tim. Ini mempermudah koordinasi dan komunikasi antar anggota tim, memastikan bahwa semua orang memiliki visibilitas yang sama terhadap tugas-tugas yang perlu diselesaikan.</p>

            <p><span>Selain</span> itu, aplikasi ini menawarkan kemungkinan untuk menyesuaikan berbagai aspek, seperti label, warna, dan prioritas tugas, sesuai dengan preferensi pengguna. Ini memungkinkan setiap pengguna untuk mengatur tampilan aplikasi sesuai dengan gaya atau metode kerja mereka sendiri.

            Dengan fokus pada antarmuka yang ramah pengguna dan fitur-fitur yang dapat disesuaikan, SmartTask bertujuan untuk memberikan pengalaman manajemen tugas yang nyaman dan efektif. Dengan demikian, pengguna dapat lebih mudah mengelola waktu dan pekerjaan mereka, meningkatkan produktivitas, dan mencapai tujuan mereka dengan lebih efisien.</p>
        </div>
    </main>

<?php

    // Footer
    include '../layouts/footer.php';

?>