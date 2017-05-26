@extends('site.layout.index')

@section('title')
	{{$catesp->name}}
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
        <li class="active">{{$catesp->name}}</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
             	@foreach($cate as $ca2)
	              @if($ca2->paren_id != 0)
	                <li><a href="san-pham/{{$ca2->id}}/{{$ca2->url}}.html">{{$ca2->name}}</a>
	              @endif
	            @endforeach
            </ul>
          </div>
         <!--  Best Seller -->  
          
          <!-- Latest Product -->  
          
          <!--  Must have -->  
         
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
					@foreach($product as $pro)
                    <li class="span3">
                      <a class="prdocutname" href="chi-tiet/{{$pro->id}}/{{$pro->nameKhongDau}}.html">{{$pro->name}}</a>
                      <div class="thumbnail">
                        <a href="chi-tiet/{{$pro->id}}/{{$pro->nameKhongDau}}.html"><img alt="" src="upload/product/{{$pro->hinh}}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="mua-hang/{{$pro->id}}" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="priceold">${{number_format($pro->gia)}}</div>
                          </div>
                        </div>
                      </div>
                    </li>
					@endforeach
                  </ul>

                  <div class="pagination pull-right">
                    <ul>
                      	{{$product->links()}}
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
 
@endsection