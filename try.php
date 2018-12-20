<?php
$name=htmlspecialchars($_POST["name"]);
$phone=htmlspecialchars($_POST["phone"]);
if(isset($_POST["email"]))
{
$email=htmlspecialchars($_POST["email"]);
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) 
{ 
throw new Exception(" Неправильный email"); 
} 
$t="Проверка работоспособности";
$m="Отправка письма работает. Использовалась функция mail().";
$headers = 'From: daniel@header.com'.'\r\n'.
    'Reply-To: daniel@header.com'.'\r\n'.
    'X-Mailer: PHP/' . phpversion();

mail($email,$t,$m,$headers);

}
else
{
$email=" ";
}

$dblocation = "localhost";
$dbname = "id2228564_task";
$dbuser = "id2228564_daniel";
$dbpass = "daniel";
$connect=@mysqli_connect($dblocation, $dbuser, $dbpass,$dbname);
if(!$connect)
{
throw new Exception(" Не удаётся установить соединение с сервером");
}

//$table='TASK1';
$q="INSERT INTO `TASK1` (`name`, `email`, `phone`) VALUES ('Andrew', 'batory2000@gmail.com', '+375447598320')";
$result = @mysqli_query($connect,$q);
echo mysqli_error($connect);
if(!$result)
{
throw new Exception("Информация не занесена");
}
mysqli_close($connect);
header('Location: http://'.$_SERVER["HTTP_HOST"].'/complete.html');
?>