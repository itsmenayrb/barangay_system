<script type="text/javascript">
    $(function() {
      $('#attendanceSelector').change(function(){
        $('.btnAttendance').hide();
        $('#' + $(this).val()).show();
      });
    });
    $('#employeeTable').DataTable();
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
    $('#login-form').validate();
</script>