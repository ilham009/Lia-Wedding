

<?php
if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql = "SELECT * FROM member WHERE email='$email' AND password='$password' ";
    $query = mysqli_query($koneksidb,$sql);
    $results = mysqli_fetch_array($query);

    if(mysqli_num_rows($query)>0)
      {
  	   $_SESSION['ulogin']=$_POST['email'];
  	   $currentpage=$_SERVER['REQUEST_URI'];
  	   echo "<script type='text/javascript'> document.location = '$currentpage';
        alert('Login Berhasil'); 
         </script>";
	   } 
    else
      {
        echo "<script type='text/javascript'>;
        alert('Login Gagal'); 
         </script>";
      }
  }
?>
<body>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a class="login_close" href="#"><i class="fa fa-times" data-dismiss="modal" aria-label="Close"></i></a>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                </div>
                <div class="form-group">
                  <input id="myInput" type="password" class="form-control" name="password" placeholder="Password" ><br>
                  <a href="#"onclick="myFunction()"><i class="fa fa-eye"></i></a> Show Password
                  <script>
                    function myFunction() {
                      $(this).toggleClass("fa fa-times");
                      var x = document.getElementById("myInput");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                  </script>
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Belum punya akun? <a class="a_footer" href="regist.php">Daftar Disini</a></p>
      </div>
    </div>
  </div>
</div>