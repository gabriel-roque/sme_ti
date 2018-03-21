<!-- Sessão PHP -->
<?php
include("dbconfig.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
// username and password received from loginform
$username=mysqli_real_escape_string($dbconfig,$_POST['username']);
$password=mysqli_real_escape_string($dbconfig,$_POST['password']);

$sql_query="SELECT id FROM user WHERE username='$username' and password='$password'";
$result=mysqli_query($dbconfig,$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);


// If result matched $username and $password, table row must be 1 row
if($count==1)
{
$_SESSION['login_user']=$username;

header("location: welcome-home.php");
}
else
{
$error="Username or Password is invalid";
}
}
?>

<!--Sessao HTML-->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> <!-- Importa o estilo de font que sera utilizado no site-->
  <meta charset="UTF-8">
  <title>SME TI</title>
  <link rel="shortcut icon" href="https://i.imgur.com/18Ee88O.png" type="image/x-icon">

<!--A tag style ira aplicar os estilos a pagina -->
<style>
body {
    background-size: cover;
    font-family: Montserrat;
    color: #fff
}

.logo {
    background:#181818 url('https://i.imgur.com/U1Qj4Et.png') no-repeat center;
    width: 300px;
    height: 150px;
    margin: 50px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #181818;
    border-radius: 20px;
    border-top: 5px solid #0067cc;
    margin: 0 auto;
}

.login-block {
    text-align: center;
    color: #fff;
    font-size: 15px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('https://i.imgur.com/W0Il1nn.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('https://i.imgur.com/W0Il1nn.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('https://i.imgur.com/fNjevvX.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('https://i.imgur.com/fNjevvX.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #0067cc;
}

.login-block button {
    width: 20%;
    text-align: center;
    height: 40px;
    background: #0067cc;
    box-sizing: border-box;
    border: 1px solid #fff;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #0081ff;
    color: #fff;

}

.footer{
  position: absolute;
  text-align: center;
  width:99%;
  height: 20%;
  bottom: 0;
  font-size: 12px
}

</style>
</head>

<!-- cor do background da página-->

<body bgcolor="#181818">

<!-- Logo -->

<div class="logo"></div>

<!--Formulário de login -->

<div class="login-block">
    <form method="post" action="" name="loginform">
    <input type="text" value="" placeholder="Username" id="username" name="username" />
    <input type="password" value="" placeholder="Password" id="password" name="password" />
    <button type="submit">LOGIN</button>
    </form>
</div>

<!-- Rodapé da pagina de login -->

<div class="footer">
  <footer>Gabriel e Vagabundos</footer>
</div>

</body>

</html>
