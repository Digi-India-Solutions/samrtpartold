<?php

function sfu($a){
    $a = trim($a);
    $a = html_entity_decode($a);
    $a = strip_tags($a);
    $a = strtolower($a);
    $a = preg_replace('~[^ a-z0-9_.]~', ' ', $a);
    $a = preg_replace('~ ~', '-', $a);
    $a = preg_replace('~-+~', '-', $a);
    return $a;
}

function Status($input_name,$i=null)
{
    $GLOBALS['Status'] = $arr = array('1' =>"Yes" ,'0' =>"No");

    echo "<select name=".$input_name." class='form-control'>
        <option value=''>Select Status</option>";
    foreach ($GLOBALS['Status'] as $k => $v) {
        if($k == @$i) {
            echo"<option value=".$k." selected>".$v." </option>";
        } else {
            echo"<option value=".$k.">".$v." </option>";
        }
    }
    echo "</select>";
}

function StatusName($value)
{   
    $arr = array('1' =>"Yes" ,'0' =>"No");
    foreach ($arr as $k => $v) {
        if($k == $value){
            echo $v;
        }
    }
}

function mailchimp_subscribe($email = false){
    $list_id = getenv('MAILCHIMP_LIST_ID');
    $api_key = getenv('MAILCHIMP_API_KEY');

    $data_center = substr($api_key,strpos($api_key,'-')+1);
    $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';

    $json = json_encode([
        'email_address' => $email,
        'status'        => 'subscribed', // 'subscribed' or 'pending'
    ]);

    try {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($status_code == 200);
    } catch(Exception $e) {
        return false;
    }
}

function unsubscribe($email = false){
    $list_id = getenv('MAILCHIMP_LIST_ID');
    $api_key = getenv('MAILCHIMP_API_KEY');

    $data_center = substr($api_key,strpos($api_key,'-')+1);
    $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members/'. md5(strtolower($email));

    try {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($status_code == 204);
    } catch(Exception $e) {
        return false;
    }
}

// send order sms
function send_order_sms($order){
    $CI = & get_instance();
    $apiKey = urlencode(getenv('TEXTLOCAL_API_KEY'));

    $mob1 = '91'.$order->telephone;
    $name = ucwords($order->firstname.' '.$order->lastname);
    $order_id = $order->id;
    $numbers = array($mob1);
    $sender = urlencode('LUMFRD');
    $message = rawurlencode("$name, Your order number $order_id is confirmed! Welcome aboard with Lumiford - Designed Around You. You will receive your tracking details over SMS and email once it is dispatched. - Team Lumiford");
    $numbers = implode(',', $numbers);

    $data1 = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);

    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// bulk sms
function bulk_order_sms($mobile){
    $CI = & get_instance();
    $apiKey = urlencode(getenv('TEXTLOCAL_API_KEY'));

    $numbers = $mobile;
    $sender = urlencode('LUMFRD');
    $otp = rand(111111,999999);
    $CI->session->set_userdata('otp',$otp);
    $send_otp = $CI->session->userdata('otp');
    $message = rawurlencode('Welcome to Lumiford. Your OTP is '.$send_otp .' Thanks Lumiford');
    $numbers = implode(',', $numbers);

    $data1 = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);

    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function uploadSingle($file_name,$folder=false,$type=false){
    $array = array();
    if(empty($folder)){
        $folder = 'images';
    }
    if(!empty($type)){
        $type = implode(',',$type);
    }

    // Validation
    $input = $this->validate([
        'file' => 'uploaded[$file_name]|max_size[$file_name,1024]|ext_in[$file_name,jpg,jpeg,png],'
    ]);

    if (!$input) { // Not valid
        $array['status'] = 0;
        $array['validation'] = $this->validator; 
        return $array;
    } else { // Valid
        if($file = $this->request->getFile($file_name)) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $name = $file->getName();
                $ext = $file->getClientExtension();
                $newName = $file->getRandomName(); 
                $file->move('uploads/'.folder, $newName);
                $filepath = "uploads/".$newName;
                $array['status'] = 1;
                $array['path'] = filepath; 
                return $array;
            } else {
                $array['status'] = 0;
                $array['validation'] = $file->getErrorString(); 
                return $array;
            }
        }
    }
}

function convert_number($number) 
{
    if (($number < 0) || ($number > 999999999)) {
        throw new Exception("Number is out of range");
    }
    $giga = floor($number / 1000000);
    $number -= $giga * 1000000;
    $kilo = floor($number / 1000);
    $number -= $kilo * 1000;
    $hecto = floor($number / 100);
    $number -= $hecto * 100;
    $deca = floor($number / 10);
    $n = $number % 10;
    $result = "";
    if ($giga) {
        $result .= convert_number($giga) .  " Million";
    }
    if ($kilo) {
        $result .= (empty($result) ? "" : " ") .convert_number($kilo) . " Thousand";
    }
    if ($hecto) {
        $result .= (empty($result) ? "" : " ") .convert_number($hecto) . " Hundred";
    }
    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
    if ($deca || $n) {
        if (!empty($result)) {
            $result .= "  ";
        }
        if ($deca < 2) {
            $result .= $ones[$deca * 10 + $n];
        } else {
            $result .= $tens[$deca];
            if ($n) {
                $result .= " " . $ones[$n];
            }
        }
    }
    if (empty($result)) {
        $result = "zero";
    }
    return strtoupper($result);
}

if(!function_exists("getClientIpAddress")){
    function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
          $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}

function getUserCountry($ip){
    $ipdat = @json_decode(file_get_contents(
        "http://www.geoplugin.net/json.gp?ip=" . $ip));
    return strtolower($ipdat->geoplugin_countryName);
}

?>
