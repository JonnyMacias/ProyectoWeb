<?php
    include_once 'database.php';

    session_start();

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: administrador.php');
            break;

            case 2:
                header('location: clientes.php');
            break;

            case 3:
                header('location: inventario.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            // validar rol
            $rol = $row[3];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    $username = 'Administrador';
                    $usuarioValido = true; // Simulación de validación de credenciales
                    if ($usuarioValido) {
                        $_SESSION['username'] = $username; // Guarda el nombre de usuario en la sesión
                        echo "Sesión iniciada correctamente. Usuario: " . $_SESSION['username'];
                        header('location: administrador.php'); // Redirige al home
                        exit();
                    } else {
                        echo "Credenciales inválidas.";
                    }
                    
                break;
    
                case 2:
                    $username = 'Clientes';
                    $usuarioValido = true; // Simulación de validación de credenciales
                    if ($usuarioValido) {
                        $_SESSION['username'] = $username; // Guarda el nombre de usuario en la sesión
                        echo "Sesión iniciada correctamente. Usuario: " . $_SESSION['username'];
                        header('location: clientes.php'); // Redirige al home
                        exit();
                    } else {
                        echo "Credenciales inválidas.";
                    }
                break;

                case 3:
                    $username = 'Inventarios';
                    $usuarioValido = true; // Simulación de validación de credenciales
                    if ($usuarioValido) {
                        $_SESSION['username'] = $username; // Guarda el nombre de usuario en la sesión
                        echo "Sesión iniciada correctamente. Usuario: " . $_SESSION['username'];
                        header('location: inventario.php'); // Redirige al home
                        exit();
                    } else {
                        echo "Credenciales inválidas.";
                    }
                break;
    
                default:
            }

            
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/estilo_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class = "wrapper">
        <form action="#" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Usuario" name="username">
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Contraseña" name="password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Recordarme</label>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</body>
</html>