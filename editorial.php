<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Add Editorials</title>
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
					<li><a href="#">Update Book<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Book<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Authors<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="author.php">Add Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_author.php">Remove Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Authors<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Book Authors<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="bookauthor.php">Add Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_bkau.php">Remove Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Book Author<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Book Authors<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>	
			<li>
				<a href="#">Editorial<span class = "flecha">&#9660</span></a>
				<ul>
					<li><a href="editorial.php">Add Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="del_edit.php">Remove Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">Update Editorial<span class = "flecha">&#9660</span></a></li>
					<li><a href="#">List Editorials<span class = "flecha">&#9660</span></a></li>
				</ul>
			</li>				
		</ul>
		</div>';
			$con = mysqli_connect("localhost","root","daniel12031994","bookstore");
			//$con = mysqli_connect("mysql1.alwaysdata.com","dacm26","daniel12031994","dacm26_bookstore");
			if (mysqli_connect_errno($con)) {
				echo "Error";
			}
			if($_SERVER['REQUEST_METHOD'] == 'GET'){//Para cuando recargue la pagina y solo quiere refrescarlo o si quiere que pase algo cuando cargue la pagina para read 
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST'){//Para cuando recargue la pagina y le envia la data que ingreso el usuario para insert delete
				$query = "INSERT INTO editorial(nameeditorial,address) VALUES ("."'".$_POST['name_ed']."','".$_POST['address']."');";
				
				if(!mysqli_query($con,$query)){
				echo '<script>
						alert("Ya hay editoriales con ese Id");
					  </script>';
				}
			}
			echo '<form method="post">';
			echo '<div class="mb" id ="add_books_2" >'."<strong>Name</strong>".'<input id ="ab_fields" type="text" name="name_ed" placeholder="Editorial Name" required >'."</div>";
			echo '<div class="mb" id ="add_books_2" >'."<strong>Direction</strong>".'<input id ="ab_fields" type="text" name="address" placeholder="Address" required >'."</div>";
			echo '<div>'.'<input id="menu_bts_1" type="submit" name="save_button" value="Add Editorial" >'."</div>";
			echo '</form>';
		?>
	</body>
</html>
