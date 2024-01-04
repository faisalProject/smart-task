<?php

    // Class child turunan dari class Database
    class Category extends Database
    {
        // Fungsi turunan dari kelas Databse, untuk menginisialisai database
        public function __construct($hostname, $username, $password, $database)
        {
            parent::__construct($hostname, $username, $password, $database);
        }

        // Fungsi untuk terhubung ke database
        public function connect() 
        {
            return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        }

        // Fungsi untuk menampilkan daftar kategori
        public function index($conn, $user_id) 
        {   
            $result = mysqli_query($conn, "SELECT * FROM categories WHERE user_id = '$user_id' AND status_deleted = 0 ORDER BY updated_date DESC");

            $rows = array();
            while ( $row = mysqli_fetch_assoc($result) ) {
                $rows[] = $row;
            }

            return $rows;
        }

        // Fungsi menampilkan jumlah daftar kategori
        public function displaysListOfCategories($conn, $user_id)
        {
            $result = mysqli_query($conn, "SELECT COUNT(*) as categories FROM categories WHERE user_id = '$user_id' AND status_deleted = 0");

            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        // Fungsi untuk tambah kategori
        public function store($data, $conn, $user_id) 
        {
            // Variabel untuk menampung nilai
            $name = htmlspecialchars($data['name']);
            $created_date = date('Y-m-d H:i:s', time());
            $updated_date = $created_date;

            if ( strlen($name) > 255 ) {
                $message = '<p><b>Nama terlalu panjang!</b></p>';
                echo "<body onload='errorCategory()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }

            // Query untuk tambah kategori
            mysqli_query($conn, "INSERT INTO categories (
                user_id,
                name,
                status_deleted,
                created_date,
                updated_date
            ) VALUES (
                '$user_id',
                '$name',
                0,
                '$created_date',
                '$updated_date'
            )");

            $isSuccess = mysqli_affected_rows($conn);
            
            // Kondisi jika query berhasil 
            if ( $isSuccess === 1 ) {
                $message = '<p><b>Kategori berhasil ditambahkan!</b></p>';
                echo "<body onload='successCategory()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }

        // Fungsi untuk edit kategori
        public function update($data, $conn, $user_id) 
        {
            // Variabel untuk menampung nilai
            $id = $data['id'];
            $name = htmlspecialchars($data['name']);
            $updated_date = date('Y-m-d H:i:s', time());

            if ( strlen($name) > 255 ) {
                $message = '<p><b>Nama terlalu panjang!</b></p>';
                echo "<body onload='errorCategory()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }

            // Query untuk edit kategori
            mysqli_query($conn, "UPDATE categories SET 
                user_id = '$user_id',
                name = '$name',
                updated_date = '$updated_date' WHERE id = '$id'"
            );

            $isSuccess = mysqli_affected_rows($conn);

            // Kondisi jika query berhasil 
            if ( $isSuccess === 1 ) {
                $message = '<p><b>Kategori berhasil disunting!</b></p>';
                echo "<body onload='successCategory()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }

        // Fungsi untuk hapus kategori
        public function destroy($conn, $id) 
        {  
            mysqli_query($conn, "UPDATE categories SET status_deleted = 1 WHERE id = '$id'");
            
            $isSuccess = mysqli_affected_rows($conn);
            // Kondisi jika query berhasil 
            if ( $isSuccess === 1 ) {
                $message = '<p><b>Kategori berhasil dihapus!</b></p>';
                echo "<body onload='successCategory()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }
    }

?>