<!doctype html>
<html>

<head>
	 @include('frontend.layouts.inc_head')
	<style>
        .topic_termgreen{
            color: #66a30b;
            font-size: 1.2rem;
            margin: 30px 0 15px;
        }
        .wrap_descterms{
            margin: 20px 0 0 0;
        }
        .box_terms .topic_termgreen{
            margin-bottom: 5px;
            color: #000;
        }
        .box_terms a{
            color: #000;
        }
        .box_terms a:hover{
            text-decoration: none;
            color: #66a30b;
        }
    </style>
</head>

<body>

	<div class="container-fluid">
	
		 @include('frontend.layouts.inc_menu')

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <div>@if(Session::get('lang') == 'th') ข้อกำหนดในการให้บริการ @else Terms and Conditions @endif</div>
                 </div>
                 
		        <div class="row wrap_reviewall wrap-content">
                    <div class="col-12 col_itemproduct">
                        <div class="inside_toptitle"><div class="title_topic">@if(Session::get('lang') == 'th') ข้อกำหนดและเงื่อนไข @else Terms and Conditions @endif</div></div>
                        <div class="topic_termgreen">@if(Session::get('lang') == 'th')เริ่มมีผลบังคับใช้ เดือนธันวาคม 2563 @else Effective December 2020 @endif</div>
                        <p>
                            @if(Session::get('lang') == 'th') บริษัท กูร์เมท์ พรีโม่ จำกัด (บริษัท กูร์เมท์ พรีโม่ จำกัด “อีทฟิต”, “เรา” หรือ
                            “พวกเรา”) ดำเนินงาน eatfitshop.com ร่วมกับไซต์ที่เกี่ยวข้อง
                            และแอพพลิเคชันมือถือ (รวมเรียกว่า “eatfitshop.com”)
                            โปรดอ่านข้อกำหนดและเงื่อนไขอย่างละเอียด พวกเขาควบคุมการเข้าถึง
                            และการใช้งานเนื้อหาหรือบริการที่เสนอผ่าน eatfitshop.com
                            ข้อกำหนดและเงื่อนไขเหล่านี้
                            เป็นข้อตกลงทางกฎหมายที่มีผลบังคับผูกมัดระหว่างกับเรา @else 
                            Gourmet Primo Co.,Ltd. (“Gourmet Primo Co.,Ltd.,” “Eatfit,” “we,” or “us”) operates eatfitshop.com and associated sites and mobile applications (collectively, “eatfitshop.com”). Please read these Terms and Conditions (“T&C”) carefully. They govern your access to and use of eatfitshop.com, its content, and the services offered on or through it. These T&C constitute a binding legal agreement between you and us. @endif

                        </p>
                        <p>
                            @if(Session::get('lang') == 'th')
                            การเข้าถึงหรือการใช้งานเว็บไซต์ของเรา หมายความว่าคุณได้อ่าน
                            ทำความเข้าใจ และยอมรับข้อกำหนดและเงื่อนไขเหล่านี้
                            หากคุณเข้าถึงหรือใช้งานเว็บไซต์ของเราในนามของนิติบุคคลหรือองค์กรใด ๆ
                            ในกรณที่ “คุณ”, “ของคุณ”, “ผู้เยี่ยมชม” และ “ผู้ใช้งาน”
                            อ้างถึงนิติบุคคลหรือองค์กรนั้น ๆ
                            คุณต้องรับรองว่าเป็นตัวแทนที่มีอำนาจในการผูกมัดของนิติบุคคลหรือองค์กรนั้

                            น หากคุณไม่ยอมรับข้อกำหนดและเงื่อนไขเหล่านี้ ดังนั้น
                            คุณจะหมดสิทธิ์ในการเข้าถึงเว็บไซต์ เนื้อหา และการบริการของเรา
                            @else 
                            YOUR ACCESS OR USE OF OUR WEBSITE MEANS THAT YOU HAVE READ AND YOU UNDERSTAND AND AGREE TO BE BOUND BY THESE T&C. IF YOU ACCESS OR USE OUR WEBSITE ON BEHALF OF AN ENTITY, YOU REPRESENT THAT YOU HAVE THE AUTHORITY TO BIND THAT ENTITY, AND THESE T&C ARE THE AGREEMENT OF SUCH ENTITY. IN THAT EVENT, “YOU,” “YOUR,” “VISITOR,” AND “USER” REFER TO THAT ENTITY. IF YOU DO NOT AGREE TO THESE TERMS, THEN YOU HAVE NO RIGHT TO ACCESS OR USE OUR WEBSITE AND ITS CONTENT AND SERVICES.
                            @endif
                        </p>
                        <div class="wrap_descterms">
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 1. คุณภาพ @else 1. QUALITY @endif</div>
                                <p>@if(Session::get('lang') == 'th') เรารับประกันว่าผลิตภัณฑ์ทั้งหมดที่เราเสนอ เป็นไปตามมาตรฐานของนโยบายคุณภาพ หากมีข้อร้องเรียนใด ๆ ผู้บริหารจัดการจำเป็นต้องแจ้งให้ทราบทันที และจะดำเนินการอย่างเหมาะสมโดยเร็วที่สุด @else We guarantees that all the products offered meet the standards of the concept. If there are any complaints the management needs to be informed immediately. Appropriate actions will be taken as soon as possible.@endif</p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 2. การสั่งซื้อและการจัดส่ง @else 2. ORDER & DELIVERY @endif</div>
                                <p>@if(Session::get('lang') == 'th') สามารถสั่งซื้อได้ทางเว็บไซต์ www.eatfitshop.com ตลอด 24 ชม. หรือ ทางไลน์/เฟซบุ๊ค @eatfit.th หรือโทร. 091-666-0998 เวลาทำการตั้งแต่ 8.00 - 20.00 น. เราแนะนำให้คุณทำการสั่งซื้อล่วงหน้า 24 ชม. ก่อนเวลาที่ต้องการส่ง เพื่อความสดใหม่สูงสุด @else You can make an order on our website at www.eatfitshop.com 24 hours, or via our line official/Facebook @eatfit.th, or by telephone on 091-666-0998 during office hours from 8 am – 8 pm. We advise you to place an order 24 hours before the desired delivery time to ensure maximum freshness. @endif
