<!-- this page is of course is for
javascripts or functions for admin -->
<script type="text/javascript">
    $('#appointmentRequestTable').DataTable();
    $('#registeredSubUserTable').DataTable();
    $('#registeredUserTable').DataTable();
    $('#timesheetTable').DataTable({
        "scrollX" : true,
        "pagingType": "full_numbers",
        order: [[ 3, 'desc'] , [ 6 , 'desc']],
        dom: 'Bfrtip',
        buttons : [
            { extend: 'pdf' , className: 'form-control btn btn-primary'},
            { extend: 'print', className: 'form-control btn btn-info'},
            { extend: 'excel', className: 'form-control btn btn-primary' },
            { extend: 'copy', className: 'form-control btn btn-info'}
        ]
    });
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