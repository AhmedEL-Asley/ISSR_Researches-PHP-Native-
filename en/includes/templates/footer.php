      </div><!-- /.content-wrapper &copy; -->
      <footer class="main-footer" style="position: fixed;left: 0;right: 0;bottom: 0;">
        <div class="pull-right hidden-xs">
         <b>Version</b>  1.1.0
        </div>
        <div class="pull-left hidden-xs">
        <strong>Design and Development of Software Engineering Students ISSR <?php echo date("Y"); ?></strong>
        </div>
      </footer>
    </div><!-- ./wrapper -->
    <script>
$(document).ready(function(){

$('#department').selectpicker();

$('#subject').selectpicker();

load_data('department_data');

function load_data(type, department_id = '')
{
  var user = $('#user').val();
  $.ajax({
	url:"load_data.php",
	method:"POST",
	data:{type:type, user:user, department_id:department_id},
	dataType:"json",
	success:function(data)
	{
	  var html = '';
	  for(var count = 0; count < data.length; count++)
	  {
		html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
	  }
	  if(type == 'department_data')
	  {
		$('#department').html(html);
		$('#department').selectpicker('refresh');
	  }
	  else
	  {
    $('#subject').html(html);
		$('#subject').selectpicker('refresh');
	  }
	}
  })
}

$(document).on('change', '#department', function(){
  var department_id = $('#department').val();
  load_data('subject_data', department_id);
});

});
</script>
<script>

  $(document).ready( function () {
    $('#myTable').DataTable(); 
    $('#myTable_1').DataTable(); 
    $('#myTable_2').DataTable(); 
  } );
  $(".select").select2();
  
</script>

  </body>
</html>