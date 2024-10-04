<?php
session_start();
if (isset($_SESSION['User'])) {
	include "Connect.php";

	$sql = "SELECT * FROM chat";

	$query = mysqli_query($Connect, $sql);
?>
	<style>
		h2 {
			color: white;
		}

		label {
			color: white;
		}

		span {
			color: black;
			font-weight: bold;
			font-family: Verdana;
		}

		.container {
			margin-top: 3%;
			width: 72%;
			background-color: rgb(255, 255, 255);
			padding-right: 10%;
			padding-left: 10%;
			
			border-radius: 5%;
		}

		.btn-primary {
			background-color: #673AB7;
		}

		.display-chat {
			height: 450px;
			width: 90%;
			background-color: rgb(255, 255, 255);
			margin-bottom: 4%;
			overflow: auto;
			padding: 15px;
		}

		.message {
			background-color: rgb(255, 255, 255);
			color: #000000;
			border-radius: 5px;
			padding: 5px;
			margin-bottom: 3%;
			border: 2px ridge rgba(255,115,128,255);
		}
	</style>

	<meta http-equiv="refresh" content="20"> <!-- para refrescar la pagina-->
	<script src="https://kit.fontawesome.com/dcc018947f.js" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			// Set trigger and container variables
			var trigger = $('.container .display-chat '),
				container = $('#content');

			// Fire on click
			trigger.on('click', function() {
				// Set $this for re-use. Set target from data attribute
				var $this = $(this),
					target = $this.data('target');

				// Load target page into container
				container.load(target + '.php');

				// Stop normal link behavior
				return false;
			});
		});
	</script>
	<div class="container">
		<center>
			<?php 
			 $nombre= $_SESSION['User'];
			 $Urol = $_SESSION['rol'];
			 switch ($Urol) {
				 case 0:
					$query2="SELECT nomb_estudiante FROM estudiante WHERE IDusuario = '$nombre'";
					 break;
				case 83:
					$query2="SELECT nomb_docente FROM docente WHERE IDusuario = '$nombre'";
					 break;
				 
				 default:
					 # code...
					 break;
			 }
			 $consul = mysqli_query($Connect, $query2);
			 $nombusuario = mysqli_fetch_array($consul);
			?>
			<span style="color:#120633; font-weight: 600; font-size: 25px;"><?php echo $nombusuario[0]; ?> </span>
		
		</center></br>
		<div class="display-chat" id="display-chat">
			<?php
			if (mysqli_num_rows($query) > 0) {
				while ($row = mysqli_fetch_assoc($query)) {
					$alv = $row['Usuario'];
					$sql3= "SELECT nomb_estudiante FROM estudiante WHERE IDusuario= '$alv'";
					$conectar = mysqli_query($Connect, $sql3);
					$nUs = mysqli_fetch_array($conectar);
					if (isset($nUs[0])) {
						$nMensaje= $nUs[0];
					}
					if (!isset($nUs[0])){
						$nMensaje = $row['Usuario'];
					}
			?>
					<div class="message">
						<p>
							<span><?php echo $nMensaje; ?> :</span>
							<?php echo $row['Mensaje']; ?>
						</p>
					</div>
				<?php
				}
			} else {
				?>
				<div class="message">
					<p>
						No hay ninguna conversación previa.
					</p>
				</div>
			<?php
			}
			?>

		</div>



		<form class="form-horizontal" method="post" action="sendMessage.php">
			<div class="form-group">
				<div class="col-sm-10">
					<textarea name="msg" style="border: ridge 2px rgba(255,115,128,255); color: #000; float: left; width: 80%;" placeholder="Ingrese su Mensaje"></textarea>
					<button type="submit"  style="font-size: 20px; float: right; border: none; border-radius: 100%; cursor: pointer;"><i class="far fa-paper-plane"></i></button>
				</div>

			</div>
		</form>
	</div>

	<script src="popupchat.js"></script>
	</body>

	</html>
<?php
} else {
	header('location:Biblioteca.php');
}
?>