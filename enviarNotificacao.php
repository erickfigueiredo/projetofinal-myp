<?php
    function enviarNotificacao($titulo, $mensagem){
        include 'conexao.php';
        $tokens = array();
        
        $sql = "SELECT token FROM tb_token_firebase;";
        $result = $con->query($sql);
        
        while($row = $result->fetch_assoc()){
            $tokens[] = $row["token"];
        }
        sendPush(0, $mensagem, $titulo, $tokens);
        $con->close();
    }
    
    function sendPush($opcao, $message, $title, $tokens) {
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        $fields = array (
                'registration_ids' => $tokens,
                'data' => array (
                        "mensagem" => $message,
                        "titulo" => $title,
                        "opcao" => $opcao
                )
        );
        $fields = json_encode ( $fields );
    
        $headers = array (
                'Authorization: key=' . "AAAA7nP6auk:APA91bG7kQ0I0BNTzJDTD7HqLXBTYBtcJbY7oVrhXOC2ZzoVZzgB34Wg5QwPG8WTb-9IifODuCYmu0QySg714ha_Sb-u69gicVW2gZsBuR5uC8Z4CGTUhghVHoJ8kCgvGzvT66ooFE9y",
                'Content-Type: application/json'
        );
    
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
    
        $result = curl_exec ( $ch );
        curl_close ( $ch );
    }
    $back = "<script>javascript:history.back(-2)</script>";
    echo $back;
?>