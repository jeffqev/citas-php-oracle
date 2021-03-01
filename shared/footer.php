	<footer class="footer">
      <div class="container">
        <span class="text-muted">Universidad Politecnica Salesiana</span>
      </div>
    </footer>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript">


$(document).ready(function(){
		$("#tblTest td:nth-child(5)").click(function(event){
			event.preventDefault();
			var $td= $(this).closest('tr').children('td');
			var ce= $td.eq(0).text();
			var no= $td.eq(1).text();
			var ed= $td.eq(2).text();
			var di= $td.eq(3).text();

		$('#nombree').val(no);
		$('#cedulae').val(ce);
		$('#direccione').val(di);
		$('#edade').val(ed);
	});

	$("#tblTest2 td:nth-child(3)").click(function(event){
		event.preventDefault();
		var $td= $(this).closest('tr').children('td');
		var ce= $td.eq(0).text();
		var no= $td.eq(1).text();
		var ed= $td.eq(2).text();
		var di= $td.eq(3).text();

	$('#nombree').val(no);
	$('#cedulae').val(ce);
	$('#direccione').val(di);
	$('#edade').val(ed);
});

$("#tblTest3 td:nth-child(4)").click(function(event){
	event.preventDefault();
	var $td= $(this).closest('tr').children('td');
	var ce= $td.eq(0).text();
	var no= $td.eq(1).text();
	var ed= $td.eq(2).text();
	var di= $td.eq(3).text();

$('#nombree').val(no);
$('#cedulae').val(ce);
$('#direccione').val(di);
$('#edade').val(ed);
});

	$("#tblTest td:nth-child(6)").click(function(event){
		event.preventDefault();
		var $td= $(this).closest('tr').children('td');
		var ce= $td.eq(0).text();
	$('#cedulaaa').val(ce);

});

$("#tblTest2 td:nth-child(4)").click(function(event){
	event.preventDefault();
	var $td= $(this).closest('tr').children('td');
	var ce= $td.eq(0).text();
$('#cedulaaa').val(ce);

});

$("#tblTest3 td:nth-child(5)").click(function(event){
	event.preventDefault();
	var $td= $(this).closest('tr').children('td');
	var ce= $td.eq(0).text();
$('#cedulaaa').val(ce);

});

$("#tblTest7 td:nth-child(7)").click(function(event){
	event.preventDefault();
	var $td= $(this).closest('tr').children('td');
	var ce= $td.eq(0).text();
$('#cedulaaa').val(ce);

});



});


	</script>
	</div>
  </body>
</html>
