<?php

    class Task extends Database
    {
        public function __construct($hostname, $username, $password, $database)
        {
            parent::__construct($hostname, $username, $password, $database);
        }

        public function connect()
        {
            return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        }

        // Fungsi untuk menampilkan daftar tugas
        public function index($conn, $user_id) 
        {   
            $result = mysqli_query($conn, "SELECT t.id, t.name as name, t.priority, t.description, t.deadlines, t.updated_date, c.id as cat_id, c.name as desc_name FROM task t 
            left join categories c on t.category_id = c.id WHERE t.user_id = '$user_id' AND t.status_deleted = 0 ORDER BY t.updated_date DESC");

            $rows = array();
            while ( $row = mysqli_fetch_assoc($result) ) {
                $rows[] = $row;
            }

            return $rows;
        }

        // Fungsi menampilkan daftar tugas yang finished
        public function displayTaskByStatusFinished($conn, $user_id)
        {
            $result = mysqli_query($conn, "SELECT count(*) as finished FROM task where user_id = '$user_id' AND status_deleted = 0 AND status = 'finished'");

            $rows = array();
            while ( $row = mysqli_fetch_assoc($result) ) {
                $rows = $row;
            };

            return $rows;
        }

        // Fungsi menampilkan daftar tugas yang unfinished
        public function displayTaskByStatusUnfinished($conn, $user_id)
        {  
            $result = mysqli_query($conn, "SELECT count(*) as unfinished FROM task where user_id = '$user_id' AND status_deleted = 0 AND status = 'unfinished'");

            $rows = array();
            while ( $row = mysqli_fetch_assoc($result) ) {
                $rows = $row;
            };

            return $rows;
        }

        // Fungsi untuk tambah tugas
        public function store($data, $conn, $user_id)
        {
            // Variabel untuk menyimpan nilai
            $name = htmlspecialchars($data['name']);
            $description = htmlspecialchars($data['description']);
            $deadlines = $data['deadlines'];
            $priority = $data['priority'];
            $category_id = $data['category_id'];
            $created_date = date('Y-m-d H:i:s', time());
            $updated_date = $created_date;

            // Query untuk tambah tugas
            mysqli_query($conn, "INSERT INTO task (
                user_id,
                name,
                description,
                deadlines,
                status,
                priority,
                category_id,
                status_deleted,
                created_date,
                updated_date
            ) VALUES (
                '$user_id',
                '$name',
                '$description',
                '$deadlines',
                'unfinished',
                '$priority',
                '$category_id',
                0,
                '$created_date',
                '$updated_date'
            ) ");

            $isSuccess = mysqli_affected_rows($conn);

            // Kondisi jika berhasil
            if ( $isSuccess === 1 ) {
                $message = 'Tugas berhasil ditambahkan!';
                echo "<body onload='successTask()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }

        public function update($data, $conn, $user_id)
        {
            // Variabel untuk menampung nilai
            $id = $data['id'];
            $name = htmlspecialchars($data['name']);
            $description = htmlspecialchars($data['description']);
            $deadlines = htmlspecialchars($data['deadlines']);
            $priority = htmlspecialchars($data['priority']);
            $category_id = htmlspecialchars($data['category_id']);
            $updated_date = date('Y-m-d H:i:s', time());

            // Query edit tugas
            mysqli_query($conn, "UPDATE task SET
                user_id ='$user_id',
                name ='$name',
                description ='$description',
                deadlines ='$deadlines',
                priority ='$priority',
                category_id ='$category_id',
                updated_date ='$updated_date' WHERE id = '$id'"
            );

            // Kondisi jika sukses
            $isSuccess = mysqli_affected_rows($conn);

            if ( $isSuccess === 1 ) {
                $message = 'Tugas berhasil disunting!';
                echo "<body onload='successTask()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }

        public function destroy($conn, $id)  
        {
            mysqli_query($conn, "UPDATE task SET status_deleted = 1 WHERE id =  $id");

            $isSuccess = mysqli_affected_rows($conn);

            // Kondisi jika sukses
            if ( $isSuccess === 1 ) {
                $message = 'Tugas berhasil dihapus!';
                echo "<body onload='successTask()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }
    }

?>