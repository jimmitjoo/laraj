<script src="/js/build.js"></script>
@if (Auth::check())
    <script src="/js/admin.js"></script>
@endif
@if ( Config::get('app.debug') )
    <script>
        document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>');
    </script>
@endif

@yield('scripts')

</body>
</html>