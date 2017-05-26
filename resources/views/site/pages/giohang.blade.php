@extends('site.layout.index')

@section('title')
	Giỏ Hàng 
@endsection

@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
          <form>
          @foreach($giohang as $gh)
            <tr>
              <td class="image"><a href="chi-tiet/{{$gh->id}}/{{$gh->options->nameKhongDau}}.html"><img title="{{$gh->name}}" alt="{{$gh->name}}" src="upload/product/{{$gh->options->hinh}}" height="50" width="50"></a></td>
              <td  class="name"><a href="#">{{$gh->name}}</a></td>
              <td class="quantity"><input id="{{$gh->rowId}}" type="text" size="1" value="{{$gh->qty}}" name="quantity[40]" class="span1">
               
               </td>
               <td class="total"> <a href="#" class="update" id="{{$gh->rowId}}"><img class="tooltip-test" data-original-title="Update" src="img/update.png" alt=""></a>
                <a href="xoa-san-pham/{{$gh->rowId}}"><img class="tooltip-test" data-original-title="Remove"  src="img/remove.png" alt=""></a></td>
             
               
              <td class="price">{{number_format($gh->price)}}đ</td>
              <td class="total">{{number_format(($gh->price) * $gh->qty)}}đ</td>
               
            </tr>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          @endforeach
          </form>
        </table>
      </div>
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
             
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{{$total}}đ</span></td>
              </tr>
            </table>

            <input type="submit" value="CheckOut" class="btn btn-orange pull-right">
            <input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10">
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
 
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','a.update', function(){
            var id = $(this).attr('id');
            var qty = $('#'+id).val();
            var token = $('input[name=_token]').val();
            if(qty <= 0){
              alert('Nhập Số Lớn Hơn 0');
            }else if(qty/1 == qty){
                 $.post(
                    'update-gio-hang',
                    {
                      id : id,
                      qty :qty,
                      _token : token
                    },function(data){
                      if(data.st == 1){
                        window.location.href = 'gio-hang.html';
                      }
                    },'json'
                  );
            }else{
              alert('Vui Lòng Nhập Số');
            }
        });
    });
  </script>
@endsection