</p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 3. การชำระเงิน @else 3. PAYMENTS @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th')
                                    3.1. All prices are including VAT. <br>
                                    3.2. Methods of payment we accept: Cash, Visa, MasterCard and Bank Transfer. <br>
                                    3.3. You will not receive confirmation of your definitive booking until your payment has been approved.
                                    @else 
                                    3.1. ราคาทั้งหมดรวมภาษีมูลค่าเพิ่มแล้ว<br>
                                    3.2. ช่องทางการชำระเงิน : เงินสด, Visa, Master Card และ โอนผ่านธนาคาร<br>
                                    3.3. คุณจะยังไม่ได้รับการยืนยันการสั่งสินค้า จนกว่าการชำระเงินของคถณได้รับการอนุมัติ

                                    @endif
                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 4. ขั้นตอนการคืนเงิน @else 4. REFUND PROCESS @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th')
                                    เราขอสงวนสิทธิ์ในการรับคืนสินค้าที่เสียหายหรือเกิดข้อผิดพลาดจากการจัดส่งเท่านั้น และกระบวนการคืนเงินจะใช้เวลาประมาณ 14 – 21 วัน ผ่านช่องทางเดียวกันกับวิธีการชำระเงินของคุณ
                                    @else
                                    We reserve the right to only accept the return of products in damaged or defective products caused by the delivery process. We shall refund the cost of your purchase using the same payment method with which you made initial purchase. The refund process will take approximately 14 – 21 days.
                                    @endif
                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 5. การยกเลิกคำสั่งซื้อ @else 5. CANCELLATIONS @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') หากคำสั่งซื้อของคุณได้รับการยืนยันแล้ว เราขอสงวนสิทธิ์ในการปฏิเสธคำขอยกเลิกทุกกรณี @else Due to the nature of our business, we reserve the right to refuse a cancellation request if your order has been confirmed. @endif 
                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th')6. ผู้เยี่ยมชม @else 6. VISITORS @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') เว็บไซต์อีทฟิตสามารถใช้ได้กับบุคคลที่มีอายุ 13 ปีขึ้นไปเท่านั้น หากผู้ใช้อายุมากกว่า 13 ปี แต่ต่ำกว่า 18 ปี ผู้ใช้ควรแจ้งข้อกำหนดเหล่านี้กับพ่อ แม่ หรือผู้ปกครอง เพื่อให้แน่ใจว่าผู้ใช้และพ่อ แม่ หรือผู้ปกครองของผู้ใช้ เข้าใจ และยอมรับข้อตกลงและเงื่อนไขเหล่านี้ @else Eatfit Website may only be used by individuals aged thirteen years or older. If the user is thirteen years or older but under the age of eighteen years, user should review these Terms with user’s parent or guardian to make sure the user and user’s parent or guardian understand and agree to these Terms.
                                    @endif
                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th')7. ทรัพย์สินทางปัญญา @else 7. INTELLECTUAL PROPERTY @endif</div>
                                <p>@if(Session::get('lang') == 'th') การยอมรับข้อกำหนดและเงื่อนไขเหล่านี้ แสดงว่าคุณรับทราบและยอมรับว่าเนื้อหาทั้งหมดที่นำเสนอต่อคุณบนเว็บไซต์นี้ ได้รับการคุ้มครองโดยลิขสิทธิ์เครื่องหมายการค้า เครื่องหมายบริการสิทธิบัตรหรือกรรมสิทธิ์ และกฎหมายอื่น ๆ และถือเป็นทรัพย์สินของเว็บไซต์อีทฟิตแต่เพียงผู้เดียว @else By accepting these T&C, you acknowledge and agree that all content presented to you on this Website is protected by copyrights, trademarks, service marks, patents or other proprietary rights and laws, and is the sole property of eatfit Website. @endif
