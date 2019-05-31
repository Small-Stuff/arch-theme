var Site = {};
Site.target_day = 0;
Site.event_type = "";

Site.menuInteraction = function(){
	document.querySelectorAll(".menu_header").forEach(function(menu_button){
		menu_button.onclick = function(){
			console.log("hey")
			document.querySelector("#arch_menu").classList.toggle("open")
		}
	})
}

Site.pageLeave = function(){
	// generic to-do for pages leaving
	document.querySelector("#arch_menu").classList.remove("open")
}

Site.calendar = function(){
	document.querySelectorAll(".cal_day").forEach(function(cal_button){
		cal_button.onclick = function(event){
			var mainNameSpace = document.querySelector("main").getAttribute("data-barba-namespace");
			if(mainNameSpace == "home"){
				event.preventDefault()
				document.querySelector("#arch_menu").classList.remove("open")
				TweenMax.to(window, parseInt(cal_button.getAttribute("data-targetday"))/20, {scrollTo: "#day_" + cal_button.getAttribute("data-targetday")})
			}else{
				Site.target_day = parseInt(cal_button.getAttribute("data-targetday"))
			}
		}
	})
}

Site.crosspage_event_filter = function(){
	document.querySelectorAll("a.event_type_filter").forEach(function(this_event_filter){
		this_event_filter.onclick = function(event){
			Site.event_type = this_event_filter.getAttribute("data-eventtype")
		}
	})
}

Site.event_filter = function(){
	console.log("events archive page")
	// filtering is additive
	// click on one, everythign else hides. 
	// if has selected filter(s): show
}

window.onload = function(){
	console.log("Archtober 2019\nSmall Stuff & Lukas Eigler-Harding")
	// load ui
	Site.menuInteraction()
	Site.calendar()
	Site.crosspage_event_filter()

	//page dependent functions
	if(document.querySelector("main").getAttribute("data-barba-namespace") == "events"){
		Site.event_filter()
	}

	// barba transitions
	barba.init({
		transitions: [{
			name: 'target_day',
			sync: true,
			to: {
				namespace: [
					'home'
				]
			},
			beforeLeave(){
				console.log("target_day, leaving")
				Site.pageLeave()
			},
			afterEnter(){
				console.log("homepage entered!")
				if(Site.target_day > 0 && Site.target_day < 32){
					TweenMax.set(window, {scrollTo: "#day_" + Site.target_day})
					// clear day
					Site.target_day = 0;
				}
			}
		},
		{
			name: 'target_event_type',
			sync: true,
			to: {
				namespace: [
					'events'
				]
			},
			beforeLeave(){
				Site.pageLeave()
			},
			afterEnter(){
				// filter for event type
				console.log(Site.event_type)
				// select filter. 

				// run filter function

				// clear transition filter
				Site.event_type = "";
			}
		},
		{
			name: 'basic_transition',
			sync: true,
			beforeLeave(){
				console.log("basic_transition, leaving")
				Site.pageLeave()
			},
			afterEnter(){
				console.log("entered!")
			}
		}]
	})
}
