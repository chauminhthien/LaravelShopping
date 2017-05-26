@extends('site.layout.index')

@section('title')
	{{$product->name}}
@endsection

@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="upload/product/{{$product->hinh}}">
                <img src="upload/product/{{$product->hinh}}" alt="" title="">
              </a>
          </ul>
          
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone">{{$product->name}}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>${{number_format($product->gia)}}</div>
              </div>
              <ul class="productpagecart">
                <li><a class="cart" href="mua-hang/{{$product->id}}">Add to Cart</a>
                </li>
              </ul>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Description</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    {!!$product->chiTiet!!}
                  </div>
                  
                  
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản Phẩm Liên Quan</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        @foreach($more as $mor)
          <li class="span3">
            <a class="prdocutname" href="chi-tiet/{{$mor->id}}/{{$mor->nameKhongDau}}.html">{{$mor->name}}</a>
            <div class="thumbnail">
              <a href="chi-tiet/{{$mor->id}}/{{$mor->nameKhongDau}}.html"><img alt="{{$mor->name}}" src="upload/product/{{$mor->hinh}}"></a>
              <div class="pricetag">
                <span class="spiral"></span><a href="mua-hang/{{$mor->id}}" class="productcart">ADD TO CART</a>
                <div class="price">
                  <div class="priceold">${{number_format($mor->gia)}}</div>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
</div>
 
@endsection