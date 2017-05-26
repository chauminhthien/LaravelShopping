<div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a class="active"  href="./">Home</a>
          </li>
          @foreach($cate as $ca)
              @if($ca->paren_id == 0)
                <li><a class=""  href="loai-san-pham/{{$ca->id}}/{{$ca->url}}.html">{{$ca->name}}</a>
                  <div>
                    <ul>
                        @foreach($cate as $ca2)
                          @if($ca->id == $ca2->paren_id)
                            <li><a href="san-pham/{{$ca2->id}}/{{$ca2->url}}.html">{{$ca2->name}}</a>
                          @endif
                        @endforeach
                      </li>
                    </ul>
                  </div>
                </li>
              @endif()
          @endforeach
          <li><a href="thong-tin-tai-khoang.html">My Account</a>
            <div>
              <ul>
                <li><a href="thong-tin-tai-khoang.html">My Account</a>
                </li>
                @if(!isset($user_site))
                  <li><a href="dang-nhap.html">Login</a>
                  </li>
                @else
                  <li><a href="dang-xuat.html">Đăng Xuất</a>
                  </li>
                @endif
              </ul>
            </div>
          </li>
          <li><a href="lien-he.html">Liên Hệ</a>
          </li>         
        </ul>
      </nav>
    </div>