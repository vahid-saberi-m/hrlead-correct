<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

<div class="daterangepicker dropdown-menu ltr show-calendar opensleft"
     style="top: 565px; right: 25.5px; left: auto; display: block;">
    <div class="calendar left">
        <div class="daterangepicker_input"><input class="input-mini form-control active" type="text"
                                                  name="daterangepicker_start" value=""><i
                    class="fa fa-calendar glyphicon glyphicon-calendar"></i>
            <div class="calendar-time" style="display: none;">
                <div></div>
                <i class="fa fa-clock-o glyphicon glyphicon-time"></i></div>
        </div>
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                <tr>
                    <th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th>
                    <th colspan="5" class="month">Jan 2018</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Su</th>
                    <th>Mo</th>
                    <th>Tu</th>
                    <th>We</th>
                    <th>Th</th>
                    <th>Fr</th>
                    <th>Sa</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="weekend off available" data-title="r0c0">31</td>
                    <td class="available" data-title="r0c1">1</td>
                    <td class="available" data-title="r0c2">2</td>
                    <td class="available" data-title="r0c3">3</td>
                    <td class="available" data-title="r0c4">4</td>
                    <td class="available" data-title="r0c5">5</td>
                    <td class="weekend available" data-title="r0c6">6</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r1c0">7</td>
                    <td class="available" data-title="r1c1">8</td>
                    <td class="available" data-title="r1c2">9</td>
                    <td class="available" data-title="r1c3">10</td>
                    <td class="available" data-title="r1c4">11</td>
                    <td class="available" data-title="r1c5">12</td>
                    <td class="weekend available" data-title="r1c6">13</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r2c0">14</td>
                    <td class="available" data-title="r2c1">15</td>
                    <td class="available" data-title="r2c2">16</td>
                    <td class="available" data-title="r2c3">17</td>
                    <td class="available" data-title="r2c4">18</td>
                    <td class="available" data-title="r2c5">19</td>
                    <td class="weekend available" data-title="r2c6">20</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r3c0">21</td>
                    <td class="available" data-title="r3c1">22</td>
                    <td class="available" data-title="r3c2">23</td>
                    <td class="available" data-title="r3c3">24</td>
                    <td class="available" data-title="r3c4">25</td>
                    <td class="active start-date available" data-title="r3c5">26</td>
                    <td class="weekend in-range available" data-title="r3c6">27</td>
                </tr>
                <tr>
                    <td class="weekend in-range available" data-title="r4c0">28</td>
                    <td class="in-range available" data-title="r4c1">29</td>
                    <td class="in-range available" data-title="r4c2">30</td>
                    <td class="in-range available" data-title="r4c3">31</td>
                    <td class="off in-range available" data-title="r4c4">1</td>
                    <td class="off active end-date in-range available" data-title="r4c5">2</td>
                    <td class="weekend off available" data-title="r4c6">3</td>
                </tr>
                <tr>
                    <td class="weekend off available" data-title="r5c0">4</td>
                    <td class="off available" data-title="r5c1">5</td>
                    <td class="off available" data-title="r5c2">6</td>
                    <td class="off available" data-title="r5c3">7</td>
                    <td class="off available" data-title="r5c4">8</td>
                    <td class="off available" data-title="r5c5">9</td>
                    <td class="weekend off available" data-title="r5c6">10</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="calendar right">
        <div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end"
                                                  value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
            <div class="calendar-time" style="display: none;">
                <div></div>
                <i class="fa fa-clock-o glyphicon glyphicon-time"></i></div>
        </div>
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                <tr>
                    <th></th>
                    <th colspan="5" class="month">Feb 2018</th>
                    <th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                    </th>
                </tr>
                <tr>
                    <th>Su</th>
                    <th>Mo</th>
                    <th>Tu</th>
                    <th>We</th>
                    <th>Th</th>
                    <th>Fr</th>
                    <th>Sa</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="weekend off in-range available" data-title="r0c0">28</td>
                    <td class="off in-range available" data-title="r0c1">29</td>
                    <td class="off in-range available" data-title="r0c2">30</td>
                    <td class="off in-range available" data-title="r0c3">31</td>
                    <td class="in-range available" data-title="r0c4">1</td>
                    <td class="active end-date in-range available" data-title="r0c5">2</td>
                    <td class="weekend available" data-title="r0c6">3</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r1c0">4</td>
                    <td class="available" data-title="r1c1">5</td>
                    <td class="available" data-title="r1c2">6</td>
                    <td class="available" data-title="r1c3">7</td>
                    <td class="available" data-title="r1c4">8</td>
                    <td class="available" data-title="r1c5">9</td>
                    <td class="weekend available" data-title="r1c6">10</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r2c0">11</td>
                    <td class="available" data-title="r2c1">12</td>
                    <td class="available" data-title="r2c2">13</td>
                    <td class="available" data-title="r2c3">14</td>
                    <td class="available" data-title="r2c4">15</td>
                    <td class="available" data-title="r2c5">16</td>
                    <td class="weekend available" data-title="r2c6">17</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r3c0">18</td>
                    <td class="available" data-title="r3c1">19</td>
                    <td class="available" data-title="r3c2">20</td>
                    <td class="available" data-title="r3c3">21</td>
                    <td class="available" data-title="r3c4">22</td>
                    <td class="available" data-title="r3c5">23</td>
                    <td class="weekend available" data-title="r3c6">24</td>
                </tr>
                <tr>
                    <td class="weekend available" data-title="r4c0">25</td>
                    <td class="available" data-title="r4c1">26</td>
                    <td class="available" data-title="r4c2">27</td>
                    <td class="available" data-title="r4c3">28</td>
                    <td class="off available" data-title="r4c4">1</td>
                    <td class="off available" data-title="r4c5">2</td>
                    <td class="weekend off available" data-title="r4c6">3</td>
                </tr>
                <tr>
                    <td class="weekend off available" data-title="r5c0">4</td>
                    <td class="off available" data-title="r5c1">5</td>
                    <td class="off available" data-title="r5c2">6</td>
                    <td class="off available" data-title="r5c3">7</td>
                    <td class="off available" data-title="r5c4">8</td>
                    <td class="off available" data-title="r5c5">9</td>
                    <td class="weekend off available" data-title="r5c6">10</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ranges">
        <div class="range_inputs">
            <button class="applyBtn btn btn-sm btn-success" type="button">Apply</button>
            <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
        </div>
    </div>
</div>