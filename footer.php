<footer class="page-footer blue">
	<div class="container blue">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Site utilizando Materialize.</h5>
				<p class="grey-text text-lighten-4">Iguatu - Ceará - Brasil</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="projetos.php">Projetos pessoais</a></li>
					<li><a class="grey-text text-lighten-3" href="servicos.php">Serviços</a></li>
					<li><a class="grey-text text-lighten-3" href="contato.php">Contatos</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2019 Copyright
		</div>
	</div>
</footer>


<script src="js/jquery-3.3.1.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.sidenav');
		var instances = M.Sidenav.init(elems);
	});

	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.parallax');
		var instances = M.Parallax.init(elems);
	});

	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.carousel');
		var instances = M.Carousel.init(elems);
	});

	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.slider');
		var instances = M.Slider.init(elems);
	});

	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.materialboxed');
		var instances = M.Materialbox.init(elems);
	});

</script>
</body>

</html> 