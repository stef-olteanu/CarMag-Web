<html>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>



<table id="angajati">
	<tr>
		<td>Nume</td>
		<td>Prenume</td>
		<td>Varsta</td>
		<td>Vechime</td>
		<td>Departament</td>
	</tr>
</table>


<script type="text/javascript">
	$.ajax({
		type: "GET",
		url: "angajati.xml",
		dataType: "xml",
		success: function(xml){
			$(xml).find('angajat').each(function(){
				var nume=$(this).find('nume').text();
				var prenume=$(this).find('prenume').text();
				var varsta=2019-$(this).find('an').text();
				var vechime=2019-$(this).find('an_angajare').text();
				var departament=$(this).find('departament').text();
				if(departament == "Logistica"){
					if(varsta >= 30){
						if(vechime >= 10){
							$('<tr></tr>').html('<th>' +nume+ '</th><td>' +prenume+ '</td><td>' +varsta+ '</td>'+ '</td><td>' +vechime+ '</td>'+ '</td><td>' +departament+ '</td>').appendTo('#angajati');
						}
					}
				}
				
			});
		}
	})
</script>

</html>

