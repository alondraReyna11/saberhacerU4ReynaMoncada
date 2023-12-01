<!DOCTYPE htmL>
<html lang="es">
<head>
  <title>Login</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color:  #000;
    }

    form {
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #fff;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 10px 20px;
      background-color:  #28A745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Configuración de la conexión a la base de datos
    $db_host = "localhost";  // Cambia con el nombre del host de tu base de datos
    $db_user = "root"; // Cambia con tu nombre de usuario de la base de datos
    $db_pass = "contraseña"; // Cambia con tu contraseña de la base de datos
    $db_name = "login"; // Cambia con el nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para verificar la autenticación
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "¡Bienvenido, $username!";
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <h1>Login</h1>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <br>
  <button type="submit">Login</button>
</form>

</body>
</html>
