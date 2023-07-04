<DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <script src="https://code.jquery"></script>
  </head>
  <body>
    <h2>Login</h2>

    <form id="loginForm"
      method="post"
      action="login.php">
      <div>
        <label
          for="username">Usuário:</label>
        <input type="text"
        id="username" name="username" required>
      </div>
      <div>
        <label
          for="password">senha:</label>
        <input type="password"
          id="password" name="password" required>
      </div>
      <div>
        <input type="submit"
          value= "entrar">
      </div>
    </form>
    <div id="message"></div>
  </body>
</html>

<script>
$(document).ready(function(){
  $("#loginForm").on("submit", function(event){
    event.preventDefaut();
    var username = $
    ("#username").val();
    var password = $
    ("#password").val();
    $.ajax({
      url: "login php",
      method: "POST",
      data: {
        username: username
        password: password
      },
                     success: function (data) {
                       $("#message").html(data);
                     }
    });
    
  });
});
</script>
<?php 
$servername ="localhost"
$username ="seu_usuario"
$password ="sua_senha"
$dbname ="nome_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Falha na conexão.". $conn->connect_error);
}

  if
    ($_SERVER["REQUEST_METHOD"] == "POST"){
      $user = $_POST["username"];
      $pass = $_POST["password"];

      $sql = "SELECT *FROM usuarios where username = '$user' AND password = '$pass'";
      $result=$conn->query($sql);
    }
    
?>
