<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="bk.png">
		<title>Add BookAuthors</title>
	</head>
	<body class="bar">
		<?php
		$con = mysqli_connect("localhost","root","daniel12031994","bookstore");
		if (mysqli_connect_errno($con)) {
			echo "Error";
		}
		if($_SERVER['REQUEST_METHOD'] == 'GET'){//Para cuando recargue la pagina y solo quiere refrescarlo o si quiere que pase algo cuando cargue la pagina para read 
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){//Para cuando recargue la pagina y le envia la data que ingreso el usuario para insert delete
			$query = "INSERT INTO bookauthors(idbook,idauthor) VALUES (".$_POST['libros'].",".$_POST['authors'].');';
			if(!mysqli_query($con,$query)){
				echo '<script>
						alert("El libro ya tiene a ese autor");
					  </script>';
			}
			/*else{
			echo '<script>
					var add = confirm("Desea Agregar mas autores a los libros?");
					if(!add){
						window.location.assign("index.html")
					}
				  </script>';
			}*/
		}
		echo '<div >'.'<a href="index.html"><button id="menu_bts_2">Home</button></a>'."</div>";
		echo '<form method="post">';
		echo '<div id ="add_books"><strong>Books</strong>';
		echo '<select id ="ab_fields" name="libros">';
		echo '<option>Seleccione una Opcion</option>';
		$query = "SELECT * FROM book";
		$result = mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($result)) {
			echo '<option value = "'.$row['idbook'].'">'.$row['namebook'].'</option>';
		}
		echo '</select>';
		echo "</div>";

		echo '<div id ="add_books_2"><strong>Authors</strong>';
		echo '<select id ="ab_fields" name="authors">';
		echo '<option>Seleccione una Opcion</option>';
		$query = "SELECT * FROM author";
		$result = mysqli_query($con,$query);
			while ($row=mysqli_fetch_array($result)) {
				echo '<option value = "'.$row['idauthor'].'">'.$row['nameauthor'].'</option>';
			}
		echo '</select>';
		echo "</div>";
		echo "<div>".'<input id="menu_bts_3" type="submit" name="save_button" value="Add BookAuthor" >'."</div>";
		echo '</form>';
		?>

	</body>
</html>