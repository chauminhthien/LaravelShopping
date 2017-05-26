@extends('site.layout.index')

@section('title')
	Trang Chủ
@endsection

@section('content')
	<section class="container otherddetails">
    <div class="otherddetailspart">
      <div class="innerclass free">
        <h2>Free shipping</h2>
        All over in world over $200 </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass payment">
        <h2>Easy Payment</h2>
        Payment Gatway support </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass shipping">
        <h2>24hrs Shipping</h2>
        Free For UK Customers </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass choice">
        <h2>Over 5000 Choice</h2>
        50,000+ Products </div>
    </div>
  </section>
  <!-- Section End-->
  <!-- Featured Product-->
  @foreach($cate as $ca)
  		@if($ca->paren_id != 0)
		  <section id="featured" class="row mt40">
		    <div class="container">
		      <h1 class="heading1"><span class="maintext">{{$ca->name}}</span><span class="subtext"> {{$ca->name}}</span></h1>
		      <ul class="thumbnails">
				@foreach($product as $pro)
					@if($ca->id == $pro->id_cate)
			        <li class="span3">
			          <a class="prdocutname" href="chi-tiet/{{$pro->id}}/{{$pro->nameKhongDau}}.html">{{$pro->name}}</a>
			          <div class="thumbnail">
			            {{-- <span class="sale tooltip-test">Sale</span> --}}
			            <a href="chi-tiet/{{$pro->id}}/{{$pro->nameKhongDau}}.html"><img alt="" src="upload/product/{{$pro->hinh}}"></a>
			            <div class="pricetag">
			              <span class="spiral"></span><a href="mua-hang/{{$pro->id}}" class="productcart">ADD TO CART</a>
			              <div class="price">
			               
			                <div class="priceold">${{number_format($pro->gia)}}</div>
			              </div>
			            </div>
			          </div>
			        </li>
			        @endif
		        @endforeach
		      </ul>
		    </div>
		  </section>
	  	@endif
  @endforeach
 
@endsection