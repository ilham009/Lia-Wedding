

<?php 
  include('includes/config.php');
    $qry = $conn->query("SELECT * FROM  item1 where id = ".$_GET['id'])->fetch_array();
?>

                              <?php
                                echo "
                                  <div class='modal fade' id='myModal'>
                                    <div class='modal-dialog' style='width: 900px'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <a href=''><i class='login_close fa fa-times' data-dismiss='modal'></i></a>
                                          <h4 class='modal-title'>$result['nama']</h4>
                                        </div>
                                        <div class='modal-body'>
                                          <p>$result['deskripsi']
                                        </div>
                                        <div class='modal-footer'>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>
                                ";
                              ?>