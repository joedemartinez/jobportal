<!-- Scripts --> 
<script src="../assets/js/jquery-3.3.1.min.js"></script> 
<script src="../assets/js/jquery-migrate-3.0.0.min.js"></script> 
<script src="../assets/js/mmenu.min.js"></script> 
<script src="../assets/js/tippy.all.min.js"></script> 
<script src="../assets/js/simplebar.min.js"></script> 
<script src="../assets/js/bootstrap-slider.min.js"></script> 
<script src="../assets/js/bootstrap-select.min.js"></script> 
<script src="../assets/js/snackbar.js"></script> 
<script src="../assets/js/clipboard.min.js"></script> 
<script src="../assets/js/counterup.min.js"></script> 
<script src="../assets/js/magnific-popup.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/custom_jquery.js"></script> 
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/dataTables.buttons.min.js"></script>
<script src="../assets/js/buttons.html5.js"></script>
<script src="../assets/js/buttons.flash.min.js"></script>
<script src="../assets/js/jszip.min.js"></script>
<script src="../assets/js/pdfmake.min.js"></script>
<script src="../assets/js/vfs_fonts.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>


<!-- documentation: http://www.chartjs.org/docs/latest --> 
<script src="../assets/js/chart.min.js"></script>

<script type="text/javascript">
	// <!-- message fade out time -->
  $(function() {
    $(".notification:visible").fadeOut(20000);
  });

  //toggle password
    $(".toggle-password").click(function() {

      $(this).toggleClass("icon-feather-eye-off");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });

  //new and confirm password on popup
   $("#passwordrepeat").keyup(function( event ) {
    if( $('#passwordregister').val() != $('#passwordrepeat').val() ) {
      document.getElementById('passwordsuccess').style.display='none';
      document.getElementById('passworderror').style.display='block';
      document.getElementById('regisbtn').setAttribute("disabled", "true");
      event.preventDefault();

    }else if ($('#passwordregister').val() == "" && $('#passwordrepeat').val() == "") {
      document.getElementById('passworderror').style.display='none';
      document.getElementById('regisbtn').removeAttribute("disabled");
    }
    else{
      document.getElementById('passworderror').style.display='none';
      document.getElementById('passwordsuccess').style.display='block';
      document.getElementById('regisbtn').removeAttribute("disabled");
      event.preventDefault();
    }
  });

   //new and confirm password register page
   $("#passwordrepeat1").keyup(function( event ) {
    if( $('#passwordregister1').val() != $('#passwordrepeat1').val() ) {
      document.getElementById('passwordsuccess1').style.display='none';
      document.getElementById('passworderror1').style.display='block';
      document.getElementById('regisbtn1').setAttribute("disabled", "true");
      event.preventDefault();

    }else if ($('#passwordregister1').val() == "" && $('#passwordrepeat1').val() == "") {
      document.getElementById('passworderror1').style.display='none';
      document.getElementById('regisbtn1').removeAttribute("disabled");
    }
    else{
      document.getElementById('passworderror1').style.display='none';
      document.getElementById('passwordsuccess1').style.display='block';
      document.getElementById('regisbtn1').removeAttribute("disabled");
      event.preventDefault();
    }
  });


   //enableing all disabled fields
    $("#enableAll").click(function() {
      if ($('.readonlyField').attr('readonly')) {
        $('.readonlyField').attr('readonly', false);
        $('.readonlyBtn').attr('disabled', false);
        $('.displayNone').show();
      }else {
        $('.readonlyField').attr('readonly', true);
        $('.readonlyBtn').attr('disabled', true);
      }

      // if ($('.disabledField').attr('disabled')) {

      //   $('.disabledField').removeAttr('disabled');
      // }else {
      //   $('.disabledField').attr('disabled', true);
      // }

    });


    // validatePhone
    function validatePhone(event) {
    //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
    //event.which will return key for mouse events and other events like ctrl alt etc. 
    var key = window.event ? event.keyCode : event.which;

    if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
      // 8 means Backspace
      //46 means Delete
      // 37 means left arrow
      // 39 means right arrow
      return true;
    } else if( key < 48 || key > 57 ) {
      // 48-57 is 0-9 numbers on your keyboard.
      return false;
    } else return true;
  }

</script> 

<!-- aauto logout -->
<script>
  
setInterval(Check_user, 2000);

function Check_user(){
    $.ajax({
      url:'../Check_user.php',
      method:'POST',        
      data:'type=type',
      dataType: 'json',
      success:function(response){ 
        if(response) {
          if ("logout" in response) {
            alert("Auto logout in 10 secs - User Inactivity. Refresh page to cancel");
            setTimeout(function(){
                  window.location.assign("../process/logout.php");
              }, 10000);    
          }   
        }        
      }
   });
} 

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example2').DataTable({
       "scrollX": true,
       "scrollY": 400,
      "autoWidth": false,
      "sort": true,
      "select": true,
      'stateSave': true,
      dom: 'Bfrtip',
        lengthMenu: [
          [ 10, 25, 50, 100, 200, -1 ],
          [ '10 rows', '25 rows', '50 rows','100 rows','200 rows', 'Show all' ]
      ],
      buttons: [
          'pageLength','excel', 'pdf', 'print'
      ]
    })
  });
</script>
