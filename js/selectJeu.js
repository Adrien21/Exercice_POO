/*------------ select jeu ----------------*/

let jeuChoisi = document.getElementsByName("jeuChoisi")[0];
let selectJeu = document.getElementsByName("selectJeu")[0];
		
jeuChoisi.onchange = function(){
	selectJeu.submit();
			
}