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
		}
							echo '		<div>
		<ul class = "nav">
			<li>
				<a href="index.html">Home<span class = "flecha">&#9660</span></a>
			</li>
			<li>
				<a href="#">Books<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="book.php">Add Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Remove Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Book<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Authors<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="author.php">Add Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Remove Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Authors<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Book Authors<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="bookauthor.php">Add Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Remove Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Book Authors<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>	
			<li>
				<a href="#">Editorial<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="editorial.php">Add Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Remove Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Editorials<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>				
		</ul>
		</div>';
		echo '<form method="post">';
		echo '<div class="mb" id ="add_ba"><strong>Books</strong>';
		echo '<select class="mb" id ="aab_fields" name="libros" required>';
		echo '<option>Seleccione una Opcion</option>';
		$query = "SELECT * FROM book";
		$result = mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($result)) {
			echo '<option value = "'.$row['idbook'].'">'.$row['namebook'].'</option>';
		}
		echo '</select>';
		echo "</div>";

		echo '<div class="mb" id ="add_ba_2"><strong>Authors</strong>';
		echo '<select class="mb" id ="aab_fields_1" name="authors" required>';
		echo '<option>Seleccione una Opcion</option>';
		$query = "SELECT * FROM author";
		$result = mysqli_query($con,$query);
			while ($row=mysqli_fetch_array($result)) {
				echo '<option value = "'.$row['idauthor'].'">'.$row['nameauthor'].'</option>';
			}
		echo '</select>';
		echo "</div>";
		echo "<div>".'<input id="menu_bts_1" type="submit" name="save_button" value="Add BookAuthor" >'."</div>";
		echo '</form>';
		?>

	</body>
</html>