<!DOCTYPE html>
<html lang="en">

    @include('layout.head')

    <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
        @include('layout.nav')


        @yield('content')

        @include('layout.footer')

        @include('layout.modal')

        @include('layout.script')

    </body>
</html>
