<include config.php>
<!DOCTYPE html>
<html>
<head>
	<title>THE BELL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header class="sticky-top">
		<div class="container">
			<div class="row">
				<div class="col-2 menu">
					<img src="img/logo.png">
				</div>
				<div class="col-2">
					
				</div>
				<div class="col-8 menu">
					<ul>
						<li><a href="main.php">Trang chủ</a></li>
						<li><a href="sanpham.php">Sản phẩm</a></li>
						<li><a href="dangky.php">Đăng kí</a></li>
						<li><a href="dangnhap.php">Đăng nhập</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<div class="container slider-margin">
		<div class="row">
			<div class="col-12">
					<div class="slideshow-container">
		<div class="mySlides fade">
			<div class="numbertext">
				1/3
			</div>
			<img src="img/logo1.jpg" style="width: 100%;">
			<div class="text"></div>
		</div>
		<div class="mySlides fade">
			<div class="numbertext">
				2/3
			</div>
			<img src="img/logo2.jpg" style="width: 100%;">
			<div class="text"></div>
		</div>
		<div class="mySlides fade">
			<div class="numbertext">
				3/3
			</div>
			<img src="img/logo3.png" style="width: 100%;">
			<div class="text"></div>
		</div>
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
	<br>
	<div style="text-align: center;">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot"onclick="currentSlide(3)"></span>
	
	<footer>
		<div class="container">
			<div class="row footer">
				<div class="col-3">
					<h3>Sản phẩm</h3>
					<ul class="menu_footer">
						<li><a href="">Apple</a></li>
						<li><a href="">SamSung</a></li>
						<li><a href="">Oppo</a></li>
						<li><a href="">Vivo</a></li>
                        <li><a href="">Xiaomi</a></li>
					</ul>
				</div>
				</div>
			</div>
		</div>
		
	</footer>
</body>
<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
		      slides[i].style.display = "none";  
		  }
		  for (i = 0; i < dots.length; i++) {
		      dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += "active";
		  setTimeout(showSlides, 1000);
		}
</script>
</html>