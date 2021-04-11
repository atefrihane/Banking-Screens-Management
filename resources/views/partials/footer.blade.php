  <!-- Main Footer -->
  <footer class="main-footer">

    <!-- Default to the left -->
    <strong>Copyright &copy; {{now()->year}} <a href="/">Bos le Progres</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{mix('/js/app.js')}}"></script>
@livewireScripts
@stack('scripts')
</body>
</html>