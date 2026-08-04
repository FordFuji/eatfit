<!doctype html>
<html>

<head>
	<?php require('inc_head.php'); ?>
</head>

<body>

	<div class="container-fluid footer_notop">
	
		<?php require('inc_menu.php'); ?>

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="cart.php">My Cart</a> <span><i class="fas fa-chevron-right"></i></span>  <div>Shipping</div>
                 </div>
		    </div>
		</section>
		
		<section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="cart_bggreen_topic cart_bgyellow_topic">
                             <img src="images/icon_home-white.svg" alt=""> Shipping Address
                         </div>

                         <div class="box_cart_shipping">
                             <div class="cart_topic_shipping">your SHIPPING ADDRESS</div>
                             <div class="md-radio md-radio-inline box_shipping">
                                <input id="sameaddship" type="radio" name="ship01" rel="sameaddress">
                                <label for="sameaddship">Lalita Piboonkanarak</label>
                                <div class="cart_sameaddress">
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477
                                    </div>
                                    <div class="cart_iconedit"><a href="shipping_address.php"><i class="fas fa-edit"></i> Edit</a></div>
                                </div>
                            </div>
                            <div class="box_ship_nobg md-radio md-radio-inline box_shipping">
                                <div class="cart_btn_addnew">
                                    <input id="newaddship" type="radio" name="ship01" rel="w_getyourself">
                                    <label for="newaddship"><i class="fas fa-plus"></i> Add New Address</label>
                                </div>
                            </div>
                            <div class="w_getyourself">
                                <form class="form_cartlogin">
                                    <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Name</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Family Name</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <label><span>*</span> Date of Birth</label>
                                             <div class="row">
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg">
                                                          <option>Day</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg">
                                                          <option>Month</option>
                                                           <option value="January">January</option>
                                                            <option value="Febuary">Febuary</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
                                                         <select class="form-control form-control-lg">
                                                      <option>Year</option>
                                                       <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                        <option value="1969">1969</option>
                                                        <option value="1968">1968</option>
                                                        <option value="1967">1967</option>
                                                        <option value="1966">1966</option>
                                                        <option value="1965">1965</option>
                                                        <option value="1964">1964</option>
                                                        <option value="1963">1963</option>
                                                        <option value="1962">1962</option>
                                                        <option value="1961">1961</option>
                                                        <option value="1960">1960</option>
                                                        <option value="1959">1959</option>
                                                        <option value="1958">1958</option>
                                                        <option value="1957">1957</option>
                                                        <option value="1956">1956</option>
                                                        <option value="1955">1955</option>
                                                        <option value="1954">1954</option>
                                                        <option value="1953">1953</option>
                                                        <option value="1952">1952</option>
                                                        <option value="1951">1951</option>
                                                        <option value="1950">1950</option>
                                                        <option value="1949">1949</option>
                                                        <option value="1948">1948</option>
                                                        <option value="1947">1947</option>
                                                        <option value="1946">1946</option>
                                                        <option value="1945">1945</option>
                                                        <option value="1944">1944</option>
                                                        <option value="1943">1943</option>
                                                        <option value="1942">1942</option>
                                                        <option value="1941">1941</option>
                                                        <option value="1940">1940</option>
                                                        <option value="1939">1939</option>
                                                        <option value="1938">1938</option>
                                                        <option value="1937">1937</option>
                                                        <option value="1936">1936</option>
                                                        <option value="1935">1935</option>
                                                        <option value="1934">1934</option>
                                                        <option value="1933">1933</option>
                                                        <option value="1932">1932</option>
                                                        <option value="1931">1931</option>
                                                        <option value="1930">1930</option>
                                                    </select>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Email Address</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Phone Number</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Province</label>
                                                 <select class="form-control form-control-lg">
                                                    <option value="">Please Select</option>
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Distric</label>
                                                 <select class="form-control form-control-lg">
                                                    <option value="">Please Select</option>
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Sub Distric</label>
                                                 <select class="form-control form-control-lg">
                                                    <option value="">Please Select</option>
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Postcode </label>
                                                 <input class="form-control form-control-lg">
                                             </div>
                                         </div>
                                     </div>
                                </form>
                            </div>
                         </div>

                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bgpink">Billing Address</div>
                             <div class="box_bill_nobg md-radio md-radio-inline box_billing">
                                <input id="sameaddbill" type="radio" name="billaddress" rel="sameaddress">
                                <label for="sameaddbill">Same address as shipping address</label>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_billing">
                                <input id="newaddbill" type="radio" name="billaddress" rel="w_newbilling">
                                <label for="newaddbill">New Address</label>
                            </div>
                            <div class="w_newbilling">
                                <form class="form_cartlogin">
                                    <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Name</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                <label><span>*</span> Family Name</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Email Address</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label><span>*</span> Phone Number</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12">
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control form-control-lg">
                                              </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Province</label>
                                                 <select class="form-control form-control-lg">
                                                    <option value="">Please Select</option>
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Distric</label>
                                                 <select class="form-control form-control-lg">
                                                    <option value="">Please Select</option>
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Sub Distric</label>
                                                 <select class="form-control form-control-lg">
                                                    <option value="">Please Select</option>
                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                 <label>Postcode </label>
                                                 <input class="form-control form-control-lg">
                                             </div>
                                         </div>
                                     </div>
                                </form>
                            </div>
                         </div>

                         <div class="box_billingaddress">
                             <div class="bg_topic_cartinside cart_bggreen">Shipping Delivery</div>
                             <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="nextday" type="radio" name="shipdelivery" rel="w_nextday">
                                <label for="nextday">Next day</label>
                            </div>
                            <div class="w_nextday w_shipdelivery">
                                <div class="cart_topic_shipping">Time of Delivery</div>
                                <div class="box_timedelivery">
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time01" type="radio" name="timedelivery">
                                        <label for="time01">10:00 – 12:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time02" type="radio" name="timedelivery">
                                        <label for="time02">14:00 – 16:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time03" type="radio" name="timedelivery">
                                        <label for="time03">16:00 – 20:00</label>
                                    </div>
                                </div>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="otherdelivery" type="radio" name="shipdelivery" rel="w_delivery">
                                <label for="otherdelivery">Other</label>
                            </div>
                            <div class="w_delivery w_shipdelivery">
                                <div class="cart_topic_shipping">please select date</div>
                                <div class="form-group frm_date">
                                    <div class="input-group date">
                                      <input type="text" class="form-control" placeholder="วว/ดด/ปป"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                  </div>
                                  <div class="cart_topic_shipping">Time of Delivery</div>
                                  <div class="box_timedelivery">
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time01-1" type="radio" name="timedelivery">
                                        <label for="time01-1">10:00 – 12:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time01-2" type="radio" name="timedelivery">
                                        <label for="time01-2">14:00 – 16:00</label>
                                    </div>
                                    <div class="box_bill_nobg md-radio md-radio-inline">
                                        <input id="time01-3" type="radio" name="timedelivery">
                                        <label for="time01-3">16:00 – 20:00</label>
                                    </div>
                                </div>
                            </div>
                         </div>

                    </div>
                
                <div class="col-12 col-lg-5">
                    <?php require('inc_summarycart.php'); ?>
                </div>
                
                </div>
                
                <div class="col-12">
                    <div class="cart_boxborder_btn">
                      <div class="row">
                          <div class="col-12 col-lg-5 col-xl-7"></div>
                          <div class="col-12 col-lg-7 col-xl-5">
                              <div class="row box_btncart_a">
                                  <div class="col-7 col-sm-6">
                                       <a href="cart.php" class="btn_default btn_brown">back</a>
                                  </div>
                                  <div class="col-5 col-sm-6">
                                      <a href="cart-payment.php" class="btn_default btn_green">continue</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
		</section>
		
		
		<?php require('inc_footer.php'); ?>
		<?php require('scriptjs.php'); ?>
		
	</div>

	
	

</body>

</html>
