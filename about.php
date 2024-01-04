<?php

    session_start();

    if ( $_SESSION['role'] !== 'user' ) {
        header("Location: index");
    }

    // Header
    include 'layouts/header.php';

    // Sidebar
    include 'layouts/sidebar.php';

?>

<?php

    // Footer
    include 'layouts/footer.php';

?>