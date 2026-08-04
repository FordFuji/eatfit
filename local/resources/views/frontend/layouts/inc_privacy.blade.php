<style>
    .wrap_boxprivacy{
        width: 1000px;
        padding: 30px;
    }
    .topic_privacy{
        color: #91c019;
        font-size: 1.5rem;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    .topic_privacy2{
        font-weight: 500;
        text-decoration: underline;
        color: #000;
        margin: 20px 0 10px;
    }
    .btn_closeprivacy{
        margin: 30px 0;
        padding: 0 60px;
    }
</style>


<div class="wrap_boxprivacy">
    <div class="topic_privacy">@if(Session::get('lang') == 'th') นโยบายความเป็นส่วนตัว @else Privacy Policy @endif</div>
    <div class="topic_privacy2">@if(Session::get('lang') == 'th') บทนำ @else Introduction @endif</div>
    <p>
        @if(Session::get('lang') == 'th') 1. บริษัท กูร์เมท์ พรีโม่ จำกัด ("บริษัท กูร์เมท์ พรีโม่," “อีทฟิต,” "เรา” หรือ "พวกเรา") ซึ่งเป็น บริษัท ในเครือ (รวมเรียกว่า "กลุ่มบริษัท") มุ่งมั่นที่จะปกป้องความเป็นส่วนตัวของคุณ เรากำหนดแนวทางในการปกป้องข้อมูลส่วนบุคคลที่คุณให้ไว้ เมื่อเยี่ยมชมเว็บไซต์ของเรา เข้าถึงแอปพลิเคชันมือถือ หรือใช้ผลิตภัณฑ์และบริการของเรา @else 1. Gourmet Primo Co.,Ltd. (“Gourmet Primo Co.,Ltd.,” “eatfit,” “we,” or “us”) , its respective subsidiaries (collective referred to as “Group of Companies”) is committed to protecting your privacy. We established guidelines for protecting personal data that you provided us when you visit our website, access our mobile application or use our products and services. @endif
    </p>
    <div>
        @if(Session::get('lang') == 'th') นโยบายความเป็นส่วนตัวนี้ มีวัตถุประสงค์และครอบคลุม เพื่ออธิบายหลักปฏิบัติด้านความเป็นส่วนตัวของเรา ต่อไปนี้ @else This Privacy Policy is intended to explain our privacy practices and covers the following areas @endif: <br>
        @if(Session::get('lang') == 'th')
        <ul>
            <li>ประเภทของข้อมูลส่วนบุคคลที่เรารวบรวม</li>
            <li>เรารวบรวมข้อมูลส่วนบุคคลอย่างไร</li>
            <li>การรวบรวมข้อมูลส่วนบุคคล และการใช้งาน</li>
            <li>สิทธิ์ของคุณ และวิธีการติดต่อเรา</li>
            <li>การเชื่อมต่อไปยังเว็บไซต์ของบุคคลที่สาม</li>
            <li>การเปลี่ยนแปลงนโยบายความเป็นส่วนตัว
        </ul>
        @else 
        <ul>
            <li>Types of Personal Data We Collect</li>
            <li>How We Collect Personal Data</li>
            <li>Personal Information collected and usage</li>
            <li>Your Rights and How to Contact us</li>
            <li>Links to Third Parties’ Websites</li>
            <li>Changes to Privacy Policy</li>
        </ul>
        @endif
    </div>
    
    <div class="topic_privacy2">@if(Session::get('lang') == 'th') ประเภทของข้อมูลส่วนบุคคลที่เรารวบรวม @else Types of Personal Data We Collect @endif</div>
    <p>
        @if(Session::get('lang') == 'th') ประเภทของข้อมูลส่วนบุคคลที่เรารวบรวมจะแตกต่างกันไป ขึ้นอยู่กับสถานการณ์การรวบรวม และประเภทของบริการที่คุณร้องขอ เราจะรวบรวม และประมวลผลข้อมูลส่วนบุคคลทั้งหมด หรือบางส่วน เมื่อคุณลงทะเบียนกับเว็บไซต์อีทฟิต ต่อไปนี้ @else Types of personal data we collect will vary depending on the collection situation and types of services you request. We will collect and process all or some of the following personal data about you, when you register with eatfit Website @endif:
    </p>
    <p>
        @if(Session::get('lang') == 'th') 1. ข้อมูลประจำตัวส่วนบุคคล : เช่น ชื่อรู ปถ่าย เพศ วันเกิด ข้อมูลที่เกี่ยวข้องกับการระบุตัวบุคคล<br>
        2. ข้อมูลการติดต่อ : เช่น หมายเลขโทรศัพท์ ที่อยู่ และอีเมล<br>
        3. ข้อมูลการชำระเงิน : เช่น ข้อมูลใบแจ้งหนี้ ข้อมูลบัตรเครดิตหรือบัตรเดบิต และข้อมูลบัญชีธนาคาร<br>
        4. ข้อมูลเกี่ยวกับการเป็นสมาชิกอีทฟิตของคุณ: เช่น หมายเลขสมาชิก รายละเอียดการลงทะเบียน ( ชื่อผู้ใช้ และรายละเอียดการลงชื่อเข้าใช้ )<br>
        5. ข้อมูลเกี่ยวกับความสนใจและความชอบของคุณ: เราอาจรวบรวมข้อมูลเกี่ยวกับความสนใจและความชอบของคุณ ตามประสบการณ์ของคุณที่มีกับเรา รวมถึงสิ่งที่คุณใช้จ่าย จำนวนเงินที่คุณใช้จ่าย ความถี่ในการใช้จ่าย ในการวิจัยการตลาดและแบบสำรวจความพึงพอใจของลูกค้า:<br>
        6. ข้อมูลเกี่ยวกับการโต้ตอบของเรา: หากคุณติดต่อเรา เราจะเก็บบันทึกการติดต่อนั้น รวมถึงการโทรการสอบถาม จดหมาย หรือการโต้ตอบกับเราบนโซเชียลมีเดีย<br>
        7. การใช้งานเว็บไซต์ แอพพลิเคชัน หรือสื่อดิจิทัลอื่น ๆ: เมื่อคุณเยี่ยมชมเว็บไซต์ของเรา (www.eatfit.com) หรือระบบปฏิบัติการอุปกรณ์เคลื่อนที่ และประเภทเบราว์เซอร์ เราอาจรวบรวมข้อมูลการใช้งานออนไลน์ที่อยู่หมายเลขประจำเครื่อง (IP) โดยอัตโนมัติ, ข้อมูลตำแหน่ง, ประเภทเบราว์เซอร์, ระบบปฏิบัติการ, พฤติกรรมค้นหาสารสนเทศ, ระยะเวลาการใช้งาน, อ้างอิงเว็บไซต์, ความสนใจ และการใช้งานแอปพลิเคชัน ผ่านคุกกี้ และเทคโนโลยีการติดตามอื่น ๆ สำหรับข้อมูลเพิ่มเติม โปรดดูนโยบายคุกกี้ของเรา<br>
         @else 1. Personal Identification data: such as your name, photograph, gender, date of birth, relating to personal identification; <br>
        2. Contact information: such as address, telephone number, and email address; <br>
        3. Payment information: such as invoice information, credit or debit card information, and bank account information; <br>
        4. Information about your eatfit membership: such as your membership number, registration details (username & sign-in details), order amounts, the number of points, your tier, membership duration, interesting product and your accrual and redemption activities;<br>
        5. Information about your interest and preferences: we may collect information about your interest and preferences based on your previous experiences with us, including what you spend, how much you spend, how frequently you spend in our marketing research and customer satisfaction survey;<br>
        6. Information about our interactions: If you contact us, we will keep a record of that correspondence, including your calls, written queries or interactions with us on social media;<br>
        7. Website application and other digital media usage: When you visit our website (www.eatfit.com) or mobile-device operating system and browser type, we may automatically collect online use information, IP address, location data, browser type, operating system, web browsing behavior, duration of use, referring website, interest and application usage through cookies and other tracking technologies. For more information, please refer to our cookies policy.<br>
        @endif
    </p>
    
     <div class="topic_privacy2">@if(Session::get('lang') == 'th') เรารวบรวมข้อมูลส่วนบุคคลอย่างไร @else How We Collect Personal Data @endif</div>
     <p>
        @if(Session::get('lang') == 'th') เราอาจรวบรวมข้อมูลส่วนบุคคลของคุณ เมื่อคุณให้ข้อมูลส่วนตัวกับเรา หรือขอบริการผ่านเว็บไซต์ของเรา มือถือ ช่องทางอื่นใดที่เปิดเผยต่อสาธารณะ ตัวอย่างเช่น เราอาจรวบรวมข้อมูลเกี่ยวกับคุณที่โต้ตอบกับเราผ่านโซเชียลมีเดีย @else We may collect your personal data when you give us your personal data or request for service through our website, mobile, any other channels or publicly available; for example, we may collect information about you interact with us through social media. @endif
     </p>
      
     <div class="topic_privacy2">@if(Session::get('lang') == 'th') การรวบรวมข้อมูลส่วนบุคคล และการใช้งาน @else Personal Information collected and usage @endif</div>
     <p>
        @if(Session::get('lang') == 'th') เราอาจรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณ ด้วยวิธีต่อไปนี้ @else We may collect, use or disclose your personal information that in the following ways @endif:
     </p>
     <div>
         <ul>
             <li>
                 <p>@if(Session::get('lang') == 'th') เพื่อดำเนินการและจัดการ การซื้อ การใช้ผลิตภัณฑ์ และบริการของเรา @else To process and manage your purchase and use of our products and services @endif:</p>
                 @if(Session::get('lang') == 'th')
                 <ul>
                    <li>
                        เพื่อดำเนินการและจัดการ ผลิตภัณฑ์และบริการของเรา เช่น คำสั่งซื้อ การจอง การบริการจัดส่ง หรือบริการอื่น ๆ ที่เกี่ยวกับผ่านผลิตภัณฑ์
                    </li>
                    <li>เพื่อดำเนินการชำระเงิน และยืนยันตัวตนของคุณ</li>
                </ul>
                <p>
                    เราอาจถ่ายโอนข้อมูลส่วนบุคคลของคุณไปยังคู่ค้า พันธมิตร หรือผู้ประกอบการขนส่ง เพื่อประสานงาน และอำนวยความสะดวกในการจัดเตรียมคำสั่งซื้อของคุณ หากคุณต้องการความช่วยเหลือพิเศษ สำหรับอาหารเพื่อสุขภาพ (เช่น ความช่วยเหลือทางการแพทย์ หรือเกี่ยวกับอาหาร), เราอาจแบ่งปันข้อมูลส่วนบุคคล กับศูนย์การแพทย์โรงพยาบาล หรือคลินิก ที่ได้รับการรับรอง และผู้ให้บริการจัดเลี้ยงของเรา เพื่อให้ความช่วยเหลือดังกล่าว
                </p>
                 @else
                 <ul>
                     <li>
                         To process and manage our products and services such as to administer orders, reservations, delivery services or any other service provided through the products.
                     </li>
                     <li>To process payments and verify your identity.</li>
                 </ul>
                 <p>
                     We may transfer your personal data to our partners, alliances or transport operators to coordinate and facilitate your order arrangements. If you request special assistance for healthy meals (e.g. medical assistance or meal request), we may share personal data with medical centers, hospitals or certified clinics, and our catering service providers, to provide such assistance.
                 </p>
                 @endif
             </li>
             <li>
                 <p>@if(Session::get('lang') == 'th') เพื่อการปรับปรุงและปรับแต่งผลิตภัณฑ์และบริการของเรา @else To improve and personalize our products and services @endif:</p>
                 <p>
                    @if(Session::get('lang') == 'th')
                    เพื่อปรับปรุงและสร้างสรรค์ผลิตภัณฑ์และบริการของเรา เราอาจวิเคราะห์ข้อมูลที่คุณให้กับเรา ผ่านการสำรวจความพึงพอใจของลูกค้า หรือการวิจัยทางการตลาด (เช่น ใบสั่งซื้อก่อนหน้าของคุณ การตั้งค่าการสื่อสาร) และข้อมูลเกี่ยวกับการใช้งานเว็บไซต์ และแอปพลิเคชันมือถือของคุณ (เช่น ผลิตภัณฑ์และบริการที่คุณเรียกดู) เพื่อให้เข้าใจความต้องการ และความจำนงของคุณได้ดีขึ้น เราอาจปรับแต่งผลิตภัณฑ์และบริการของเรา ให้ตรงกับความสนใจ และความชอบของคุณมากขึ้น เราอาจแบ่งปันข้อมูลส่วนบุคคลของคุณกับพันธมิตรทางธุรกิจของเรา เช่น คู่ค้าด้านการจัดเลี้ยง พันธมิตร และผู้ประกอบการขนส่ง / จัดส่งอื่น ๆ เพื่อให้บุคคลที่สามดังกล่าว สามารถปรับปรุงและปรับแต่งบริการของพวกเขา ให้เหมาะกับคุณได้เช่นกัน
                    @else
                     To improve and innovate our products and services, we may analyze information you provide to us via customer satisfaction survey or marketing research (e.g. your previous purchase order, communication preferences) and information about your website and mobile application usage (e.g. products and services you browsed) to better understand your needs and desires. We may tailor our products and services to better match your interests and preferences. We may share your personal data with our business partners such as catering partner, alliances and other transport/delivery operators, so that such third parties may improve and personalize their services to you as well.
                    @endif
                 </p>
             </li>
             <li>
                 <p>@if(Session::get('lang') == 'th') เพื่อการสื่อสารกับคุณ @else To communicate with you @endif:</p>
                 @if(Session::get('lang') == 'th')
                 <ul>
                    <li>เพื่อให้บริการสนับสนุนลูกค้า เช่น การส่งคำสั่งซื้อ การอัปเดตสถานะ และการแจ้งเตือน</li>
                    <li>เพื่อตอบคำถามหรือข้อร้องเรียนของคุณ</li>
                    <li>เพื่อจัดการการคืนเงิน และการเรียกร้องสิทธิ์ใด ๆ (เช่น การเรียกร้องเกี่ยวกับสินค้า และความล่าช้าในการจัดส่ง)</li>
                 </ul>
                 @else
                 <ul>
                     <li>To provide customer support services such as sending you order updates status and notifications.</li>
                     <li>To responding to your questions or complaints.</li>
                     <li>To handling any refunds and claims (e.g. product claims and delivery delays).</li>
                 </ul>
                 @endif
             </li>
             <li>
                 <p>@if(Session::get('lang') == 'th') เพื่ออำนวยความสะดวกกับโปรแกรมสมาชิก @else To facilitate the membership program @endif:</p>
                 <p>
                    @if(Session::get('lang') == 'th') หากคุณเป็นสมาชิกของโปรแกรมอีทฟิต เราอาจประมวลผลข้อมูลส่วนบุคคลของคุณ เพื่อดำเนินการกับโปรแกรม เช่น ร่วมอีทฟิตกับเรา คุณอาจได้รับคะแนน และแลกรางวัลด้วยคะแนนของคุณ @else If you are a member of the eatfit program, we may process your personal data in order to operate the program e.g. eatfit with us, you may earn points and redeem awards with your points. @endif
                 </p>
             </li>
             <li>
                 <p>@if(Session::get('lang') == 'th') สิทธิ์ของคุณ และวิธีการติดต่อเรา @else For marketing @endif:</p>
                 @if(Session::get('lang') == 'th')
                 <ul>
                    <li>1. สิทธิ์ทั่วไปที่คุณสามารถร้องขอการเข้าถึง หรืออัปเดตและแก้ไขข้อมูลส่วนบุคคลของคุณ การต้องการการเข้าถึงข้อมูลส่วนบุคคลของคุณ หรือการแก้ไขข้อมูลต้องทำเป็นลายลักษณ์อักษร โปรดระบุชื่ออีเมล และหมายเลขสมาชิกหรือหมายเลขคำสั่งซื้อ เพื่อช่วยให้เราระบุข้อมูลของคุณได้ง่ายขึ้น</li>
                    <li>2. การไม่เข้าร่วมการตลาด</li>
                    <li>คุณมีสิทธิ์ที่จะเลือกไม่เข้าร่วมการสื่อสารการตลาดของเราได้ตลอดเวลา โดย</li>
                    <li>• ยกเลิกการสมัครรับข้อมูลจากรายชื่อผู้รับจดหมาย (เมล)</li>
                    <li>• แก้ไขการตั้งค่าบัญชีที่เกี่ยวข้อง เพื่อยกเลิกการสมัคร หรือ</li>
                    <li>• ส่งคำขอ”การไม่เข้าร่วม”ของคุณ ไปยังรายละเอียดการติดต่อที่ระบุไว้ในหัวข้อ "วิธีติดต่อเราด้านล่าง”</li>
                    <li>3. วิธีการติดต่อเรา</li>
                 @else
                 <ul>
                     <li>To provide you with updates and offers, where you have chosen to receive these.</li>
                     <li>
                         We may also use your personal data to market our products and services, and the products and services of our group companies and business partners such as catering partners, alliances and other transport/delivery operators.
                     </li>
                     <li>
                         We may send you marketing communications by post, email, SMS, phone and social media such as Facebook, Line, Instagram, Youtube, Twitter and Google HangOut. Where required by law, we will ask for your consent at the time we collect your data to conduct any of these types of marketing.
                     </li>
                     <li>
                         We will provide an option to unsubscribe or opt-out of further communication on any marketing communication sent to you or you may opt-out by contacting us as set out in “Your rights and how to contact us” section below.
                     </li>
                     <li>
                         We may share your personal data with our group companies and business partners such as catering partners, alliances, other transport/delivery operators, and social network providers, so they can send marketing communication which may be of interest to you.
                     </li>
                 </ul>
                 @endif
             </li>
             @if(Session::get('lang') != 'th')
             <li>
                 <p>To comply with legal or regulatory obligations:</p>
                 <p>
                     We may process your personal data to comply with our regulatory requirements or dialogue with regulators as applicable, which may include disclosing your personal data to third parties, the court service and/or regulators or law enforcement agencies in connection with enquiries, proceedings or investigations by such parties anywhere in the world or where compelled to do so. Where permitted, we will direct any such request to you or notify you before responding unless to do so would prejudice the prevention or detection of a crime.
                 </p>
             </li>
             <li>
                 <p>To ensure our websites and mobile application function properly:</p>
                 <p>
                     To ensure our online service including www.eatfitshop.com and the mobile application are available. We may process information about your web browser, your mobile application usage behavior, location data, IP address that are collected via cookies or similar tracking technologies to configure the best setting of our online services and to optimize user experience.
                 </p>
             </li>
             <li>
                 <p>To re-organize or make changes to our business:</p>
                 <p>
                     In the event that we: (i) are subject to negotiations for the sale of our business or part thereof to a third party; (ii) are sold to a third party; or (iii) undergo a re-organization, we may need to transfer some or all of your personal data to the relevant third party (or its advisors) as part of any due diligence process for the purpose of analyzing any proposed sale or re-organization. We may also need to transfer your personal information to that re-organized entity or third party after the sale or reorganization for them to use for the same purposes as set out in this Privacy Policy.
                 </p>
             </li>
             @endif
         </ul>
         @if(Session::get('lang') != 'th')
         <p>
             Please note that in addition to the disclosures we have identified above, we may disclose your personal data for the purposes set out above to service providers (e.g. IT operators, payment service providers, marketing agencies, catering service providers), contractors (e.g. call center), advisors (e.g. legal, financial, business or other advisors) and our affiliates that perform activities on our behalf, as well as our group companies.
         </p>
         @endif
     </div>
     @if(Session::get('lang') == 'th')
     
     <div class="topic_privacy2">หากคุณมีคำถามใด ๆ เกี่ยวกับนโยบายความเป็นส่วนตัวนี้โปรดติดต่อเราได้ที่</div>
     <div>
        สำนักงาน<br>
        บริษัท กูร์เมท์ พรีโม่<br> 
        เลขที่ 129 ถ. สุขาภิบาล 2 แขวงดอกไม้เขตประเวศกรุงเทพมหานคร 10250<br>
        หรืออีเมล์มาที่ customerrelation@gourmetprimo.com<br>
        การเชื่อมต่อไปยังเว็บไซต์ของบุคคลที่สาม
        เว็บไซต์และแอปพลิเคชันมือถือของเรา อาจมีลิงก์ไปยังเว็บไซต์ของบุคคลที่สาม นโยบายความเป็นส่วนตัวจะไม่ครอบคลุมและไม่มีผลบังคับใช้ หากคุณติดตามหรือเข้าลิงก์เหล่านี้ คุณควรมีการแจ้งเตือน เมื่อคุณออกจากไซต์ของเรา และอ่านคำชี้แจงสิทธิ์ส่วนบุคคลของเว็บไซต์อื่น ๆ เราไม่สามารถควบคุมข้อมูลส่วนบุคคลที่คุณส่งให้ หรือรับจากบุคคลที่สามเหล่านี้ได้
     </div>
     <div class="topic_privacy2">การเปลี่ยนแปลงนโยบายความเป็นส่วนตัว</div>
     <div>
        เราอาจแก้ไข และเปลี่ยนแปลงนโยบายความเป็นส่วนตัวนี้เป็นครั้งคราว เพื่อให้สอดคล้องกับการเปลี่ยนแปลงบริการ การดำเนินงานของเรา และกฎหมายที่เกี่ยวข้อง นโยบายความเป็นส่วนตัวฉบับล่าสุด จะประกาศบนเว็บไซต์ของเราที่<br> www.eatfitshop.com<br>
        นโยบายความเป็นส่วนตัวนี้ได้รับการปรับปรุงเมื่อวันที่ 1 ธันวาคม 2020        
     </div>
     @else
     <div class="topic_privacy2">Your Rights and How to Contact Us</div>
     <div>
          1. General rights <br>
         You can request an access or update and correct your personal data. The request for access to your personal data or data correction must be done in writing. Please provide your name, e-mail and member number or order number to help us identify your information more readily. <br>
         2. Opt-out of marketing <br>
         You have the right to opt-out of our marketing communications at any time by <br>
         <ul>
             <li>Unsubscribing from the mailing list;</li>
             <li>Editing the relevant account settings to unsubscribe; or</li>
             <li>Sending your opt-out request to the contact details set out in “How to contact us” section below.</li>
         </ul>
         3. How to contact us <br>
         If you have any questions in relation to this Privacy Policy, please contact us at: <br>
Privacy Office <br>
Gourmet Primo Co.,Ltd.,  <br>
129 Sukhapiban 2 Road, Dokmai, Prawet, Bangkok 10250 Thailand <br>
or email to customerrelation@gourmetprimo.com <br>

     </div>
     
     <div class="topic_privacy2">Links to Third Parties’ Websites</div>
     <p>
         Our website and mobile application may have links to the website of a third-party. If you follow these links, the Privacy Policy will not apply. You should remain alert when you leave our site and read the privacy statements of other websites. We have no control over Personal Data that you submit to or receive from these third parties.
     </p>
     
     <div class="topic_privacy2">Changes to Privacy Policy</div>
     <p>
         We may revise and change this Privacy Policy from time to time to align with any alterations of our service and operation, and to comply with the relevant law. The latest version of the policy will be announced on our website at www.eatfitshop.com
     </p>
     <p>
         This Privacy Policy has been updated on 01 December 2020
     </p>
     
     <a data-fancybox-close class="btn_closeprivacy btn_default btn_green">Close</a>
     @endif
</div>