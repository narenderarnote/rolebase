<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  @include('common.head')
  </head>
<body>
  <div id="fh5co-wrapper">
  <div id="fh5co-page">
  <div id="fh5co-header">
    <header id="fh5co-header-section">
      @include('common.header')
    </header>
    
  </div>
  <!-- end:fh5co-header -->
   @yield('content')

  <footer id="footer" class="fh5co-bg-color">
    @include('common.footer')
  </footer>
 
  </div>
  <!-- END fh5co-page -->

  </div>
  <!-- END fh5co-wrapper -->
   @include('common.scripts')
  <!-- Javascripts -->
  </body>
</html>