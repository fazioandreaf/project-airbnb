<div class="outer-container">

  <section class="bigger-header">

    <div> <!-- Questo div è header con logo/diventaHost/Login -->

      <span>
        <a href="{{route('homepage')}}">
          <img src="{{asset('storage/assets/lg_color0.png')}}" alt="logo-image">
        </a>
      </span>

      <span>
        <a href="{{route('register')}}">
          Diventa un host &#160; <!-- &#160; è lo spazio fra 'diventa un host' e 'login' -->
        </a>

        <a href="{{route('login')}}">
          <i class="fas fa-bars"></i>
          <i class="fas fa-user"></i>
        </a>

      </span>

    </div>


    <div> <!-- Questo div è header con la navbar1 -->
      <div class="navbar1">

        <div>
          DOVE
        </div>

        <div>
          CHECK-IN
        </div>

        <div>
          CHECK-OUT
        </div>

        <div>
          DOVE
        </div>

      </div>
    </div>

  </section> <!-- END OF BIGGER HEADER -->

</div> <!-- END OF OUTER CONTAINER -->