</p>
                           <p>
                            @if(Session::get('lang') == 'th') คุณได้รับอนุญาตให้ใช้เนื้อหาตามที่ได้รับอนุญาตอย่างชัดเจน จากเราหรือผู้ให้บริการเนื้อหาบางรายการเท่านั้น ยกเว้นสำเนาเดียวที่จัดทำขึ้น เพื่อการใช้งานส่วนบุคคลเท่านั้น คุณไม่สามารถคัดลอก ทำซ้ำ แก้ไข เผยแพร่ อัปโหลดโพสต์ ส่ง หรือแจกจ่ายเอกสารหรือข้อมูลใด ๆ จากเว็บไซต์นี้ในรูปแบบใด ๆ หรือด้วยวิธีการใด ๆ โดยไม่ได้รับอนุญาตเป็นลายลักษณ์อักษรล่วงหน้าจากเรา @else You are only permitted to use the content as expressly authorized by us or the specific content provider. Except for a single copy made for personal use only, you may not copy, reproduce, modify, republish, upload, post, transmit, or distribute any documents or information from this Website in any form or by any means without prior written permission from us or the specific content provider, and you are solely responsible for obtaining permission before reusing any copyrighted material that is available on this Website. @endif
                           </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 8. นโยบายความเป็นส่วนตัว @else 8. PRIVACY POLICY @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') เราให้ความสำคัญกับความปลอดภัย และความเป็นส่วนตัว โปรดอ่านนโยบายความเป็นส่วนตัว
                                    (คลิกที่นี่) การใช้งานเว็บไซต์อีทฟิต หมายความว่าคุณยอมรับการผูกมัดตามนโยบายความเป็นส่วนตัวของเรา ซึ่งรวมอยู่ในและเป็นส่วนหนึ่งของข้อกำหนดเหล่านี้
                                    @else We care about data privacy and security. Please review our Privacy Policy (<a data-fancybox data-src="#privacypolicy" href="javascript:;">CLICK HERE</a>). By using the eatfit Website, you agree to be bound by our Privacy Policy, which is incorporated into, and made part of these Terms. @endif
                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 9. การเชื่อมโยงกับเว็บไซต์อื่น @else 9. LINK TO THIRD PARTY WEBSITES @endif</div>
                                <p>@if(Session::get('lang') == 'th') เว็บไซต์นี้อาจเชื่อมโยงคุณไปยังไซต์อื่น ๆ บนอินเทอร์เน็ตหรือรวมถึงการอ้างอิงถึงข้อมูล เอกสาร
                                    ซอฟต์แวร์ เนื้อหา หรือบริการที่จัดหาโดยบุคคลอื่น เว็บไซต์เหล่านี้อาจมีข้อมูล หรือเนื้อหาที่อาจพบว่าไม่เหมาะสมหรือรุนแรง  เว็บไซต์และพันธมิตรอื่น ๆ เหล่านั้น ไม่ได้อยู่ภายใต้การควบคุมของเรา และคุณต้องรับทราบว่าเราไม่รับผิดชอบต่อความถูกต้อง ลิขสิทธิ์ ความชอบด้วยกฎหมาย ความเหมาะสมหรือแง่มุมอื่น ๆ ของเนื้อหาของไซต์ดังกล่าว และเราไม่รับผิดชอบต่อข้อผิดพลาด หรือการละเว้นในการอ้างอิงถึงบุคคลอื่นหรือผลิตภัณฑ์ และบริการของตน การเชื่อมโยงข้อมูลอ้างอิงดังกล่าว จัดทำขึ้นเพื่อความสะดวกเท่านั้น และไม่ได้หมายความถึงการรับรองหรือเชื่อมโยงกับเว็บไซต์ หรือการรับประกันใด ๆ ไม่ว่าโดยชัดแจ้งหรือโดยนัย @else
                                    This Website may link you to other sites on the Internet or otherwise include references to information, documents, software, materials and/or services provided by other parties. These websites may contain information or material that some people may find inappropriate or offensive.
