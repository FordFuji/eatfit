<!doctype html>
<html>

<head>
	@include('frontend.layouts.inc_head')
</head>

<body>

	<div class="container-fluid footer_notop">
	
        @include('frontend.layouts.inc_menu')

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> 
                     <a href="{{url('/myprofile')}}">@if(Session::get('lang') == 'th') สมาชิก @else Member @endif</a> <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') ที่อยู่การจัดส่ง และการออกบิล @else Shipping & Billing Address @endif</div>
                 </div>
		    </div>
		</section>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member_auto topicbar_member">@if(Session::get('lang') == 'th') ที่อยู่สำหรับจัดส่ง @else Shipping Address @endif <a href="{{url('/member_newaddress')}}" class="btn_white">+ @if(Session::get('lang') == 'th') เพิ่มที่อยู่ใหม่ @else Add New Address @endif</a></div>
                        <div>
                            @foreach ($address as $key => $item)
                                
                            
                            <div class="member_boxaddress">
                                <div class="topic_member_border">@if(Session::get('lang') == 'th') ที่อยู่ @else Address @endif {{$key+1}}
                                    <div class="box_selectaddress">
                                        <div class="control-group">
                                            <label class="control control--checkbox">
                                              <input type="checkbox"  value="{{$item->address_id}}"id="show_{{$item->address_id}}"
                                              onclick="show_(this.value)"
                                              {{$item->address_shipping == 1 ? 'checked' : ''}}/>
                                              <div class="control__indicator"></div>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="member_bggrey">
                                    <div class="membername">{{$member->member_name}} {{$member->member_family}}</div>
                                    <div>
                                        {{$item->address_no}}, {{$item->address_sub_distric}}, {{$item->address_distric}}, {{$item->address_province}} {{$item->address_postcode}}<br>
                                        @if(Session::get('lang') == 'th') อีเมล์ @else Email @endif :  {{$member->member_email}} <br>
                                        @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{$member->member_phone_number}} <br>
                                    </div>
                                    <div class="wrap_member_button">
                                        <a class="btn_member btn_edit_purple" href="{{url('/member_newaddressEdit',$item->address_id)}}">@if(Session::get('lang') == 'th') แก้ไข @else edit @endif</a> 

                                        <form id="del_{{$item->address_id}}"
                                            action="{{ url('/delADD', $item->address_id)}}"
                                            method="post">
                                            {{ csrf_field() }}
                                            <a 
                                            type="button"
                                                onclick="del({{$item->address_id}})"
                                                value="{{$item->address_id}}"
                                                class="btn_member btn_del_red">@if(Session::get('lang') == 'th') ลบ @else Delete @endif
                                            </a>
                                        </form>
                                        {{-- <button class="btn_member btn_del_red">delete</button> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="member_boxaddress">
                                <div class="topic_member_border">Address 2
                                    <div class="box_selectaddress">
                                        <div class="control-group">
                                            <label class="control control--checkbox">
                                              <input type="checkbox"/>
                                              <div class="control__indicator"></div>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="member_bggrey">
                                    <div class="membername">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477 <br>
                                    </div>
                                    <div class="wrap_member_button">
                                        <a class="btn_member btn_edit_purple" href="member_newaddress.php">edit</a> <button class="btn_member btn_del_red">delete</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        
                        
                        {{-- <div class="topicbar_member_auto topicbar_member">Billing Address <a href="member_newaddress.php" class="btn_white">+ Add New Address</a></div>
                        <div>
                            <div class="member_boxaddress">
                                <div class="topic_member_border">Address 1 
                                    <div class="box_selectaddress">
                                        <div class="control-group">
                                            <label class="control control--checkbox">
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="member_bggrey">
                                    <div class="membername">Lalita Piboonkanarak</div>
                                    <div>
                                        90/16 Sriayutthaya Road, Vachirapayabaan, Dusit, Bangkok 10300 <br>
                                        Email :  lalita@orange-thailand.com <br>
                                        Phone :  0879047477 <br>
                                    </div>
                                    <div class="wrap_member_button">
                                        <a class="btn_member btn_edit_purple" href="member_newaddress.php">edit</a> <button class="btn_member btn_del_red">delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
                    </div>
                </div>
            </div>
		</section>
		
		
		
        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
		
		<script>
            $(".menu_account_left > ul > li:nth-child(2) > a").addClass("here");
        </script>
		
	</div>
    <script>
        function show_(id) {
        // alert(id);
        var one = 0;
        if ($('#show_' + id).is(':checked')) {
            one = 1;
        } else {
            one = 0;
        }
        $.ajax({
            url: "{{url('/showADD')}}",
            type: 'get',
            dataType: "json",
            data: {
                id: id,
                one: one
            },
            success: function () {
                // alert('สวัสดี');
            }
        });
        window.location.reload(true);
    }
    function del(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        Swal.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ข้อมูลจะไม่สามารถกู้กลับมาได้อีก!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'NO...',
        }).then((result) => {
            if (result.value) {

                $("#del_" + id).submit();

                Swal.fire(
                    'ลบข้อมูลสำเร็จ!',
                    'ข้อมูลถูกลบออกจากระบบแล้ว',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'ยกเลิก',
                    'ยกเลิกการลบข้อมูล',
                    'error'
                )
            }
        })
    }
    </script>
	
	

</body>

</html>
