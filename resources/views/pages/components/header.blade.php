<div class="outer-container">

  <div class="bigger-header">

    <div> <!-- Questo div è header con logo/diventaHost/Login -->

      <span>
        <a href="{{route('homepage')}}">
          <img src="{{asset('storage/assets/lg_color0.png')}}" alt="logo-image">
        </a>
      </span>

      <span>
        <a href="{{route('register')}}">
          Diventa un host
        </a>

        <a href="{{route('login')}}">
          <i class="fas fa-bars"></i>
          <i class="fas fa-user"></i>
        </a>

      </span>

    </div>


    <div> <!-- INIZIO div in header con la navbar1 (width 100%)-->
      <div class="navbar1"> <!-- INIZIO Navbar1 (width 70%)-->

        <div>
          <a href="#">
            <h3>Dove</h3>
            <p>Dove vuoi andare?</p>
          </a>
        </div>

        <div>
          <a href="#">
            <h3>Check-In</h3>
            <p>Aggiungi data</p>
          </a>
        </div>

        <div>
          <a href="#">
            <h3>Check-Out</h3>
            <p>Aggiungi data</p>
          </a>
        </div>

        <div>

          <a href="#">
            <h3>Ospiti</h3>
            <p>Aggiungi ospiti</p>
          </a>

          <a href="#">
            <i class="fas fa-search"></i>
          </a>

        </div>

      </div> <!-- FINE Navbar1 (width 70%)-->

    </div> <!-- FINE div in header con la navbar1 (width 100%)-->

  </div> <!-- END OF BIGGER HEADER -->

</div> <!-- END OF OUTER CONTAINER -->
