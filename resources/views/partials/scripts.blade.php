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
CKEDITOR.replace( 'summary-ckeditor',{
    filebrowserUploadUrl: "{{route('admin.upload',['_token'=>csrf_token()])}}",
    filebrowserUploadMethod: 'form'
});
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
                    url: "http://localhost:8888/admin/tool/calculate-and-get-density",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/dist/jquery/1.12.0/jquery.min.js"></script>
<script>
    function initMap(){
        var myLatLng ={lat:1.286389, lng:36.817223};
        var map = new google.maps.Map(document.getElementById('map'),{
            center: myLatLng,
            zoom:4
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Google Maps',
            draggable: true
        });

        google.maps.addListener(marker,'dragend', function(marker){
            var latLng = marker.latLng;
            document.getElementById('lat-span').innerHTML = latLng.lat();
            document.getElementById('lon-span').innerHTML = latLng.lng();
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
@section('scripts')
    @yield('scripts')
@endsection







