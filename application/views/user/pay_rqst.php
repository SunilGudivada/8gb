<?php

$netamt = $cost*1.18;

foreach($info->result() as $row):

  $id = $row->ad_id;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_4b14a7665ece3143ca6bb0e58f1",
                  "X-Auth-Token:test_f114860025c09869f1413c7d28f"));

$payload = Array(
    'purpose' => 'Posting an Advertisement in 8GB',
    'amount' => $netamt,
    'phone' => $row->phone,
    'buyer_name' => $row->username,
    'redirect_url' => 'http://8gb.io/classyad/index.php/advts/success/',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => $row->email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response,true);

$payment_request_id = $json_decode['payment_request']['id'];
$long_url = $json_decode['payment_request']['longurl'];
// header('Location:'.base_url('index.php/advts/transaction/').$row->ad_id.'/'.$payment_request_id.'/'.$netamt.'/'.$long_url);
endforeach;
?>
<script>
    $(document).ready(function(){
        var data = "a="+"<?php echo  $id;?>";
        data = data + "&b=" + "<?php echo  $payment_request_id;?>";
        data = data + "&c=" + "<?php echo  $netamt;?>";
        data = data + "&d=" + "<?php echo  $long_url;?>";
        $.post("<?php echo base_url('index.php/advts/transaction/');?>",data,function(msg){
            if(msg.status == 'success'){
                location.href="<?php echo $long_url;?>";
            }else{
                console.log(msg);
            }
        });
    });
</script>