</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/multiple-select.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->

<script>
  $(document).ready(function() {
    function load_unseen_notification(view = '') {
      $.ajax({
        url: "../controller/controllerNotification.php",
        method: "POST",
        data: {
          view: view
        },
        dataType: "json",
        success: function(data) {
          $('.dropdown-menu').html(data.notification);
          if (data.unseen_notification > 0) {
            $('.count').html(data.unseen_notification);
          }
        }
      });
    }
    load_unseen_notification();
    $('#notifFom').on('submit', function(event) {
      event.preventDefault();
      if ($('#sujet').val() != '' && $('#dateAvnt').val() != '') {
        var form_data = $(this).serialize();
        $.ajax({
          url: "../controller/controllerNotification.php",
          method: "POST",
          data: form_data,
          success: function() {
            $('#notifFom')[0].reset();
            load_unseen_notification();
          }
        })
      } else {
        alert("les Données sont pas entrées veuillet vérifié les champs");
      }
    });
    //Lorsqu on click on a affiche plus la notification
    $(document).on('click', '.dropdown-toggle', function() {
      $('.count').html('');
      load_unseen_notification('yes');
    })
    setInterval(function() {
      load_unseen_notification();
    }, 5000);

  });
</script>
</body>

</html>