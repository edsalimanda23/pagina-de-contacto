<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/opt/lampp/htdocs/Pagina de contacto/PHPMailer-master/src/Exception.php';
require '/opt/lampp/htdocs/Pagina de contacto/PHPMailer-master/src/PHPMailer.php';
require '/opt/lampp/htdocs/Pagina de contacto/PHPMailer-master/src/SMTP.php';


// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define as variáveis ​​do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    // Instancia o objeto PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuração do servidor SMTP local
         $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false;
        $mail->Port = 25;

        

        // Configuração do servidor SMTP do Gmail
         /*   $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; // Use 465 para SSL/TLS
            $mail->SMTPAuth = true;
            $mail->Username = 'edmilsonsalimanda4@gmail.com'; // Insira seu endereço de e-mail do Gmail
            $mail->Password = '+()/5690Navy'; // Insira sua senha do Gmail
            $mail->SMTPSecure = 'tls'; // Use 'ssl' para SSL/TLS
            $mail->SMTPAutoTLS = false; // Defina como false para forçar o uso do protocolo de segurança especificado

*/
        // Define o remetente e o destinatário
        $mail->setFrom($email, $nome);
        $mail->addAddress('cawiv83243@lewenbo.com'); // Coloque o e-mail do destinatário aqui

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Novo formulário de contato';
        $mail->Body    = "Nome: $nome <br> E-mail: $email <br> Mensagem: $mensagem";

        // Envia o e-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
</head>
<body>
    <h2>Entre em contato</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="email">E-mail:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="mensagem">Mensagem:</label><br>
        <textarea id="mensagem" name="mensagem" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

