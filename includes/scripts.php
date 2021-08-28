<!-- Scripts --> 
<script src="assets/js/jquery-3.3.1.min.js"></script> 
<script src="assets/js/jquery-migrate-3.0.0.min.js"></script> 
<script src="assets/js/mmenu.min.js"></script> 
<script src="assets/js/tippy.all.min.js"></script> 
<script src="assets/js/simplebar.min.js"></script> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/bootstrap-select.min.js"></script> 
<script src="assets/js/snackbar.js"></script> 
<script src="assets/js/clipboard.min.js"></script> 
<script src="assets/js/counterup.min.js"></script> 
<script src="assets/js/magnific-popup.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/typed.js"></script>
<script src="assets/js/custom_jquery.js"></script>

<!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key --> 
<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script> 
<script src="assets/js/infobox.min.js"></script> 
<script src="assets/js/markerclusterer.js"></script> 
<script src="assets/js/maps.js"></script>

<script>
if ($('.utf-intro-banner-search-form-block')[0]) {
	setTimeout(function(){ 
		$(".pac-container").prependTo(".utf-intro-search-field-item.with-autocomplete");
	}, 300);
}
</script> 
<script>

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

    //if email exits
$('.emailregister').change(function(){  
     var email = $('.emailregister').val(); 
     if ($('#acctype').val() != '') {
      var acctype = $('#acctype').val();
    }else{
      var acctype = $('#acctype1').val();
    }
       
     if(email != '')  
     {  
      $.ajax({  
           url: 'process/checkEmail.php', 
           method:"POST",  
           data:{email:email, acctype:acctype},
           success:function(data){
            //if data is found in database
            if (data != null){
              $('.emailmessage').html(data);  
            }else{//else display nothing
              $('.emailmessage').html(data); 
            }
           }
      });  
     }  
});

</script>
<script type="text/javascript">
	// <!-- message fade out time -->
  $(function() {
    $(".notification:visible").fadeOut(20000);
  });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61267c91649e0a0a5cd2ed46/1fdv5d75i';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<!-- aauto logout -->
<script>  
setInterval(Check_user, 2000);

function Check_user(){
    $.ajax({
      url:'Check_user.php',
      method:'POST',        
      data:'type=type',
      dataType: 'json',
      success:function(response){ 
        if(response) {
          if ("logout" in response) {
            alert("Auto logout in 10 secs - User Inactivity. Refresh page to cancel");
            setTimeout(function(){
                  window.location.assign("process/logout.php");
              }, 10000);    
          }   
        }        
      }
   });
} 

</script>