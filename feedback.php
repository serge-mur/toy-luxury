<?
if ($_POST) {

    $email = clean($_POST['email']);
    $tarif = $_POST['tarif'];

    if(!empty($email))  {

        $date = date('Y-m-d H:i:s');
        $string = $date.';'.$email.';'.$tarif.';';
        $f = fopen('feedback.txt', 'a');
        fwrite($f, $string . PHP_EOL);
        fclose($f);

        mail(
        "servicetoy@toy.ru,s.murashko@toy.ru", //<== шлем сюды
        "Заявка с сайта vip.toy.ru",
        "E-mail: ".$email.PHP_EOL.
        "Тариф: ".$tarif.PHP_EOL.
        "From: servicetoy@toy.ru \r\n");   
        
        echo "Заявка отправлена";

    }
    else {
        echo "Введенные данные некорректные. Форма не отправлена";
    };

}

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

?>