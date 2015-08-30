    <script src="/js/all.js"></script>
    @if ( Config::get('app.debug') )
        <script>
            document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>');
        </script>
    @endif

    @yield('scripts')

    </body>
</html>