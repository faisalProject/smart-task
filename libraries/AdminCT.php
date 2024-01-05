<?php

    class AdminCT  
    {
        public function showAccountUser($conn)
        {
            $result = mysqli_query($conn, "SELECT COUNT(*) as users FROM users WHERE role = 'user'");

            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        public function showAccountAdmin($conn)
        {
            $result = mysqli_query($conn, "SELECT COUNT(*) as admin FROM users WHERE role = 'admin'");

            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        public function showTaskByFinished($conn) 
        {
            $result = mysqli_query($conn, "SELECT COUNT(*) as finished FROM task WHERE status = 'finished' AND status_deleted = 0");

            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        public function showTaskByUnfinished($conn)
        {
            $result = mysqli_query($conn, "SELECT COUNT(*) as unfinished FROM task WHERE status = 'unfinished' AND status_deleted = 0");

            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        public function showCategories($conn)
        {
            $result = mysqli_query($conn, "SELECT COUNT(*) as categories FROM categories WHERE status_deleted = 0");

            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        public function timeline($conn)
        {
            $result = mysqli_query($conn, "SELECT 
            t.id,
            t.user_id,
            t.name,
            FLOOR(TIMESTAMPDIFF(MINUTE, NOW(), t.deadlines) / 1440) AS days,
            FLOOR((TIMESTAMPDIFF(MINUTE, NOW(), t.deadlines) % 1440) / 60) AS hours,
            TIMESTAMPDIFF(MINUTE, NOW(), t.deadlines) % 60 AS minutes,
            c.name as cat_name
            FROM task t
            LEFT JOIN categories c on t.category_id = c.id WHERE t.deadlines IS NOT NULL AND t.status_deleted = 0 AND t.status = 'unfinished' ORDER BY t.deadlines ASC");

            $rows = array();
            while ( $row = mysqli_fetch_assoc($result) ) {
                $rows[] = $row;
            }

            return $rows;
        }

        public function listUserAccount($conn)
        {
            $result = mysqli_query($conn, "SELECT id, username as name, email, status_banned, role, created_date, updated_date FROM users WHERE role = 'user'");

            $rows = array();
            while ( $row = mysqli_fetch_assoc($result) ) {
                $rows[] = $row;
            }

            return $rows;
        }
    }

?>