<?php
session_start();
include('../config/dbconn.php');
include('./myfunctions.php');
if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    // Kiểm tra sự tồn tại của email
    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "This email already existed!";
        header('Location: ../register.php');
    } else {
        if ($password == $cpassword) {
            // Chèn dô database users
            $insert_query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone','$email', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);
            if ($insert_query_run) {
                $_SESSION['message'] = "Register Successfully. Now login to begin!";
                header('Location: ../login.php');
            }
        } else {
            $_SESSION['message'] = "The password does not match!";
            header('Location: ../register.php');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);
    if (mysqli_num_rows($login_query_run) > 0) {
        // Lưu dữ liệu 
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $userphone = $userdata['phone'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail,
            'phone' => $userphone
        ];

        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1) {
            redirect('../admin/index.php', 'Welcome to dashboard!');
        } else {
            redirect('../my-orders.php', "Login Successfully");
        }
    } else {
        $_SESSION['message'] = "Invalid password or email!";
        header('Location: ../login.php');
        // redirect('Location: ../login.php',  "Invalid password or email");
    }
} else if (isset($_POST['change_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // $change_query = "UPDATE users SET password = '$password' WHERE email = '$email' ";
    // $change_query_run = mysqli_query($con, $change_query);

    if ($password == $cpassword) {
        $change_query = "UPDATE users SET password = '$password' WHERE email = '$email' ";
        $change_query_run = mysqli_query($con, $change_query);
        if ($change_query_run) {
            redirect('../login.php','Password changed successfully! Login to continue' );
        }
    }
    else {
        $_SESSION['message'] = "Invalid password or email!";
        header('Location: ../change.php');
        // redirect('Location: ../login.php',  "Invalid password or email");
    }
}
