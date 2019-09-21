<?php
    include 'conexao.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    $nome = addslashes($_POST['nome_email']);
    $email= addslashes($_POST['email_user']);
    $assunto= addslashes($_POST['assnt']);
    $mensagem= addslashes($_POST['msn']);
    $pg = $_POST['pg'];
    //$arquivo= $_FILES["fupload"];
    
    //if(isImage($arquivo['type'] ) or ($arquivo['type']=='')){
        $mail = new PHPMailer(true);                             
        //$mail->SMTPDebug = 3;  
        $mail->CharSet = 'UTF-8';                       
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';                 
        $mail->SMTPAuth = true;                               
        $mail->Username = 'erickevinicius2018@gmail.com';                
        $mail->Password = 'iknowyou';  
        $mail->host = "smtp.gmail.com";                        
        $mail->SMTPSecure = 'ssl';                            
        $mail->Port = 465;    
        $mail->AddEmbeddedImage('imagens/icone/ic_myp.png', 'ic_myp.png');
        //$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']);
        
        //Recipientes
        $mail->setFrom('erickevinicius2018@gmail.com', 'Myp');
        $mail->addAddress($email, $nome);            
        $mail->addAddress = ($email);
        
        //Conteudo
        $mail->isHTML(TRUE);        
        $mail->Subject = $assunto;     
        $mail->Body = 
        '<body style="margin:0px;">
        <table width="100%" cellspacing="0" align="center"  cellpadding="10%" style="background-image:linear-gradient( #28FFB0, #2C9BFF);  border-radius: 10px;"><tbody><tr><td height="300" valign="top">
            <table width="100%" border="0" align="center" cellpadding="30" style="background-color:#FFFFFF;border-radius:10px;">
            <tbody><tr><td>
                <div align="center"><a href="https://classmatch.myscriptcase.com/mypsite"><img src="cid:ic_myp.png" title="MyP_Logo" alt="MyP_Logo" style="width:70px; height: 70px;" align="center"/></a></div>
                <h2 align="center">MyP - Seu app de serviços :-)</h2>
                <hr width="60%">
                <br>
                <p>Olá '.$nome.',</p>
                <p>'.$mensagem.'</p>
                <br>
                <p>A equipe MyP agradece sua preferência e parceria.</p>
                <p>Comprovante de transferência:</p>
            </td></tr></tbody>
            </table>
        </td></tr></tbody></table>';  
        $mail->AltBody = trim(strip_tags(
        '<body style="margin:0px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="10%" style="background-image:linear-gradient( #28FFB0, #2C9BFF); margin:0px; "><tbody><tr><td height="300" valign="top">
            <table width="100%" border="0" align="center" cellpadding="30" style="background-color:#FFFFFF;border-radius:10px;">
            <tbody><tr><td>
                <span><img src="cid:ic_myp.png" title="MyP_Logo" alt="MyP_Logo" style="width:40px; height: 40px;"></img><h2>MyP - Seu app de serviços :-)</h2></span>
                <hr>
                <br>
                <p>Olá '.$nome.',</p>
                <p>'.$mensagem.'</p>
                <br>
                <p>A equipe MyP agradece sua preferência e parceria.</p>
                <p>Comprovante de transferência:</p>
            </td></tr></tbody>
            </table>
        </td></tr></tbody></table>'
        ));
        //$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );
        $enviado = $mail->Send();
    
        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        
        // verifica se enviou corretamente
        if ($enviado) {
          header("location:".$pg);
        }
        else {
            $_SESSION['email']='ERRO';
            header("location:".$pg);
           
        }
    /*}else{
        header("location: tabela_profissionais.php");
    }*/

?>                                              
