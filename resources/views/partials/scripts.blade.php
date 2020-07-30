<!-- Scripts -->
<script src="{!! asset('main/js/jquery.min.js') !!}"></script> 
<script src="{!! asset('main/js/wow.min.js') !!}"></script> 
<script src="{!! asset('main/js/bootstrap.min.js') !!}"></script> 
<script src="{!! asset('main/js/slick.min.js') !!}"></script> 
<script src="{!! asset('main/js/jquery.li-scroller.1.0.js') !!}"></script> 
<script src="{!! asset('main/js/jquery.newsTicker.min.js') !!}"></script> 
<script src="{!! asset('main/js/jquery.fancybox.pack.js') !!}"></script> 
<script src="{!! asset('main/js/custom.js') !!}"></script>
<!--TinyMCE editor -->
<script src="https://cdn.tiny.cloud/1/k8jocthh3k544guzds894oh6v1tiwgk94d2ukps4av4a2ejn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
<script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            width: 900,
            height: 300,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      			'searchreplace wordcount visualblocks visualchars code fullscreen',
      			'insertdatetime media nonbreaking save table contextmenu directionality',
      			'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar: 'insertfile undo redo | stylesheet |formatselect | ' +
                'bold italic backcolor emoticons | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage|' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css',
        });
</script>
