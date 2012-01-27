<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.17.custom.css" />
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#buscar_users').autocomplete({
					source : 'busqueda.php',
					select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                '<strong>Nombre: </strong>' + ui.item.value + '<br/>'
                            );
                       });
                       $('#resultados').slideDown('slow')
				}});
			});
		</script>
        <title>JV Software | Tutorial 1</title>
    </head>
    <body>
        <div id="busqueda">
            <input type="text" id="buscar_usuario" name="buscar_usuario" />
        </div>
        <div id="resultados">

        </div>
    </body>