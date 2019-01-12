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


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Duyệt nghỉ phép</h3>
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
                    <h2>Duyệt nghỉ phép</h2>
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
                   
                    <table id="dataDuyetNghiPhep" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                       
                          <th>Mã NV</th>
                                <th>Lý do nghỉ</th>
                          <th>Ngày xin nghỉ</th>
                          <th>Ngày làm trở lại</th>
                          <th>Tình trạng duyệt</th>
                          <th>Duyệt nghỉ phép</th>
                   
                 
                        </tr>
                      </thead>


                      <tbody>
                        @if(isset($data))

                       @foreach($data as $nghiphep )
<tr>
  <td>{{ $nghiphep->maNV }}</td>
<td>{{ $nghiphep->LyDoNghiPhep }}</td>
<td>{{ $nghiphep->ngayXinNghiPhep }}</td>
<td>{{ $nghiphep->ngayLamTroLai }}</td>


@if($nghiphep->tinhTrangDuyet==0)
  <td>Chưa</td>
@else
<td>Rồi</td>
@endif

<td>
  @if($nghiphep->tinhTrangDuyet==0)
  <form action=" {{ url('TienHanhduyetNghiPhep') }} " method="post">
    {{  csrf_field() }}
    <input type="hidden" name="maNV" value="{{ $nghiphep->maNV }}">
    <input  type="hidden" name="LyDoNghiPhep" value="{{ $nghiphep->LyDoNghiPhep }}">
    <input  type="hidden" name="ngayXinNghiPhep" value="{{ $nghiphep->ngayXinNghiPhep }}">
    <input  type="hidden" name="ngayLamTroLai" value="{{ $nghiphep->ngayLamTroLai }}">
    <button type="submit" class="w3-btn w3-green">Duyệt nghỉ phép</button>
  </form>
  @else
<p style="font-size: 15px;color: green;"><strong>Đã duyệt</strong></p>
   <form action=" {{ url('HoanTacduyetNghiPhep') }} " method="post">
    {{  csrf_field() }}
    <input type="hidden" name="maNV" value="{{ $nghiphep->maNV }}">
    <input  type="hidden" name="LyDoNghiPhep" value="{{ $nghiphep->LyDoNghiPhep }}">
    <input  type="hidden" name="ngayXinNghiPhep" value="{{ $nghiphep->ngayXinNghiPhep }}">
    <input  type="hidden" name="ngayLamTroLai" value="{{ $nghiphep->ngayLamTroLai }}">
    <button type="submit" class="w3-btn w3-yellow">Hoàn tác</button>
  </form>
  
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