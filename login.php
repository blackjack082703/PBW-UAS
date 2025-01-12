<?php
session_start();

include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("location:admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];

    //md5 encryption
    $password = md5($_POST['pass']);

    $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    $hasil = $stmt->get_result();

    $row = $hasil->fetch_array(MYSQLI_ASSOC);

    if (!empty($row)) {
        $_SESSION['username'] = $row['username'];

        header("location:admin.php");
    } else {
        header("location:login.php");
    }

    $stmt->close();
    $conn->close();
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
        <link rel="icon" href="img/gambar udinus.png" />
        <style>
            body {
                background: linear-gradient(135deg,rgb(82, 125, 236), #0ba29d);
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .login-container {
                background: white;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            }

            .btn-custom {
                background-color:rgb(11, 64, 162);
                color: white;
            }

            .btn-custom:hover {
                background-color:rgb(10, 56, 130);
                color: white;
            }

            .input-custom {
                border-radius: 25px;
                padding: 10px;
            }

            .brand-logo {
                width: 80px;
                height: 80px;
                margin-bottom: 20px;
            }

            .text-header {
                color:rgb(11, 51, 162);
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="login-container text-center">
            <img src="img/gambar udinus.png" alt="Logo" class="brand-logo" />
            <h1 class="text-header">Welcome Back!</h1>
            <p>Please log in to your account</p>
            <form action="" method="post">
                <input
                    type="text"
                    name="user"
                    class="form-control my-3 input-custom"
                    placeholder="Username"
                    required
                />
                <input
                    type="password"
                    name="pass"
                    class="form-control my-3 input-custom"
                    placeholder="Password"
                    required
                />
                <button class="btn btn-custom w-100 py-2">Login</button>
            </form>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </body>

    </html>
<?php
}
?>
