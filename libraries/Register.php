<?php

    // Class child turunan dari class Database
    class Register extends Database 
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

        // Fungsi untuk menambahkan data ke tabel users
        public function store($data, $conn)
        {
            // Variabel untuk menampung nilai
            $username = htmlspecialchars($data['username']);
            $email = htmlspecialchars($data['email']);
            $password = htmlspecialchars($data['password']);
            $confirm_password = htmlspecialchars($data['confirm-password']);

            if ( strlen($username) > 50 ) {
                $message = '<p><b>Username lebih dari 50 kata!</b></p>';
                echo "<body onload='errorRegister()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }

            // Cek email apakah sudah terdaftar
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            
            // Kondisi jika data berhasil ditemukan
            if ( mysqli_num_rows($result) === 1 ) {
                $message = '<p><b>Email sudah terdaftar!</b></p>';
                echo "<body onload='error()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
            
            // Cek password apakah sama dengan konfirmasi password
            if ( $password !== $confirm_password ) {
                $message = '<p><b>Password tidak sesuai!</b></p>';
                echo "<body onload='error()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }

            // Bcrypt password
            $password = password_hash($password, PASSWORD_BCRYPT);
            $created_date = date('Y-m-d H:i:s', time());
            $updated_date = $created_date;

            // Insert to table users
            mysqli_query($conn, "INSERT INTO users(
                username, 
                email, 
                password, 
                role, 
                created_date, 
                updated_date
            ) VALUES (
                '$username',
                '$email',
                '$password',
                'user',
                '$created_date',
                '$updated_date'
            )");

            $isSuccess = mysqli_affected_rows($conn);

            // Kondisi jika query berhasil 
            if ( $isSuccess === 1 ) {
                $message = '<p><b>Akun berhasil terdaftar!</b></p>';
                echo "<body onload='successRegister()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }

        }
    }

?>