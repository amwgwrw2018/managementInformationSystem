@extends('adminMasterLayout')
@section('pageContent')
<script type="text/javascript">
  function loadInfoByAjax(){


$.ajax({
    url:"{{ url('loadInfoByAjaxForLuong') }}",
   
    type: "POST",
   
     data: { maNv:$('#maNvHienTai').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {
var data=JSON.parse(response_data);
$('#luongThangInput').val(data[0]);
  
$( "#listViPham tbody" ).empty();

var count=0;
for(var i=0;i<data[1].length;i++){
  var row="<tr><td>"+data[1][i].maNV+"</td><td>"+data[1][i].LoiViPham+"</td><td>"+data[1][i].ThoiGianViPham+"</td><td>"+data[1][i].LuongBiTru+"</td></tr>";
  $('#listViPham tbody').append(row);
 count+=data[1][i].LuongBiTru;
}
$('#luongTru').val(count);



    }
 });
  }
</script>

<div id="themLuong" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm lương nhân sự</h4>
 <h1 id="ttt"></h1>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
      <form action="{{ url('xetLuong') }}" method="post">
        {{  csrf_field() }}
      <div class="form-group">
    @if(Session::has('listNhanVien'))
      <div class="form-group">
    <label for="maNv">Tên nhân sự:</label>


    <select name="maNv" class="form-control" onchange="loadInfoByAjax()" id="maNvHienTai">
    @foreach(Session::get('listNhanVien') as $nhanVien)
<option value="{{ $nhanVien->maNv }}">{{ $nhanVien->tenNv }}</option>
    @endforeach
  </select>
  </div>
  <div class="form-group">
     <label for="thang">Tháng trả lương:</label>
     <input type="text" name="thangTraLuong" class="form-control" value="{{ date('n') }}" readonly>
      <label for="thang">Năm trả lương:</label>
     <input type="text" name="namTraLuong"  class="form-control" value="{{ date('Y') }}" readonly>
  </div>

<div class="form-group">
  <label for="luongThang">Lương tháng cơ bản( VND ):</label>
  <input type="text" name="luongThang" class="form-control" value="" readonly id="luongThangInput">
</div>

<div class="form-group">
  <label for="luongThang">Lương trừ vi phạm( VND ):</label>
  <table id="listViPham" class="table table-bordered">
<thead>
      <tr>
      <th>Mã nv</th>
      <th>Lỗi vi phạm</th>
      <th>Ngày vi phạm</th>
      <th>Lương trừ</th>
    </tr>
</thead>
<tbody>
  
</tbody>
  </table>
  <label>Tổng Lương trừ:</label>
  <input type="text" name="luongTru" class="form-control" id="luongTru" readonly>
</div>

<div class="form-group">
  <label for="luongThang">Lương thưởng thêm (Nếu có):</label>
  <input type="number" name="luongThuongThem" class="form-control" min="0" value="0">
</div>

<div class="form-group">
   <label for="luongThang">Hình thức chi trả:</label>
 <select name="hinhThucChiTra" class="form-control">
   <option>ATM</option>
   <option>Tiền mặt</option>
 </select>
</div>

<div class="form-group">
  <label for="luongThang">Thời gian chi trả:</label>
  <input type="date" name="thoiGianChiTra" min="{{ date("Y-m-d") }}" max="{{ date("Y-m-t") }}"  class="form-control">
</div>


  @endif
  </div>

    
   
    
<div class="form-group">
   
    <input type="submit" class="form-control w3-btn" style="background-color:#4cffd9;" value="Xét lương" >
  </div>

      </form>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>


  </div>
</div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lương tháng nhân sự</h3>
                     <h5 id="tttt"></h5>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lương tháng nhân sự</h2>
                      <div id="tests"></div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   @if(Session::has('LuongError'))
                   <h2 style="color: red;">{{ Session::get('LuongError') }}</h2>
                   @endif
                    <table id="dataLuong" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                     
                          <th>Tên NV</th>
                                <th>Tháng trả lương</th>
                          <th>Lương Tháng</th>
                          <th>Lương thưởng thêm</th>
                          <th>Lương trừ</th>
                          <th>Tổng lương</th>
                          <th>Tình trạng chi trả</th>
                          <th>Hình thức chi trả</th>
                        <th>Thời gian chi trả</th>
                        <th>Tình trạng duyệt lương</th>
    
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))

                       @foreach($listData as $data )

                        <tr>
                        
                         
                              <td>{{ $data->tenNv  }}</td>
                    <td>{{ date('n-Y',strtotime($data->ThangTraLuong)) }}</td>
                      <td>{{ $data->LuongThang  }}</td>
                        <td>{{ $data->LuongThuongThem  }}</td>
<td>{{ $data->LuongBiTru  }}</td>

<td>{{ $data->LuongThang+$data->LuongThuongThem-$data->LuongBiTru }}</td>
<td>
  @if($data->TinhTrangChiTra==0)
  <span>Chưa</span>
<form action="{{ url('traLuong') }}" method="post">
 {{  csrf_field() }}
  <input type="hidden" name="maNV" value="{{ $data->maNV }}">
  <input type="hidden" name="ThangTraLuong" value="{{ $data->ThangTraLuong }}">
   <button type="submit" class="w3-btn w3-green">Đã trả lương</button>
</form>
@else
  <span>Rồi</span>
<form action="{{ url('hoanTacTraLuong') }}" method="post">
{{  csrf_field() }}
  <input type="hidden" name="maNV" value="{{ $data->maNV }}">
  <input type="hidden" name="ThangTraLuong" value="{{ $data->ThangTraLuong }}">
   <button type="submit" class="w3-btn w3-yellow">Hoàn tác</button>
</form>
@endif
</td>
<td>{{ $data->HinhThucChiTra }}</td>
<td>{{ $data->thoiGianDuocChiTra }}</td>
<td>
  @if($data->tinhTrangDuyetLuong==0)
 Chưa
  @else
  Rồi
  @endif

</td>
                 
                   </tr>

                 @endforeach
                 
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              

              

          
            </div>
          </div>
        </div>
        <!-- /page content -->

       @endsection