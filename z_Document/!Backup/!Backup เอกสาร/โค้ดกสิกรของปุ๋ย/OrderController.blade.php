	public function MyCartConfirm(Request $request){
	
			if($data->payment_type == 'QR'){ //ถ้าเลือกชำระเงินแบบ QR

							
				//บันทึกใบสั่งซื้อ และ get ข้อมูลในใบสั่งซื้อ
				
						//QR CODE
						$url = "https://kpaymentgateway-services.kasikornbank.com/qr/v2/order";


						$secretkey = 'คีย์ของธนาคาร';

						$data2 = [
							'amount' => $amount, //จำนวนเงินที่ชำระ
							'currency'=>  'THB',
							'description' => 'รายละเอียดการสั่งซื้อ เช่น ชื่อนามสกุล ผู้สั่งซื้อ',
							'source_type' => 'qr',
							'reference_order' =>$reference_order, //รหัสใบสั่งซื้อ
							'ref_1' => $order_id, //id ในดาต้าเบส ของ tb_order
						];

						$payload = json_encode($data2);

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
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

						$result = json_decode($server_output);

						$input_all5x['orders_message'] = json_encode($result); //บันทึกค่าที่รีเทินกลับมาลง database
						\App\Models\Orders::where('id',$order_id)->update($input_all5x);

						$qr = $this->createqr($result->id, $reference_order, $amount, $secretkey); //เรียกใช้ฟังก์ชั่น createqr


		}
		}
		
		
		
		
    public function createqr($orderid, $orderno, $amount, $secretkey)
    {
        $url = "https://kpaymentgateway-services.kasikornbank.com/qr/v2/qr";

        $data = [
            'order_id' => $orderid,
            'amount' => $amount,
            'currency'=>  'THB',
            'description' => 'LIVE',
            'sof' => 'ThaiQR',
            'reference_order' => $orderno,
        ];

        $payload = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
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
		
		
		
	public function Notipayment2(Request $request)
	{
		$chargeid = $request->chargeId;
		$url = "https://kpaymentgateway-services.kasikornbank.com/qr/v2/qr/".$chargeid;
		$secretkey = 'คีย์ของธนาคาร';  //คีย์ของธนาคาร
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'x-api-key: '.$secretkey
		)
		);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($server_output);

		if ($result->status == "success") { //ถ้าสแกนจ่ายเงินแล้ว และธนาคารส่งค่ากลับมาว่าสำเร็จ
		$input_all['orders_status'] = 'S'; //เปลี่ยนสถานะของใบสั่งซื้อเป็น ชำระเงินแล้ว
		\App\Models\Orders::where('id',$data['orders_data']->id)->update($input_all); //อัพเดทลงฐานข้อมูล
		return redirect('/Thankyou/'.$data['orders_data']->id); //ไปหน้าขอบคุณ
		}else{ //ถ้าจ่ายเงินไม่สำเร็จ
		return redirect('/payment_unsuccess'); //แสดงผลหน้าชำระเงินไม่สำเร็จ
		}
	}


		
		
		