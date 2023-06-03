<div class="container">
    <div class="copyright">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">Sport-Website</a>, All Right Reserved.

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a class="border-bottom" href="#">InfoCentroid Software Solutions Pvt.ltd</a>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="footer-menu">
                    <a href="">Home</a>
                    <a href="">Cookies</a>
                    <a href="">Help</a>
                    <a href="">FQAs</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="{{asset('assets/plugins/jquery/jquery-3.7.0.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('front_assets/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('front_assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('front_assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('front_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('front_assets/js/main.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
 
 <script>
  $(document).ready(function () {
         $('#example1').DataTable({
        order: [[3, 'desc']],
    });
});

 </script>
 <script>
     $(document).ready(function() {
    // Hide all players initially
    $('#example tbody tr').show();
    // Handle click on exclude button
    $('.exclude-btn').click(function() {
      // Get the team names from the button's data attributes
      var team1 = $(this).data('team1');
      var team2 = $(this).data('team2');
      // Show only the players for the selected teams
      $('#example tbody tr').hide();
      $('#example tbody tr[data-team="' + team1 + '"], #example tbody tr[data-team="' + team2 + '"]').show();
    });
  });
 </script>

<script>

    function updatePlayer(event, field, id) {
        
    var newValue = event.target.innerText;
    $.ajax({
            url: '{{ url('/updatePlayer') }}',
            type: 'POST',
            data: {
                 id: id,
                 field: field,
                 value: newValue
            },
            success: function(response) {
                // Handle the success response
                console.log('Column updated successfully.');
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.error('An error occurred while updating the column.');
            }
        });


   
}

</script>
    

</body>

</html>