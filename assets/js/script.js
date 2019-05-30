var Site = {};

Site.menuInteraction = function(){
	document.querySelectorAll(".menu_header").forEach(function(menu_button){
		menu_button.onclick = function(){
			console.log("hey")
			document.querySelector("#arch_menu").classList.toggle("open")
		}
	})
}

window.onload = function(){
	console.log("Archtober 2019\nSmall Stuff & Lukas Eigler-Harding")
	Site.menuInteraction()
}
