
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('partials.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">


@include('partials.navbar')
  <!-- Main Sidebar Container -->
 @include('partials.aside')
@yield('content')



@include('partials.footer')
