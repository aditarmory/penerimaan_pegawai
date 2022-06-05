<?php

	session_start();
	include "include/koneksi.php";
	$lowongan = new Lowongan();
	if(isset($_SESSION['user'])){
		echo "<script language='javascript'> window.location.href='user/index.php'</script>";
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Lowongan Kerja</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- css -->
	<link href="dist/output.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
	<link href="color/default.css" rel="stylesheet" media="screen">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	<script src="js/modernizr.custom.js"></script>
	</head>
	<style>
		html {
  			scroll-behavior: smooth;
		}
	</style>
  <body>
	
	<!-- Navbar Section Brader!!! -->

	<div class="w-full h-28 bg-white flex justify-around items-center border-b-2 border-gray-300">
		<a href=#about><img src="./img/go.png" alt="go" class="object-cover h-16 hover:cursor-pointer"/></a>
		<div>
			<a href="#about" class="mr-8 font-poppins text-black hover:text-[#DC3545] hover:no-underline">Tentang Kami</a>
			<a href="#penerimaan" class="font-poppins text-black hover:text-[#DC3545] hover:no-underline">Penerimaan Pegawai</a>
		</div>
		<p class="font-poppins mt-3"><a class="text-[#DC3545] hover:text-black hover:no-underline" href="https://www.instagram.com/officialganeshaoperation/" target=_blank>Official Website</a></p>
	</div>

	<!-- End Navbar Section Brader!!! -->

	  <!-- intro area Brader!!!-->	  
	  <div class="flex flex-col justify-center mt-80">
	  	<p class="text-7xl mb-6 font-poppins">Lowongan Pekerjaan</p>
		<p class="text-7xl font-poppins font-semibold text-[#DC3545]">Ganesha Operation Balikpapan</p>
		<p class="text-3xl text-gray-400 font-poppins mt-6">Bersama Ganesha Operation membangun bangsa yang lebih baik</p>
	 	<div class="flex justify-center mt-36">
			<button type="button" class="px-10 py-4 mr-8 text-[#DC3545] text-3xl font-poppins font-bold border-2 border-[#DC3545] rounded-md hover:bg-[#DC3545] hover:text-white" data-toggle="modal" data-target="#myModalRegister">Register</button>
			<button type="button" class="px-10 py-4 text-3xl font-poppins font-bold border-2 border-[#DC3545] rounded-md bg-[#DC3545] text-white hover:text-[#DC3545] hover:bg-white hover:border-[#DC3545]" data-toggle="modal" data-target="#myModalLogin">Login</button>
	 	</div>
	</div>
	<!-- end intro area Brader!!!-->	  
	  
	  
	  <!-- About -->
	  <section id="about">
		  <div class="w-full h-full bg-[#FBF5F6] flex justify-between md:container md:mx-auto mt-36 py-24">
			<div class="flex flex-col pl-40 w-3/5 justify-center">
				<p class=" text-5xl text-[#DC3545] font-poppins font-bold text-left">Tentang Ganesha Operation</p>
				<p class="font-poppins text-2xl leading-relaxed text-left pr-40 mt-6">Bimbel Ganesha Operation merupakan lembaga bimbingan belajar terbaik dan terbesar di Indonesia. Berdiri sejak 2 Mei 1984 di Kota Bandung, saat ini Ganesha Operation telah tersebar di 265 kota di Indonesia, mulai dari Aceh hingga Ambon.</p>
			</div>
			<div class="flex flex-col pr-40">
			<a href=#about><img src="./img/selamat.png" alt="selamat" class="object-cover h-42"/></a>
			</div>
		  </div>
	  </section>
		 
	  
	  <!-- Table Penerimaan Pegawai -->
	 <section id="penerimaan" class="home-section bg-white">
		<div class="container">
			  <div class="row">
				  <div class="col-md-offset-2 col-md-8">
					<div class="section-heading">
					 <h2>Penerimaan Pegawai</h2>
					 <p>Sistem Pendukung Keputusan Penerimaan Pegawai</p>
					</div>

					<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Penerimaan</th>
								<th>Kuota</th>
							</tr>
						</thead>

					<?php
						$get= $lowongan->GetData("where status='1'");
						$no = 1;
						while($row = $get->fetch()){
							echo "<tr>
								<td>$no</td>
								<td>$row[lowongan]</td>
								<td>$row[kuota]</td>
								<td><a href='#' class='show_rincian' data-id='$row[id_lowongan]' data-wow-delay='1s' data-toggle='modal' data-target='#myModalSyarat'>Syarat</a></td>
								</tr>";
						}
					?>
					</table>
				  </div>
			  </div>
			  <div class="row">
			  </div>	
		</div>
	</section>
	  
	<!-- Modal -->
	<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="login_user.php">
					<div class="form-group">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
					</div>
				
			</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Login">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Register</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="register.php">
					<div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control input-lg" placeholder="Nama Lengkap" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" placeholder="Email" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
					</div>
			</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Register">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalSyarat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Syarat Penerimaan</h4>
			</div>
			<div class="modal-body-syarat">
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Section Footer Brader!! -->
	<footer  class="bg-white">
			<div class="flex justify-between mx-40">
				<div class="text-[#DC3545]">
					<p class="font-poppins">Ganesha Operation © 2022</p>
				</div>
				<div class="flex">
				<img src="./img/apple.png" alt="apple" class="object-cover h-18 rounded-md mr-8"/>
				<img src="./img/andro.png" alt="andro" class="object-cover h-18 rounded-md"/>
				</div>
			</div>
	</footer>
	 
	 <!-- js -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.smooth-scroll.min.js"></script>
	<script src="js/jquery.dlmenu.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>

	<script>
        $(function(){
            $(document).on('click','.show_rincian',function(e){
                e.preventDefault();
                $("#myModalSyarat").modal('show');
                $.post('syarat_lamaran.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body-syarat").html(html);
                    }   
                );
            });
        });
    </script>
  	
</html>