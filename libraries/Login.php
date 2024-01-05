<?php

    class Login
    {
        // Fungsi untuk login
        public function store($data, $conn) 
        {
            // Variabel untuk menampung nilai
            $email = htmlspecialchars($data['email']);
            $password = htmlspecialchars($data['password']);

            // Query untuk mencari data user berdasarkan email
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

            // Kondisi jika data user ditemukan
            if ( mysqli_num_rows($result) === 1 ) {
                // Fungsi untuk mengubah hasil query ke bentuk array assosiatif
                $user = mysqli_fetch_assoc($result);

                if ( password_verify($password, $user['password']) ) {
                    // Set session
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['status_banned'] = $user['status_banned'];

                    if ( $user['role'] === 'user' ) {
                        $message = '<p><b>Selamat datang di SmartTask!</b></p>';
                        echo "<body onload='successLoginUser()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                        return false;
                    } else {
                        $message = '<p><b>Selamat datang di SmartTask!</b></p>';
                        echo "<body onload='successLoginAdmin()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                        return false;
                    }
                } else {
                    $message = '<p><b>Email atau password salah!</b></p>';
                    echo "<body onload='error()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                    return false;
                }
            } else {
                $message = '<p><b>Email atau password salah!</b></p>';
                echo "<body onload='error()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
            }
        }
    }

?>