<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý khách sạn</title>

    <!-- Bootstrap -->
    <link href="{{ asset('adminTemplate/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('adminTemplate/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('adminTemplate/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
   <link href="{{ asset('adminTemplate/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('adminTemplate/build/css/custom.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sendMessageButton.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
  
  #sendMessageForm{
    position: absolute;
    left: -50px;
    z-index: 9999;
    width: 300px;
    background-color: white;
    padding: 10px;
      border-bottom: 0 none;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.46);
  }
</style>
  </head>

  <body class="nav-md" 
  @if(isset($dataChart)&&isset($allRoom) ) onload="loadChart('{{ $dataChart }}','{{$allRoom->soLuongPhong}}')" @endif 
  @if(isset($dataReservedRoomChart) )   onload="loadReservedRoomChart('{{ $dataReservedRoomChart }}')"  @endif 
@if(isset($dataEmployeeChart) )   onload="loadEmployeeChart('{{ $dataEmployeeChart }}')"  @endif 
@if(isset($dataLuongTheoThangChart) )   onload="loadChiTraTheoThangChart('{{ $dataLuongTheoThangChart }}')"  @endif 
@if(isset($dataVPChart) )   onload="loadVPChart('{{ $dataVPChart }}')"  @endif 
@if(isset($dataKHTNangChart) )  onload="dataKHTNangChart('{{ $dataKHTNangChart }}')"  @endif   
@if(isset($dataDoanhThuChart) )  onload="dataDoanhThuChart('{{ $dataDoanhThuChart }}')"  @endif   
  >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
            
              @if(Session::has('currentUser'))

              <div class="profile_pic">
                <img src="{{ asset('image/'.Session::get('currentUser')->anhDaiDien) }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin Chào</span>
 
               <h2>{{ Session::get('currentUser')->name }}</h2>
              </div>
               @endif
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Thao tác</h3>
                <ul class="nav side-menu">
                   
      @if(Session::has('currentUserChucVu') && Session::get('currentUserChucVu')[0]->ChucVu==2 )
<!-- QUANLY -->
                  <li><a><i class="fa fa-male"></i>Quản lý nhân viên<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('quanly/nhanVien') }}">Danh Sách Nhân viên</a></li>
                    
                    </ul>
                  </li>
 
 <li><a href="{{ url('quanly/QuanLyDuyetLuong') }}"><i class="fa fa-money"></i>Duyệt lương</a>
                  
                  </li>
                   <li><a href="{{ url('duyetNghiPhep') }}"><i class="fa fa-money"></i>Duyệt ngày nghỉ phép</a>
                  
                  </li>

@elseif(Session::has('currentUserChucVu') && Session::get('currentUserChucVu')[0]->ChucVu==4 )
<!-- KE TOAN -->
  <li><a href="{{ url('quanly/QuanLyChiTraLuong') }}"><i class="fa fa-money"></i>Chi Trả Lương<span class="fa fa-chevron-down"></span></a>
                
                  </li>
                    <li><a href="{{ url('quanly/QuanLyViPham') }}"><i class="fa fa-cut"></i>Quản lý vi phạm<span class="fa fa-chevron-down"></span></a>
                
                  </li>
                 
