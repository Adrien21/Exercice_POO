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
    
    <script>
        let testChoisi = document.getElementsByName("testChoisi")[0];
        let selectTest = document.getElementsByName("selectTest")[0];
        
        testChoisi.onchange = function(){
            selectTest.submit();
        }
        
    </script>
    </body>
</html> 