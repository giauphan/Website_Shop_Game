<?php

function sendmail($email)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions 
    $code_otp =  rand(0, 99999999999999);
    $BODY_MAIL = "TAIKHOANGAME GỬI EMAIL<BR> Mã xác minh của bạn:<br> " . $code_otp . "<br>Mã xác minh sẽ có hiệu lực trong 30 phút. Vui lòng không chia sẻ mã này với bất kỳ ai. Không nhận ra hoạt động này? Vui lòng <a href='https://taikhoangame.site/duan/?act=change_pass_new&code=" . $code_otp . "&email=" . $email . "' >đặt lại mật khẩu của bạn</a> hoặc truy cập https://taikhoangame.site/duan/?act=change_pass_new&code=" . $code_otp . "&email=" . $email . "' và liên hệ với bộ phận hỗ trợ khách hàng ngay lập tức.";
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'zero99ck0@gmail.com'; // SMTP username
        $mail->Password = 'njkkfricrifiyuau';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('zero99ck0@gmail.com', 'taikhoangame');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = '[TAIKHOANGAME.SITE] TAIKHOANGAME Email';
        $noidungthu = $BODY_MAIL;
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
    }
    return $code_otp;
}




function sendmail_sign($email)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions 
    $code_otp =  rand(0, 99999999999999);
    $BODY_MAIL = "TAIKHOANGAME GỬI EMAIL<BR> Mã xác minh của bạn:<br> " . $code_otp . "<br>Mã xác minh sẽ có hiệu lực trong 30 phút. Vui lòng không chia sẻ mã này với bất kỳ ai. Không nhận ra hoạt động này? ";
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'zero99ck0@gmail.com'; // SMTP username
        $mail->Password = 'njkkfricrifiyuau';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('zero99ck0@gmail.com', 'taikhoangame');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = '[TAIKHOANGAME.SITE] TAIKHOANGAME Email';
        $noidungthu = $BODY_MAIL;
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
    }
    return $code_otp;
}

function forget_pass($email, $pass)
{

        $sql = "UPDATE user SET password=? WHERE email=?";
        pdo_execute($sql, $pass, $email);
        return true;
}
function get_one_email($mail){
    $sql = 'SELECT * FROM `user` WHERE  email = ?';
   return pdo_query($sql,$mail);
}

