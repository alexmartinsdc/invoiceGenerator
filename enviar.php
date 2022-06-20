<?php

require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');
require_once('PHPMailer/src/Exception.php');

use Dompdf\Dompdf;
use Dompdf\Options;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//if(isset($_POST['formulario']) && $_POST['formulario'] == 'sim'):

  try {
    require __DIR__ . '/vendor/autoload.php';
    include 'email.php';
    include 'invoicePDF.php';

    //INSTANCIA DE OPTIONS
    $options = new Options();
    $options->setChroot(__DIR__);
    $options->setIsRemoteEnabled(true);

    $file_name = 'invoice_' . $_POST['nome_vend'] . '_'. $_POST['sobrenome_vend'] .'.pdf';
    $pdf = new Dompdf();    
    $pdf->load_html($invoicePDF);
    $pdf->render();    
    $file = $pdf->output();
    file_put_contents($file_name, $file);

    // gerar PDF
    //AUTOLOAD DO COMPOSER
    require __DIR__ . '/vendor/autoload.php';    
    //INSTANCIA DE DOMPDF
    $dompdf = new Dompdf();
    //CARREGA O HTML PARA DENTRO DA CLASSE
    //$dompdf->loadHtmlFile(__DIR__ . '/invoicePDF.php');
    $dompdf->load_html($invoicePDF);
    //RENDERIZAR O ARQUIVO PDF
    $dompdf->render();
    //IMPRIME O CONTEÚDO DO ARQUIVO PDF NA TELA
    $file = $pdf->output();
    file_put_contents($file_name, $file);
    
    // enviar e-mail
    $mail_vend = $_POST['email_vend'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;

    $mail->Username = 'comercial@abraofilho.com.br';            //USUARIO
    $mail->Password = 'Fol70063';                           //SENHA DE ACESSO
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SetFrom('comercial@abraofilho.com.br');              //EMAIL DE ENVIO
    $mail->AddBCC('luan.almeida@abraofilho.com.br');     //RECEBE COPIA

    $mail->addAddress($mail_vend);           //EMAIL RECEBEDOR
    
    $mail->IsHTML(true);

    $mail->Subject    = utf8_decode('Gerador De Invoice de Exportação Abrão Filho');              //ASSUNTO
    $mail->Body    = utf8_decode($conteudoEmail);                                    //CONTEUDO
    
    $mail->addAttachment($file_name);                            //ARQUIVO ANEXO
    
    if($mail->send()) {    
     echo 'success';
    } else {
      echo 2;
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$e}";
    echo $resp =  '2';
}
  

//endif;

?>