These other websites and parties are not under our control, and you acknowledge that we are not responsible for the accuracy, copyright compliance, legality, decency, or any other aspect of the content of such sites, nor are we responsible for errors or omissions in any references to other parties or their products and services. The inclusion of such a link or reference is provided merely as a convenience and does not imply endorsement of, or association with, the Website or party by us, or any warranty of any kind, either express or implied. @endif
</p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 10. กฎหมายบังคับใช้ @else 10. APPLICABLE LAW @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') ข้อตกลงนี้จะอยู่ภายใต้และตีความตามกฎหมายของประเทศไทย คู่สัญญาจะต้องอยู่ภายใต้ 
                                    เขตอำนาจศาลเฉพาะของศาลประเทศไทย
                                    @else This Agreement shall be governed by and construed in accordance with the laws of Thailand. The parties hereto submit to the exclusive jurisdiction of the courts of Thailand.
                                    @endif
                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th')11. การปฏิเสธการรับผิดชอบ การประกัน และการชดใช้ค่าเสียหาย11. @else DISCLAIMER OF WARRANTIES, LIMITATIONS OF LIABILITY AND INDEMNIFICATION @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') การใช้งานเว็บไซต์อีทฟิต หมายความว่าคุณต้องรับความเสี่ยงที่อาจจะขึ้นแต่เพียงผู้เดียว เว็บไซต์อีทฟิตดำเนินการการบริการ และเนื้อหา “ตามสภาพ” และ “เท่าที่มี” เราขอปฏิเสธการรับประกันทุกประเภท ไม่ว่าโดยชัดแจ้งหรือโดยนัยอย่างไม่มีเงื่อนไข รวมถึงการไม่ละเมิดสิทธิ์ของคู่ค้าหรือบุคคลที่สาม และการใช้งานตามวัตถุประสงค์เฉพาะด้าน @else Your use of eatfit Website is at your sole risk. The Website is provided "as is" and "as available". We disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. @endif

                                </p>
                                <p>
                                    @if(Session::get('lang') == 'th') เราไม่รับผิดชอบต่อความเสียหายที่เกิดขึ้นโดยตรง หรือผลสืบเนื่องอันเกิดมาจากการใช้งานเว็บไซต์ของคุณ และคุณยอมรับข้อตกลงที่จะป้องกัน ชดใช้ และไม่ทำให้เราเกิดความเสียหาย จากการเรียกร้องความสูญเสียใด ๆ (ซึ่งรวมถึง แต่ไม่จำกัดเพียงค่าธรรมเนียมของทนายความเท่านั้น) ที่เกิดขึ้นจากการละเมิดสิทธิ์คู่ค้าหรือบุคคลที่สามของคุณ คุณต้องยอมรับว่าคุณถูกจำกัดสิทธิ์การเข้าถึง ไม่มีเอกสิทธิ์ และไม่สามารถถ่ายโอนสิทธิ์การใช้งานเว็บไซต์ได้ เนื่องจากเว็บไซต์ไม่มีข้อผิดพลาดหรือจุดบกพร่อง คุณยอมรับที่จะใช้งานเว็บไซต์อย่างระมัดระวัง และหลีกเลี่ยงการใช้งานในลักษณะที่จะทำให้เกิดความเสียทรัพย์สิน หรือข้อมูลของคุณและบุคคลที่สาม @else We are not liable for damages, direct or consequential, resulting from your use of the Website, and you agree to defend, indemnify and hold us harmless from any claims, losses, liability costs and expenses (including but not limites to attorney's fees) arising from your violation of any third-party's rights. You acknowledge that you have only a limited, non-exclusive, nontransferable license to use the Website. Because the Website is not error or bug free, you agree that you will use it carefully and avoid using it ways which might result in any loss of your or any third party's property or information. @endif

                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 12. ข้อกำหนดอื่น ๆ @else 12. OTHER PROVISIONS @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') 12.1. เราขอสงวนสิทธิ์ในการเปลี่ยนแปลง แก้ไข ระงับหรือยุติทั้งหมด หรือส่วนใดส่วนหนึ่งของไซต์นี้ หรือบริการได้ตลอดเวลา หรือเมื่อแจ้งให้ทราบล่วงหน้า ตามที่กฎหมายไทยกำหนด เราอาจดำเนินการการบริการบางประเภท หรือคุณลักษณะเหล่านั้นในเวอร์ชันเบต้า ซึ่งอาจจะส่งผลให้ทำงานไม่ถูกต้อง หรือในลักษณะเดียวกันกับเวอร์ชันล่าสุด และเราจะไม่รับผิดชอบในกรณีดังกล่าว นอกจากนี้ เรายังกำหนดข้อจำกัดสำหรับคุณสมบัติบางประการ หรือจำกัดการเข้าถึงเนื้อหาหรือบริการบางส่วนของไซต์ตามดุลยพินิจ โดยไม่ต้องแจ้งให้ทราบล่วงหน้า @else 12.1.  We reserves the right to change, modify, suspend or discontinue all or any part of this Site or the Services at any time or upon notice as required by Thai laws. We may release certain Services or their features in a beta version, which may not work correctly or in the same way the final version may work, and we shall not be held liable in such instances. We may also impose limits on certain features or restrict your access to parts of, or the entire, Site or Services in its sole discretion and without notice or liability. <br>
                                   12.2. We reserves the right to refuse to provide you access to the Site or Services or to allow you to open an Account for any reason. @endif


                                </p>
                            </div>
                            <div class="box_terms">
                                <div class="topic_termgreen">@if(Session::get('lang') == 'th') 13. ข้อมูลการติดต่อ @else 13. CONTACT INFORMATION @endif</div>
                                <p>
                                    @if(Session::get('lang') == 'th') หากมีคำถามหรือข้อสงสัยเกี่ยวกับข้อกำหนดและเงื่อนไข สามารถส่งถึงเราที่ customerrelation@gourmetprimo.com @else Questions about the T&C should be sent to us at customerrelation@gourmetprimo.com @endif
                                </p>
                            </div>
                        </div>
                    </div>
		        </div>
		    </div>
		</section>
		
		<div style="display: none;" id="privacypolicy">
             @include('frontend.layouts.inc_privacy')
        </div>
		
		@include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
		
	</div>

	
	

</body>

</html>
