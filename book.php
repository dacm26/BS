<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Add Books</title>
		<link rel="shortcut icon" href="bk.png">
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<script type="text/javascript">
        function OnlyNumbers (event) {
            var keyCode = ('which' in event) ? event.which : event.keyCode;

            isNumeric = ((keyCode >= 48 && keyCode <= 57 ) ||
                        (keyCode >= 96  && keyCode <= 105 ) ||keyCode==8);
            modifiers = (event.altKey || event.ctrlKey || event.shiftKey);

            return !(isNumeric && modifiers) && isNumeric;
        }
    	</script>
    	<script type="text/javascript">
        function OnlyLeters (event) {
            var keyCode = ('which' in event) ? event.which : event.keyCode;

            isNumeric = ((keyCode >= 48  && keyCode <= 57 ) ||
                        (keyCode >= 96  && keyCode <= 105 ) ||keyCode==8 || keyCode == 32);
            modifiers = (event.altKey || event.ctrlKey || event.shiftKey);

            return (!(isNumeric && modifiers) && !isNumeric) || keyCode==8 || keyCode==32;
        }
    </script>
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
				$query = "INSERT INTO book(idbook,isbn,namebook,year,ideditorial) VALUES (".$_POST['id_book'].",'".$_POST['isbn_book']."','".$_POST['name_book']."',".$_POST['year_book'].','.$_POST['editorial'].');';
				if(!mysqli_query($con,$query)){
				echo '<script>
						alert("Ya hay libros con ese Id");
					  </script>';
				}
				else{
				echo '<script>
						var add = confirm("Desea Agregar autores a los libros?");
						if(add){
							window.location.assign("bookauthor.php")
						}
					  </script>';
				}
			}
			echo '<form method="post">';
			echo "<h2>Fill the next Fields:</h2>";
			echo "<div>"."<strong>Id</strong>".'<input type="text" name="id_book" placeholder="Book Id" onkeydown="return OnlyNumbers (event)" required >'."</div>";
			echo "<div>"."<strong>Name</strong>".'<input type="text" name="name_book" placeholder="Book Name" onkeydown="return OnlyLeters (event)" required >'."</div>";
			echo "<div>"."<strong>Year</strong>".'<input type="text" name="year_book" placeholder="Year" onkeydown="return OnlyNumbers (event)" required >'."</div>";
			echo "<div>"."<strong>ISBN</strong>".'<input type="text" name="isbn_book" placeholder="ISBN" required >'."</div>";
			echo "<div><strong>Editorial</strong>";
			echo '<select name="editorial">';
			echo '<option>Seleccione una Opcion</option>';
			$query = "SELECT * FROM editorial";
			$result = mysqli_query($con,$query);
				while ($row=mysqli_fetch_array($result)) {
					echo '<option value = "'.$row['ideditorial'].'">'.$row['nameeditorial'].'</option>';
				}
			echo '</select>';
			echo "</div>";
			echo "<div>".'<input type="submit" name="save_button" value="Add Book" >'."</div>";
			echo '</form>';
			echo "<div float: left;>".'<a href="index.html"><button>Home</button></a>'."</div>";
		?>
	</body>
</html>