 <!-- jQuery (wajib untuk DataTables) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- DataTables CSS dan JS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

 <script>
   $(document).ready(function() {
     $('#datatable').DataTable({
       responsive: true
     });
   });

   (function() {
     'use strict';
     window.addEventListener('load', function() {
       var forms = document.getElementsByClassName('needs-validation');
       var validation = Array.prototype.filter.call(forms, function(form) {
         form.addEventListener('submit', function(event) {
           if (form.checkValidity() === false) {
             event.preventDefault();
             event.stopPropagation();
           }
           form.classList.add('was-validated');
         }, false);
       });
     }, false);
   })();
 </script>

 <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
 </div>
 </div>
 <script type="text/javascript" src="<?php echo base_url('theme'); ?>/assets/scripts/main.js"></script>
 </body>

 </html>