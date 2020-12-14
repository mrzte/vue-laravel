<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salasah</title>

        <!-- Fonts -->
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/skel.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="/css/style-wide.css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            #chartdiv {
            width: 100%;
            height: 500px;
            }
       </style>
    </head>
    <body>
    <header id="header" class="nav-dark nav-primary">
				<h1><a href="/"> POS APP</a> Salasah</h1>
				<nav class="nav-primary"id="nav">
					<ul>
						<li><a href="index.html">Beranda</a></li>
						<li><a href="index.html">Pengumuman</a></li>
						<li><a href="index.html">Tentang</a></li>
						<li>
							<a href="" class="icon"><i class="fas fa-angle-down mr-1"></i>Panduan</a>
							<ul>
								<li><a href="generic.html">Pengisian</a></li>
								<li><a href="contact.html">Halaman</a></li>
								<li>
									<a href="">Submenu</a>
									<ul>
										<li><a href="#">Option One</a></li>
										<li><a href="#">Option Two</a></li>
										<li><a href="#">Option Three</a></li>
										<li><a href="#">Option Four</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="/kontak" class="button">Kontak kami</a></li>
					</ul>
				</nav>
            </header>
            <router-view></router-view>
    
      <!-- Banner -->
			<section id="banner">
                <!-- <img src="/img/logo/logo.svg" alt=""> -->
				<h2>POSS APP SALASAH CORP</h2>
				<p></p>
                @if (Route::has('login'))
                @auth
                <ul class="actions">
					<li><a href="/dasbor" class="button special">Dasbor</a></li>
				</ul>
                @else
				<ul class="actions">
					<li><a href="/register" class="button special">Daftar</a></li>
					<li><a href="/login" class="button">Masuk</a></li>
				</ul>
                @endauth
                @endif

			</section>
      </body>
<script src="/js/app.js"></script>
<script src="/js/Chart.js"></script>
<script src="js/jquery.min.js"></script>
<script src="/js/jquery.dropotron.min.js"></script>
<script src="/js/jquery.scrollgress.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/skel-layers.min.js"></script>
<script src="/js/init.js"></script>
</html>