@extends('adminMasterLayout')
@section('pageContent')

{{-- addUser --}}
<div id="addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ghi nhận lỗi vi phạm</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
      <form action="{{ url('addLoiViPham') }}" method="post">
        {{  csrf_field() }}
         @if(Session::has('listNhanVien'))
      <div class="form-group">

    <label for="tenNv">Tên nhân viên:</label>
    <select name="maNV" class="form-control">
    @foreach(Session::get('listNhanVien') as $nhanVien)
<option value="{{ $nhanVien->maNv }}">{{ $nhanVien->tenNv }}</option>
    @endforeach
  </select>
  </div>
  @endif
  <div class="form-group">
       <label for="loiViPham">Lỗi vi phạm:</label>
       <input type="text" name="LoiViPham" class="form-control">
  </div>  
 <div class="form-group">
       <label for="loiViPham">Trừ lương:</label>
       <input type="number" name="LuongBiTru" class="form-control" min="1">
  </div>  
 <div class="form-group">
       <label for="loiViPham">Thời gian vi phạm:</label>
       <input type="date" name="ThoiGianViPham" min="{{ date("Y-m-d") }}" class="form-control">
  </div>  
  
<div class="form-group">
   
    <input type="submit" class="form-control w3-btn" style="background-color:#4cffd9;" value="Thêm" >
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
                <h3>Quản lý vi phạm</h3>
              
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
                    <h2>Quản lý vi phạm</h2>
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
                   <h1 id="ttt"></h1>
                    <table id="dataViPham" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Mã NV</th>
                          <th>Lỗi vi phạm</th>
                          <th>Thời gian vi phạm</th>
                          <th>Lương bị trừ</th>
                         
          
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))

                       @foreach($listData as $nhanvien )

                        <tr>
                           @foreach($clList as $columm )
                  
        
                        <td>{{ $nhanvien->$columm  }}</td>
               
                           @endforeach

                    
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