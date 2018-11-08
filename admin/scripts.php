<!-- this page is of course is for 
javascripts or functions for admin -->
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
    $('#timesheetTable').DataTable({
        "scrollX" : true,
        "order": [[ 3, "desc" ],[ 6, "desc"]],
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', className: 'form-control btn btn-info' },
            { extend: 'excel', className: 'form-control btn btn-primary' },
            { extend: 'pdf', className: 'form-control btn btn-primary' },
            { extend: 'print', className: 'form-control btn btn-info' }
        ]
    });
    function validate(form){
        var officialOut = "<?php $officialOut; ?>";
        var timeOut = "<?php $date; ?>";


    }
</script>