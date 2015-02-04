<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Exemple</title>
</head>
<body>
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<style type="text/css" >
		#owl-demo .item{
		  margin: 4px;
		}
		#owl-demo .item img{
		  display: block;
		  width: 100%;
		  height: auto;
		}
	</style>
	<script type="text/javascript">
	    $(document).ready(function() {
	     
	    $("#owl-demo").owlCarousel({
	    items : 4,
	    lazyLoad : true,
	    navigation : true
	    });
	    });
	</script>
	<div id="interface">
    <div id="owl-demo" class="owl-carousel">
    <div class="item"><img class="lazyOwl" data-src="img/owl1.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl2.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl3.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl4.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl5.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl6.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl7.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl8.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl1.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl2.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl3.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl4.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl5.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl6.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl7.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="img/owl8.jpg" alt="Lazy Owl Image"></div>
    </div>
	</div>
</body>
</html>