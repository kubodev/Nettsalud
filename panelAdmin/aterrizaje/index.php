<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<style>
	body {
	    background-image: url(bg.jpg);
	    background-size: cover;
	    background-position: bottom;
	    color:white;
	}
	.container {
    padding: 0px 30px;
}
	.logo {
	    width: 250px;
	    height: 100px;
	    background-size: 200px;
	    background-repeat: no-repeat;
	    background-position: center;
	    background-color: rgb(255, 255, 255);
	    border-radius: 15px;
	    margin-top: 100px;
	    float:left;
	}
	@font-face {
	    font-family: 'gotham_blackregular';
	    src: url('ufonts.com_gotham-black-webfont.woff2') format('woff2'),
	         url('ufonts.com_gotham-black-webfont.woff') format('woff');
	    font-weight: normal;
	    font-style: normal;

	}




	@font-face {
	    font-family: 'orkneyregular';
	    src: url('orkney-regular-webfont.woff2') format('woff2'),
	         url('orkney-regular-webfont.woff') format('woff');
	    font-weight: normal;
	    font-style: normal;

	}




	@font-face {
	    font-family: 'orkneybold';
	    src: url('orkney-bold-webfont.woff2') format('woff2'),
	         url('orkney-bold-webfont.woff') format('woff');
	    font-weight: normal;
	    font-style: normal;

	}
	h6 {
	    font-family: orkneyregular;
	    text-transform: uppercase;
	    font-size: 14px;
	    letter-spacing: 1px;
	    display:inline;
	}
	.cod
	{
	    font-family: orkneybold;
	    font-size:30px;
	    margin:15px;
	    position:relative;
	    top:5px;

	}
	.cod2
	{
	    font-family: orkneybold;
	    font-size:30px;
	    margin:15px;
	    position:relative;
	    top:5px;

	}
	h1
	{
	    font-family:gotham_blackregular;
	    font-weight:normal;
	    font-size:35px;
	    margin-top:30px;
	    margin-bottom:30px;
	}
	.boxInfo {
	    margin-top: 30px;
	    font-family: orkneyregular;
	}
	.boxInfo b
	{
		    font-weight: normal;
    font-family: orkneybold;
    letter-spacing: 4px;
        font-size: 16px;
	}
	.boxInfo p
	{
		margin-bottom:30px;
		    font-size: 16px;
		    margin-top:10px;
	}
	img.logoDes {
	    height: 35px;
	    margin-top: -1px;
	}
	.nave1 {
	    width: 115px;
	    height: 137px;
	    background-image: url(nave.png);
	    background-size: 100%;
	    margin-top:100px;
	    position:relative;
	    transition:1s;
	    float:right;
	}
	.nave2 {
	    width: 300px;
	    height: 360px;
	    background-image: url(nave.png);
	    background-size: 100%;
	    float:left;
	    position:relative;
	    transition:3s;
	    background-repeat:no-repeat;
	}
	a{color:white;}
	@media only screen and (max-width : 990px) {
		.nave1 { display:none; }
		.cod,.cod2 { font-size:14px; margin:5px;top:0;}
		h6{font-size:12px;}
		h1{font-size:20px;}
		img.logoDes{height:20px;}
		.nave2 { width:100%; }
		.logo { margin-top:10px; }
	}
	</style>
	<title>Estamos construyendo nuestro nuevo sitio web</title>
</head>
<body>
	<div class="container">
		<header>
			<div class="logo" style="background-image:url(logo.png)"></div>
			<div class="nave1"></div>
		</header>
		<div class="row">
				<div style="clear:both; height:30px"></div>
				<span class="cod"><</span><h6>Volvemos en unos momentos</h6><span class="cod">/ ></span>
				<h1>EN CONJUNTO AL EQUIPO DE <a href="http://mmw.cl" target="_blank"><img class="logoDes" src="logoDes.png"></a> ESTAMOS DESARROLLANDO NUEVAS IDEAS PARA RIGHTCOM.CL</h1>
			<div class="col-md-6">
				<span class="cod2"><</span><h6>MIENTRAS, PUEDES CONTACTARNOS EN:</h6><span class="cod2">/ ></span>
				<div class="boxInfo">
					<b>DIRECCCION:</b>
					<p>
					Ricardo Matte Perez 570, Providencia<br>
					Santiago de Chile
					</p>
					<b>TELEFONOS:</b>
					<p>
					Fono: (56-2) 24410420<br>
					Movil: (56-9) 98246721
					</p>
					<b>E-MAIL:</b>
					<p>
					<a href="mailto:contacto@rightcom.cl">contacto@rightcom.cl</a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="nave2"></div>
			</div>
		</div>
	</div>
	<script>
	var nave1 = 0;
	setInterval(function(){if(nave1==0) {$('.nave1').css("top","3px");nave1=1;} else {$('.nave1').css("top","-3px");nave1=0;}},1000);
	var nave2 = 0;
	setInterval(function(){if(nave2==0) {$('.nave2').css("top","18px");nave2=1;} else {$('.nave2').css("top","-18px");nave2=0;}},3000);
	</script>
</body>
</html>