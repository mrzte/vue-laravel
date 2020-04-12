<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mipt - Kemenristek</title>

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
				<h1><a href="/"> SI Manis</a> Kemenristek</h1>
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
						<li><a href="/register" class="button">Daftar</a></li>
					</ul>
				</nav>
            </header>
            <router-view></router-view>
    
      <!-- Banner -->
			<section id="banner">
                <img src="/img/logo/logo.svg" alt="">
				<h2>Manajemen Informasi Perguruan Tinggi</h2>
				<p></p>
				<ul class="actions">
					<li><a href="/register" class="button special">Daftar</a></li>
					<li><a href="/login" class="button">Masuk</a></li>
				</ul>
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
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
  <script>
  // Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.BarChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
  {
    country: "Lithuania",
    litres: 501.9
  },
  {
    country: "Czech Republic",
    litres: 301.9
  },
  {
    country: "Ireland",
    litres: 201.1
  },
  {
    country: "Germany",
    litres: 165.8
  },
  {
    country: "Australia",
    litres: 139.9
  },
  {
    country: "Austria",
    litres: 128.3
  }
];

chart.innerRadius = am4core.percent(40);
chart.depth = 120;

chart.legend = new am4charts.Legend();

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.depthValue = "litres";
series.dataFields.category = "country";
series.slices.template.cornerRadius = 5;
series.colors.step = 3;
  </script>
 <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pilar', 'Indikator', 'Pertanyaan', 'Soal',],
        datasets: [{
            label: '# of Votes',
            data: [12, 9, 10, 7, 6, 8],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Pilar', 'Indikator', 'Pertanyaan', 'Soal',],
        datasets: [{
            label: '# of Votes',
            data: [12, 9, 10, 7, 6, 8],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</html>
