        </main>
        <footer>
            <h2> Game Them All </h2>
            <img src="img/logo.jpg" alt="Logo de Game them all" height="200"><br><br>
             <a href="mentionslegales.php"> Mentions légales </a>  
        </footer>
        <script>
		let jeuChoisi = document.getElementsByName("jeuChoisi")[0];
		let selectJeu = document.getElementsByName("selectJeu")[0];
		
		jeuChoisi.onchange = function(){
			selectJeu.submit();
		}
        
	</script>
    </body>
</html> 