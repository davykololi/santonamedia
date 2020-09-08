<!-- Scripts -->
<script src="{!! asset('main/js/jquery.min.js') !!}"></script> 
<script src="{!! asset('main/js/wow.min.js') !!}"></script> 
<script src="{!! asset('main/js/bootstrap.min.js') !!}"></script> 
<script src="{!! asset('main/js/slick.min.js') !!}"></script> 
<script src="{!! asset('main/js/jquery.li-scroller.1.0.js') !!}"></script> 
<script src="{!! asset('main/js/jquery.newsTicker.min.js') !!}"></script> 
<script src="{!! asset('main/js/jquery.fancybox.pack.js') !!}"></script> 
<script src="{!! asset('main/js/custom.js') !!}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor');
</script>

<script>
        $('#keywordDensityInputForm').on('submit', function (e) { // Listen for submit button click and form submission.
            e.preventDefault(); // Prevent the form from submitting
            let kdInput = $('#keywordDensityInput').val(); // Get the input
            if (kdInput !== "") { // If input is not empty.
			// Set CSRF token up with ajax.
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({ // Pass data to backend
                    type: "POST",
                    url: "admin/tool/calculate-and-get-density",
                    data: {'keywordInput': kdInput},
                    success: function (response) {
                        // On Success, build a data table with keyword and densities
                        if (response.length > 0) {
                            let html = "<table class='table'><tbody><thead>";
                            html += "<th>Keyword</th>";
                            html += "<th>Count</th>";
                            html += "<th>Density</th>";
                            html += "</thead><tbody>";

                            for (let i = 0; i < response.length; i++) {
                                html += "<tr><td>"+response[i].keyword+"</td>";
                                html += "<td>"+response[i].count+"</td>";
                                html += "<td>"+response[i].density+"%</td></tr>";
                            }

                            html += "</tbody></table>";

                            $('#keywordDensityInputForm').after(html); // Append the html table after the form.
                        }
                    },
                });
            }
        })
</script>






