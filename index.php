<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hall Management System</title>

  <?php
  session_start();
  if (!isset($_SESSION['login_id']))
    header('location:login.php');
  include('./header.php');
  ?>

</head>
<style>
  body {
    background: #80808045;
  }

  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }

  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }

  div#confirm_modal {
    z-index: 9991;
  }
</style>

<body>
  <?php include 'topbar.php' ?>
  <?php include 'navbar.php' ?>
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <main id="view-panel">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include $page . '.php' ?>


  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uni_modal2" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div id="GFG">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body">
          </div>
        </div>
        <div id="btnf" class="modal-footer">
          <button type="button" class="btn btn-success" id='submit' onclick="printDiv()">Print</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uni_modal3" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="container-fluid" style="background-color:#8773c1 !important;padding-top: 0.5rem !important;">
      <div class="row">
        <div class="ml-auto col-lg-4 col-md-5">
          <p class="copyright-text">Copyright &copy; 2021 VES
          </p>
        </div>
        <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
          <p><i class="fa fa-phone mr-1"></i>+92 333 2063683 | <i class="fab fa-whatsapp"></i>+971 555 996024</p>
        </div>

      </div>
    </div>
  </footer>
</body>
<script>
  function printDiv() {
    var divContents = document.getElementById("GFG").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<body> <h1>Print Report <br>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
  }
  window.start_load = function() {
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function() {
    $('#preloader2').fadeOut('fast', function() {
      $(this).remove();
    })
  }

  window.uni_modal = function($title = '', $url = '', $size = "") {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function(resp) {
        if (resp) {
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal .modal-dialog').addClass($size)
          } else {
            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal').modal({
            show: true,
            backdrop: 'static',
            keyboard: false,
            focus: true
          })
          end_load()
        }
      }
    })
  }
  window.uni_modal2 = function($title = '', $url = '', $size = "") {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function(resp) {
        if (resp) {
          $('#uni_modal2 .modal-title').html($title)
          $('#uni_modal2 .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal2 .modal-dialog').addClass($size)
          } else {
            $('#uni_modal2 .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal2').modal({
            show: true,
            backdrop: 'static',
            keyboard: false,
            focus: true
          })
          end_load()
        }
      }
    })
  }
  window.uni_modal3 = function($title = '', $url = '', $size = "") {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function(resp) {
        if (resp) {
          $('#uni_modal3 .modal-title').html($title)
          $('#uni_modal3 .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal3 .modal-dialog').addClass($size)
          } else {
            $('#uni_modal3 .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal3').modal({
            show: true,
            backdrop: 'static',
            keyboard: false,
            focus: true
          })
          end_load()
        }
      }
    })
  }
  window._conf = function($msg = '', $func = '', $params = []) {
    $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal({
      show: true,
      backdrop: 'static',
      keyboard: false,
      focus: true
    })
  }
  window.alert_toast = function($msg = 'TEST', $bg = 'success') {
    $('#alert_toast').removeClass('bg-success')
    $('#alert_toast').removeClass('bg-danger')
    $('#alert_toast').removeClass('bg-info')
    $('#alert_toast').removeClass('bg-warning')

    if ($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if ($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if ($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if ($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({
      delay: 3000
    }).toast('show');
  }
  $(document).ready(function() {
    $('#preloader').fadeOut('fast', function() {
      $(this).remove();
    })
  })
  $('.datetimepicker').datetimepicker({
    format: 'Y/m/d H:i',
    startDate: '+3d'
  })
  $('.select2').select2({
    placeholder: "Please select here",
    width: "100%"
  })
</script>

</html>