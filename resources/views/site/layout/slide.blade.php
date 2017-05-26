<section class="slider">
    <div class="container">
      <div class="flexslider" id="mainslider">
        <ul class="slides">
          @foreach($slide as $sl)
          <li>
            <img src="upload/slide/{{$sl->hinh}}" alt="" />
          </li>
          @endforeach
      </div>
    </div>
  </section>