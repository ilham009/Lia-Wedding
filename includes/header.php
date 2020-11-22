  <!-- Navigation -->
  <div class="top"></div>
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      
	  	  
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
		      <li><a href="index.php">Home</a></li>
          <li><a href="paket_pernikahan.php">Paket Pernikahan</a></li>
          <li><a href="riwayatsewa.php">Riwayat Sewa</a></li>
          <li><a href="contact-us.php">Hubungi Kami</a></li>
          
          <?php 

              if(strlen($_SESSION['ulogin'])==0)
                {  
                  ?>
                    <li><a href="#loginform"data-toggle="modal" data-dismiss="modal">Login</a></li>
                  <?php
                }
                else
                  { 
                    ?>
                      <li><a href="logout.php">Logout</a></li>
                    <?php
                  }
          ?>
        </ul>
      </div>
    </div>
  </nav>