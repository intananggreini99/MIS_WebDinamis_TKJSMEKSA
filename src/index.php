
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');


        :root {
            --primary-border : #ffd000;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("home.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        body div form {
            color: var(--primary-border);
        }

        .wrapper{
            width: 420px;
            background-color: transparent;
            border: 2px solid var(--primary-border);
            backdrop-filter: blur(15px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #ffffff;
            border-radius: 7px;
            padding: 30px 40px;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(133, 104, 12, 0.2);
            border-radius: 30px;
            font-size: 16px;
            color: #cccccc;
            padding: 20px 45px 20px 20px;
            border: 1.5px solid var(--primary-border);
        }

        .wrapper div.plus {
            padding-top: 15px;
        }

        ::placeholder {
            color: #cccccc;
            opacity: 40%;
        }

        ::-ms-input-placeholder {
            color: #cccccc;
            opacity: 40%;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--primary-border);
        }

        .wrapper .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
        }

        .remember-forgot label input {
            accent-color: #fff;
            margin-right: 3px ;
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .wrapper .tombol {
            width: 100%;
            height: 45px;
            background-color: #bdb0b091;
            fill-opacity: 25%;
            border: var(--primary-border);
            outline: none;
            border: 40px ;
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-border);
            font-weight: 600;
            border-radius: 25px;
        }

        .wrapper .link {
            font-size: 14.5px;
            text-align: center;
            margin:20px 0 15px ;
        }

        .link {
            color: var(--primary-border);
            text-decoration: none;
            font-weight: 600;
        }

        div.remember-forgot label{
            color: var(--primary-border);
            text-decoration: none;
            font-weight: 600;
        }

        div.remember-forgot a{
            color: var(--primary-border);
            text-decoration: none;
            font-weight: 600;
        }
        div.remember-forgot label{
            color: var(--primary-border);
            text-decoration: none;
            font-weight: 600;
        }

        .link p a:hover {
            text-decoration: underline;
        }

        .pesan {
            margin-top: 15px;
            padding: 8px 12px;
            border-radius: 7px;
            background-color: rgba(0, 0, 0, .45);
            color: var(--primary-border);
            font-size: 14px;
            text-align: center;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <form class="wrapper" action="login.php" method="post">
        <h1 class="text-center">Login</h1>
        <?php
            $pesan = $_GET['pesan'] ?? '';
            if ($pesan == 'gagal') {
                echo '<p class="pesan">Email/username atau password salah.</p>';
            } elseif ($pesan == 'belum_login') {
                echo '<p class="pesan">Silakan login terlebih dahulu.</p>';
            } elseif ($pesan == 'logout') {
                echo '<p class="pesan">Anda berhasil logout.</p>';
            }
        ?>
        <div class="input-box">
            <label for="username">Email:</label>
            <input type="text" id="email" name="email" required><br></br>
        </div>
        <div class="input-box">
            <label for="password">Password:</label>
            <input type="password" id="inputPassword" name="password" required><br></br>
        </div>
        <div class="plus">
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary tombol" value="login">LOGIN</button>
            <div class="link">
                <p>Don't have an account? <a href="#">Register now.</a></p>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>