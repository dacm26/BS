<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>List Editorials</title>
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
			echo '		<div>
		<ul class = "nav">
			<li>
				<a href="index.html">Home<span class = "flecha">&#9660</span></a>
			</li>
			<li>
				<a href="#">Books<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="book.php">Add Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_book.php">Remove Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="upd_book.php">Update Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="list_books.php">List Books<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Authors<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="author.php">Add Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_author.php">Remove Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="upd_author.php">Update Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="list_authors.php">List Authors<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Book Authors<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="bookauthor.php">Add Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_bkau.php">Remove Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="list_bkau.php">List Book Authors<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>	
			<li>
				<a href="#">Editorial<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="editorial.php">Add Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_edit.php">Remove Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="upd_edit.php">Update Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="list_editorial.php">List Editorials<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>				
		</ul>
		</div>';
			//$con = mysqli_connect("localhost","root","daniel12031994","bookstore");
			$con = mysqli_connect("mysql1.alwaysdata.com","dacm26","daniel12031994","dacm26_bookstore");
			if (mysqli_connect_errno($con)) {
				echo "Error";
			}
			if($_SERVER['REQUEST_METHOD'] == 'GET'){//Para cuando recargue la pagina y solo quiere refrescarlo o si quiere que pase algo cuando cargue la pagina para read 
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST'){//Para cuando recargue la pagina y le envia la data que ingreso el usuario para insert delete
			}
			echo '<div class= "mt"><table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Address</th>
						</tr>
					</thead>';
			echo "  <tbody>";
			$query = "SELECT * FROM editorial;";
			$result = mysqli_query($con,$query);
			while ($row=mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>".$row['ideditorial']."</td>";
					echo "<td>".$row['nameeditorial']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "</tr>";
			}
			echo "  </tbody>";
			echo "</table></div>";
		?>
	</body>
</html>