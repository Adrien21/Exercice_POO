        </main>
        <footer>
              <h2> Ceci est le pied de page </h2>
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