@else
<!-- NHAN VIEN -->
 <li><a href="{{ url('quanly/quanLyDatPhong') }}"><i class="fa fa-home"></i>Đặt phòng</a>
       
                          <li><a><i class="fa fa-male"></i>Quản lý khách<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('quanly/khachhang') }}">Danh Sách Khách hàng</a></li>
                    
                    </ul>
                  </li>

     <li><a href="{{ url('quanly/benTrungGian') }}"><i class="fa fa-male"></i>Quản lý trung gian<span class="fa fa-chevron-down"></span></a>
                 
                  </li>

                   <li><a><i class="fa fa-home"></i>Quản lý phòng<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('quanly/phong') }}">Danh Sách Phòng</a></li>
                    
                    </ul>
                  </li>
 <li><a><i class="fa fa-coffee "></i>Quản lý dịch vụ<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('quanly/QuanLyDichVu') }}">Sử dụng dịch vụ</a></li>
                    
                    </ul>
                  </li>
                   <li><a href="{{ url('quanly/QuanLyHoaDon') }}"><i class="fa fa-money"></i>Quản lý hóa đơn<span class="fa fa-chevron-down"></span></a>
                   
                  </li>
                
                  @endif
                  @if(Session::has('currentUserChucVu') && (Session::get('currentUserChucVu')[0]->ChucVu==4 || Session::get('currentUserChucVu')[0]->ChucVu==2) )
                  <li><a><i class="fa fa-area-chart"></i>Thống kê<span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                      <li><a href="{{ url('thongKe/phong') }}">Phòng</a></li>
                       <li><a href="{{ url('thongKe/thongkeSoLuongDatPhong') }}">Đặt phòng</a></li>
                         <li><a href="{{ url('thongKe/thongkeNVtheoCV') }}">Nhân viên theo chức vụ</a></li>
                          <li><a href="{{ url('thongKe/thongKeLuongTraTheoThang') }}">Lương theo tháng</a></li>
                           <li><a href="{{ url('thongKe/thongkeSoLuongViPham') }}">Số lượng vi phạm</a></li>
                           <li><a href="{{ url('thongKe/thongkeKhachHangTiemNang') }}">Khách hàng thân thiết</a></li>
                        <li><a href="{{ url('thongKe/thongKeDoanhThu') }}">Doanh thu theo thời gian</a></li>
                        
                    </ul>
                  </li>
                    @endif
               <!--    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li> -->
          <!--         <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li> -->
                </ul>
               
                  <h3>Cá nhân</h3>
                <ul class="nav side-menu">
                   @if(Session::has('currentUser'))
                   <li><a href="{{ url('xemLuong/'.Session::get('currentUser')->maNv) }}"><i class="fa fa-money"></i>Xem lương<span class="fa fa-chevron-down"></span></a>
             
                  </li>
                  <li><a href="{{ url('xemNghiPhep') }}"><i class="fa fa-money"></i>Xem nghỉ phép<span class="fa fa-chevron-down"></span></a>
             
                  </li>
                    @endif
                </ul>
         
              </div>
        

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
           
            
             
            </div>

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">  @if(Session::has('currentUser'))
          
          
                    <img src="{{ asset('image/'.Session::get('currentUser')->anhDaiDien) }}" alt="">{{ Session::get('currentUser')->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                       @endif
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <!--  <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

     {{--            <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{ count(Session::get('listTinNhan')) }}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    @if(Session::has('listTinNhan'))
                      @foreach(Session::get('listTinNhan') as $tinNhan)
                    <li class="messageContent">
                      <a >
                        <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                        <span>
                          <span>{{ $tinNhan->tenNv}}</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                        {{ $tinNhan->noiDung }}
                        </span>
                        <input type="image"  src="{{ asset('icon/Xbutton.png') }}" width="30" height="30">
                      </a>
                      <!-- Trigger the modal with a button -->


                    </li>
                       @endforeach
                @endif
                 
              
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>



                  </ul>
                </li> --}}
               <li>
                   <a  data-toggle="modal" data-target="#nghiPhepForm">
                <span   >Nghỉ phép</span>
              </a>
                                                  <div id="nghiPhepForm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xin nghỉ phép</h4>
      </div>
      <div class="modal-body">
        <h2>Xin nghỉ phép</h2>
        <form action="{{ url('nghiPhep') }}" method="post">
          {{  csrf_field() }}
          <div class="form-group">
            <label>Nhập lý do nghỉ phép</label>
            <textarea name="LyDoNghiPhep" rows="12" class="form-control"></textarea>
          </div>
            <div class="form-group">
            <label>Nhập ngày bắt đầu nghỉ phép:</label>
            <input type="date" name="ngayXinNghiPhep" class="form-control" min="{{date('Y-m-d')}}">
          </div>
            <div class="form-group">
            <label>Nhập ngày đi làm trở lại:</label>
       <input type="date" name="ngayLamTroLai" class="form-control" min="{{date('Y-m-d')}}">
          </div>
            <input type="submit" value="Xác nhận" class="w3-btn w3-red">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
               </li>
              @if(Session::has('nghiPhepError'))
               <li >
                 <a style="color: red !important;"><strong >{{ Session::get('nghiPhepError') }}</strong></a>
               </li>
              @endif
          {{--         <li>
                    <a class="button  arrow sendMessage">Send Message</a>
                    @if(Session::has('listNhanVien'))
                  <div id="sendMessageForm">
                      <form action="{{ url('sendMessageControl') }}" method="post" >
                  {{ csrf_field() }}
                      <input type="hidden" name="maNvGui" value="{{Session::get('currentUser')->maNv}}">
                        <div class="form-group">
                          <label>Người nhận:</label>
                     <select name="maNvNhan" class="form-control" >
                       @foreach(Session::get('listNhanVien') as $nhanVien)
                       @if(Session::get('currentUser')->maNv==$nhanVien->maNv )
@continue;
                       @else
                       <option value="{{ $nhanVien->maNv }}">{{ $nhanVien->tenNv }}</option>
                       @endif
                       @endforeach
                     </select>
                       </div>
                          <div class="form-group">
                            <label>Nội dung:</label>
                     <textarea name="noiDung" class="form-control" rows="10"></textarea>
                      </div>
                     <input type="submit" name="Send" class="w3-button w3-red w3-hover-green" >
                    </form>
                  </div>
                    @endif
                  </li> --}}
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->
       

@yield('pageContent')

         <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('adminTemplate/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('adminTemplate/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminTemplate/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('adminTemplate/vendors/nprogress/nprogress.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminTemplate/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('adminTemplate/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminTemplate/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('adminTemplate/build/js/custom.min.js') }}"></script>
<script type="text/javascript">

function downloadCanvas(link,canvas) {
    document.getElementById(link).href = document.getElementById(canvas).toDataURL();
    document.getElementById(link).download = 'thongKe.png';
}

    $(document).ready(function() {
       $('#sendMessageForm').hide();
        $('.sendMessage').click(function(){
          $('#sendMessageForm').slideToggle(100);
        });
    $('#dataNhanVien').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<img src="{{ asset("icon/addUser.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                      $("#addUser").modal();
                }
            },
              {
                text: '<img src="{{ asset("icon/changeUser.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                      $("#changeUserInfo").modal();
                }
            }


        ]
    }
      );
   $('#dataViPham').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<img src="{{ asset("icon/addUser.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                      $("#addUser").modal();
                }
            }


        ]
    }
      );

        $('#dataPhong').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<img src="{{ asset("icon/addHouse.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                  $("#addRoom").modal();
                }
            },
              {
                text: '<img src="{{ asset("icon/changeHouse.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
            $("#changeRoomInfo").modal();
                }
              }
        ]
    }
      );
            $('#dataKhachHang').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
              {
                text: '<img src="{{ asset("icon/addCustomer.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                  $("#addCustomer").modal();
                }
            },
              {
                text: '<img src="{{ asset("icon/changeCustomer.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
            $("#changeCustomerInfo").modal();
                }
              }
        ]
    }
      );


            $('#dataBTG').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
              {
                text: '<img src="{{ asset("icon/addCustomer.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                  $("#addBTG").modal();
                }
            }
        ]
    }
      );


            $('#dataDatPhong').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
              {
                text: '<img src="{{ asset("icon/datPhong.png") }}"  width="50" height="50" />',
                action: function ( e, dt, node, config ) {
                  $("#reservation").modal();
                }
            }
        ]
    }
      );
   $('#dataLuong').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
              {
                text: '<img src="{{ asset("icon/moneyPlus.png") }}"  width="30" height="30" />',
                action: function ( e, dt, node, config ) {
                  $("#themLuong").modal();
                }
            }
        ]
    }
      );

      $('#dataDichVu').DataTable(
{
    "pageLength": 3,
        dom: 'Bfrtip',
        buttons: [
             {
                text: '<img src="{{ asset("icon/tea.png") }}"  width="30" height="30" />Add',
                action: function ( e, dt, node, config ) {
                  $("#themDV").modal();
                }
            },
              {
                text: '<img src="{{ asset("icon/tea.png") }}"  width="30" height="30" />Change',
                action: function ( e, dt, node, config ) {
                  $("#suaDV").modal();
                }
            }
        ]
    }
      );

      $('#dataQLDichVu').DataTable(
{
        dom: 'Bfrtip',
        buttons: [
                {
                text: '<img src="{{ asset("icon/mantea.png") }}"  width="30" height="30" />Add',
                action: function ( e, dt, node, config ) {
                  $("#themSDDV").modal();
                }
            }
        ]
    }
      );

            $('#dataDuyetNghiPhep').DataTable(

      );

       $('#dataXemLuong').DataTable();
       $('#dataHoaDon').DataTable();


            
} );
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
function loadChart(dataJsonType,maxphong){

  var dataJsonParse=JSON.parse(dataJsonType);

  
  new Chart(document.getElementById("RoomChart"), {
    type: 'pie',
    
    data: {
      labels: ["Số phòng Trống","Số phòng đã thuê"],
      datasets: [{
       
        backgroundColor: ["#3e95cd", "#8e5ea2"],
        data: [maxphong-dataJsonParse[0]['soLuongPhongThue'],dataJsonParse[0]['soLuongPhongThue']]
      }]
    },


    options: {

responsive: false,
      title: {
        display: true,
        text: 'Thống kê phòng trống'
      }
    }
});
}

 
 function loadReservedRoomChart(dataJsonType){
  var data=JSON.parse(dataJsonType);
var months=new Array();
var dataChart=new Array();
var color=new Array();
for (var i = 0; i <data.length; i++) {
  months[i]=data[data.length-i-1].month+"-"+data[data.length-i-1].year;
}
for (var i = 0; i <data.length; i++) {
  color[i]=getRandomColor();
}
for (var i = 0; i <data.length; i++) {
  dataChart[i]=data[data.length-i-1].soLuongDatPhong;
}
var ctx = document.getElementById("ReservedRoomChart");
ctx.height = 100;
   new Chart(document.getElementById("ReservedRoomChart"), {
    type: 'bar',
    
    data: {
      labels: months,
      datasets: [{
       
        backgroundColor: color,
        data: dataChart
      }]
    },


options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
  
 } 

 function loadVPChart(dataJsonType){
  var data=JSON.parse(dataJsonType);
var months=new Array();
var dataChart=new Array();
var color=new Array();
for (var i = 0; i <data.length; i++) {
  months[i]=data[data.length-i-1].month+"-"+data[data.length-i-1].year;
}
for (var i = 0; i <data.length; i++) {
  color[i]=getRandomColor();
}
for (var i = 0; i <data.length; i++) {
  dataChart[i]=data[data.length-i-1].soLuotViPham;
}
var ctx = document.getElementById("VPChart");
ctx.height = 100;
   new Chart(document.getElementById("VPChart"), {
    type: 'bar',
    
    data: {
      labels: months,
      datasets: [{
       
        backgroundColor: color,
        data: dataChart
      }]
    },


options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
  
 } 



 function loadEmployeeChart(dataJsonType){
  var data=JSON.parse(dataJsonType);
  var color=new Array();
var chucVu=new Array();
var soLuongNv=new Array();
for (var i = 0; i <data.length; i++) {
  color[i]=getRandomColor();
}
for (var i = 0; i <data.length; i++) {
  chucVu[i]=data[i]['tenGoiChucVu'];
}
for (var i = 0; i <data.length; i++) {
  soLuongNv[i]=data[i]['soLuongNv'];
}
    new Chart(document.getElementById("dataEmployeeChart"), {
    type: 'pie',
    
    data: {
      labels: chucVu,
      datasets: [{
       
        backgroundColor: color,
        data: soLuongNv
      }]
    },


   options: {
responsive: false,
      title: {
        display: true,
        text: 'Thống kê phòng trống'
      }
    }
});
 } 

 function loadChiTraTheoThangChart(dataJsonType){

  var data=JSON.parse(dataJsonType);
  
var dataLuong=new Array();
var dataThang=new Array();
var color=new Array();

for (var i = 0; i <data.length; i++) {
  color[i]=getRandomColor();
}
for (var i = 0; i <data.length; i++) {
  dataThang[i]=data[i].ThangTraLuong;
}
for (var i = 0; i <data.length; i++) {
  dataLuong[i]=data[i].luongThang;
}
var ctx = document.getElementById("ChiTraLuongTheoThangChart");
ctx.height = 100;
   new Chart(document.getElementById("ChiTraLuongTheoThangChart"), {
    type: 'bar',
    
    data: {
      labels: dataThang,
      datasets: [{
       
        backgroundColor: color,
        data: dataLuong
      }]
    },


  options:{ 
    
  }
});
  
 } 

 function dataKHTNangChart(dataJsonType){

    var data=JSON.parse(dataJsonType);
  
var dataSoLuong=new Array();
var dataMaKH=new Array();
var color=new Array();

for (var i = 0; i <data.length; i++) {
  color[i]=getRandomColor();
}
for (var i = 0; i <data.length; i++) {
  dataSoLuong[i]=data[i].soluongdatphong;
}
for (var i = 0; i <data.length; i++) {
  dataMaKH[i]=data[i].maKH;
}
var ctx = document.getElementById("KHTiemNangChart");
ctx.height = 100;
   new Chart(document.getElementById("KHTiemNangChart"), {
    type: 'bar',
    
    data: {
      labels: dataMaKH,
      datasets: [{
       
        backgroundColor: color,
        data: dataSoLuong
      }]
    },


options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});

 }

  function dataDoanhThuChart(dataJsonType){

    var data=JSON.parse(dataJsonType);
  
var dataDoanhThu=new Array();
var dataMonthYear=new Array();
var color=new Array();

for (var i = 0; i <data.length; i++) {
  color[i]=getRandomColor();
}
for (var i = 0; i <data.length; i++) {
  if(data[i].tongChiPhi==null){
     dataDoanhThu[i]=0;
  }else{
    dataDoanhThu[i]=data[i].tongChiPhi;
  }
  
}
for (var i = 0; i <data.length; i++) {
  dataMonthYear[i]=data[i].month+"-"+data[i].year;
}
var ctx = document.getElementById("DoanhThuChart");
ctx.height = 100;
   new Chart(document.getElementById("DoanhThuChart"), {
    type: 'bar',
    
    data: {
      labels: dataMonthYear,
      datasets: [{
       
        backgroundColor: color,
        data: dataDoanhThu
      }]
    },


options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});

 }




</script>



 
  </body>
</html>