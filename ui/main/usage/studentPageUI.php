<html>
  <head>
    <meta charset="utf-8">
    <title>Indivisual Student Page</title>
    <style>
    // setup layout for the page
    table {width:80%; background-color:#fff;}
    thead td { width: width of the other columns; }
    thead td:first-child { width: 30%; }
    thead td:last-child {width: 60%; }
  </style>

  </head>
  <body>
	<h1>Indivisual student Page</h1>
	<table style="height: 455px;" width="795" align="center">
	<tbody style ="right: 800px;">
	<!-- create a table which has two columns -->
	<!-- personal information on the left columns -->
	<!-- course information on the right columns -->


	<!-- this should be changed since it is a mock one -->
	<img src="https://qph.ec.quoracdn.net/main-qimg-3b0b70b336bbae35853994ce0aa25013-c?convert_to_webp=true" alt="" width="200" height="200" td rowspan="2" right: -400px/>
  <tr >
	<p><strong>Ualberta_user_id: </strong></p>
	<p><?php echo $_GET["student_id"]; ?></p>

	</tr>

	</tbody>
	</table>

  </body>
</html>