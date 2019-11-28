{{ Html::script('public/plugin/bootstrap-4.3.1/dist/js/bootstrap.js') }}
{{ Html::script('public/plugin/fontawesome-free-5.9.0-web/js/all.js') }}

{{ Html::script('public/plugin/toastr/build/toastr.min.js') }}

<script type="text/javascript">
    // disable_inspect_element();

    function disable_inspect_element() {
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
        $(document).keydown(function (e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        });
    }

    footer_height();
    $(window).resize(function () {
        footer_height();
    });

    function footer_height() {
        let footer_height = $('footer').height();
        $('body').css('padding-bottom', footer_height);
    }
</script>

@yield('scripts')
