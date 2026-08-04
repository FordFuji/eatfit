<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Mail;
use Config;
use Session;
use App\Blog;
use App\Wish;
use App\About;
use App\Banner;
use App\Address;
use App\Contact;
use App\Products;
use App\Question;
use ShoppingCart;
use App\PackagePrice;
use App\Tag_products;
use App\TypeQuestion;
use App\Gallery_products;
use App\Delivery_products;
use App\Menu_product_head;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
use App\Ingredients_products;
use App\Gallery_banner_menu_head;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

// phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// End phpmailer

class TestController extends Controller
{
    private $key = 'pkey_test_20742AxbGy9OFIa2UY1oj4WddMHXhNJV28BMo';
    private $secret = 'skey_test_20742fDfS8WbmJS0DXa9XOQt1DVVZzdLdbjOY';
    private $url = 'https://dev-kpaymentgateway-services.kasikornbank.com/';
    private $src = 'https://dev-kpaymentgateway.kasikornbank.com/ui/v2/kpayment.min.js';
    private $mcc_mid = '401498374873001';
    private $mcc_tid = '77777129';
    private $url_qr_code = 'https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/order';
    private $url_qr_code2 = 'https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/qr';

    // ตัดบัตรเครดิต
    public function testCreditCard() {
        // MCC
        $data = array(
            'src' => $this->src,
            'key' => $this->key,
            'mcc_mid' => $this->mcc_mid,
        );
        // End MCC

        // QR
        $reference_order = md5(rand());
        $data2 = [
            'amount' => '74.00', //จำนวนเงินที่ชำระ
            'currency'=>  'THB',
            'description' => 'Test',
            'source_type' => 'qr',
            'reference_order' => $reference_order, //รหัสใบสั่งซื้อ
        ];

        $payload = json_encode($data2);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_qr_code);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secret);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-api-key: '.$this->secret
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
 
        $result = json_decode($server_output);

        $qr = $this->createqr($result->id, $reference_order, '74.00', $this->secret); //เรียกใช้ฟังก์ชั่น createqr

        $data['order_id'] = $qr->order_id;
        // End QR

        // Union Pay

        // End Union Pay

        return view('frontend.testCreditCard', $data);
    }

    public function request($uri, $fields)
    {	
        $header = array();
        $header[] = "Accept:*/*";
        $header[] = "Content-Type:application/json";
        $header[] = "x-api-key:".$this->secret; 

        $this->curl = curl_init($this->url.$uri);
        curl_setopt($this->curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36');
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($this->curl, CURLOPT_SSLVERSION,1);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_URL, $this->url.$uri);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($fields));
	    $sRow = curl_exec($this->curl);

		$sRow = json_decode($sRow);
		return $sRow;
	}

    public function createqr($object_id, $orderno, $amount, $secretkey)
    {
        $data = [
            'order_id' => $object_id,
            'amount' => $amount,
            'currency'=> 'THB',
            'description' => 'LIVE',
            'sof' => 'ThaiQR',
            'reference_order' => $orderno,
        ];

        $payload = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_qr_code2);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $secretkey);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-api-key: '.$secretkey
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        return json_decode($server_output);
    }

    public function responseMCC() {
        
        $mid = $_POST['mid'];
        $token = $_POST["token"];

        $sData =  array(
            "token" => $token,
            "amount"=> $_POST['amount'],
            "currency" => "THB",
            "description" => $_POST['product'],
            "source_type" => "card",
            "mode" => "token",
            "reference_order" => substr(md5(rand()), 0, 5),
        );
        
        $sData['additional_data'] = ['mid' => $mid, 'tid' => $this->mcc_tid];
            
        //call charge API with Token
        $response = $this->request('card/v2/charge', $sData);
        
        $data = array(
            'charge_test_mcc' => json_encode($response)
        );

        DB::table('lv_charge')
            ->insert($data);

        //dd($response);

        if($response->status == "success" and $response->transaction_state == "Pre-Authorized") {
            return redirect($response->redirect_url);
        }
    }

    public function responseQRCode(Request $request) {
        $url = "https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/order";

        $data2 = [
            'amount' => $request->input('amount'), //จำนวนเงินที่ชำระ
            'currency'=>  'THB',
            'description' => 'รายละเอียดการสั่งซื้อ เช่น ชื่อนามสกุล ผู้สั่งซื้อ',
            'source_type' => 'qr',
            'reference_order' => $request->input('order_id'), //รหัสใบสั่งซื้อ
            'ref_1' => '99999' //id ในดาต้าเบส ของ tb_order
        ];

        $payload = json_encode($data2);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secret);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-api-key: '.$this->secret
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($server_output);

        //$qr = $this->createqr($result->id, $request->input('order_id'), $request->input('amount'), $this->secret); //เรียกใช้ฟังก์ชั่น createqr
    }

    public function responseUnionPay() {
        $mid = $_POST['mid'];
        $token = $_POST["token"];

        $sData =  array(
            "token" => $token,
            "amount"=> $_POST['amount'],
            "currency" => "THB",
            "description" => $_POST['product'],
            "source_type" => "unionpay",
            "mode" => "token",
            "reference_order" => substr(md5(rand()), 0, 5),
        );
        
        $sData['additional_data'] = ['mid' => $mid, 'tid' => $this->mcc_tid];
            
        //call charge API with Token
        $response = $this->request('card/v2/charge', $sData);
        
        $data = array(
            'charge_test' => json_encode($response)
        );

        DB::table('lv_charge')
            ->insert($data);

        if($response->status == "success" and $response->transaction_state == "Pre-Authorized") {
            return redirect($response->redirect_url);
        }
    }
    // End ตัดบัตรเครดิต

    public function testInstagram() {
?>
        <script src="<?php echo asset('/files/frontend/js/jquery.min.js');?>"></script>
        <script src="<?php echo asset('/files/frontend/instagram/jquery.instagramFeed.min.js');?>"></script>

        <script>
	    (function($){
	        $(window).on('load', function(){
                for(var i = 0; i < 3; i++) {
                    $.instagramFeed({
                        'username': 'eatfit.th',
                        'container': "#instagram-feed" + i,
                        'display_profile': false,
                        'display_biography': false,
                        'display_gallery': true,
                        'display_igtv': false,
                        'callback': null,
                        'styling': false,
                        'items': 3
                    });
                    
                    i++;
                }
            });
        })(jQuery);
        </script>
<?php
        for($i = 0; $i < 3; $i++) {
?>
            <div id="instagram-feed<?php echo $i;?>"></div>
<?php
        }
    }

    public function testPHPMailer() {
        // Load Composer's autoloader
        require 'local/vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'noreply.eatfit.gourmet@gmail.com';                     // SMTP username
            $mail->Password   = 'cqbokvhzghaeskcn';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('noreply.eatfit.gourmet@gmail.com', 'NoReply');
            $mail->addAddress('sitiporn@orange-thailand.com', 'Sitiporn Trongwichien');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function testLoginFacebook() {
        return redirect('login/facebook');
    }

    public function testPlus1Day() {
        $datetime_upload_slip = date('Y-m-d', strtotime("+1 days")).' 12:00:00';

        echo $datetime_upload_slip;
    }
}
