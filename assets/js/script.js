var Site = {};
Site.visited = false;
Site.target_day = 0;
Site.event_type = [];


Site.menuInteraction = function(){
	document.querySelectorAll(".menu_header").forEach(function(menu_button){
		menu_button.onclick = function(){
			document.querySelector("#arch_menu").classList.toggle("open")
		}
	})
}

Site.up_to = function(current_day, botd_array){
	console.log("up to")
	// show up-to current day silhouette
	// for each silhoutte check it in comparison to the current day, if it is <=, then show, else hide
	botd_array.forEach(function(this_botd){
		var this_botd_day = parseInt(this_botd.getAttribute("data-silhouetteday"));
		if(this_botd_day <= current_day){
			this_botd.classList.remove("botd_hidden")
		}else{
			this_botd.classList.add("botd_hidden")
		}
	})
	document.querySelector(".archtober_logo").classList.remove("botd_hidden")
	TweenMax.set(".botd_filter", {opacity: 0.9})
}

Site.intro_load = function(current_day, botd_array){
	document.querySelector(".archtober_logo").classList.add("botd_hyper_vis");
	botd_array.forEach(function(this_botd, index){
		TweenMax.to(this_botd, 1/botd_array.length, {opacity: 1, delay: index/botd_array.length, ease: Power4.easeInOut, onComplete: function(){
				this_botd.classList.remove("botd_hidden")
				TweenMax.set(this_botd, {clearProps: "opacity"})
			}
		})
	})
	TweenMax.to(".archtober_logo", 1/botd_array.length, {opacity: 1, delay: 1, ease: Power4.easeInOut})
	TweenMax.to(".botd_filter", 1.5, {opacity: 0.9, delay: 1.5, ease: Power4.easeInOut})
	TweenMax.to("#open_menu", 1.5, {marginTop: 0, delay: 1.5, ease: Power4.easeInOut, onComplete: function(){
			document.querySelector("#open_menu").classList.add("visited")
		}
	})
}

Site.botd_load = function(pageNameSpace){
	var botd_array = Array.prototype.slice.call(document.querySelectorAll(".botd_image"));
	var current_day = parseInt(document.querySelector(".day_current").getAttribute("data-current_day"));
	console.log("botd_load", pageNameSpace, current_day, botd_array)

	if(pageNameSpace == "home"){
		if(Site.visited == false){
			// first homepage visit: animation
			Site.intro_load(current_day, botd_array)
		}else if(Site.visited == true){
			// already visited
			document.querySelector("#open_menu").classList.add("visited")
			Site.up_to(current_day, botd_array)
		}
	}else if(pageNameSpace == "event"){
		// show just event silhouette
		// get day: show, hide all others
		var event_day = document.querySelector(".event_header").getAttribute("data-silhouetteday");
		botd_array.forEach(function(this_botd){
			this_botd.classList.add("botd_hidden")
		})
		var thisEvent = botd_array.filter(function(this_botd, index){
			return (parseInt(this_botd.getAttribute("data-silhouetteday")) == parseInt(event_day)) 
		})
		if(thisEvent.length > 0){ thisEvent[0].classList.remove("botd_hidden") }
		document.querySelector(".archtober_logo").classList.remove("botd_hidden")
		TweenMax.set(".botd_filter", {opacity: 0.9})
	}else{
		Site.up_to(current_day, botd_array)
	}
}

/* SITE TO-DOS */

Site.pageLeave = function(){
	// generic to-do for pages leaving
	document.querySelector("#arch_menu").classList.remove("open")
}

Site.pageEnter = function(upcoming_namespace){
	// generic to-do for pages leaving
	TweenMax.set(window, {scrollTo: 0})
	Site.botd_load(upcoming_namespace)
	Site.menuInteraction()
	Site.crosspage_event_filter()

}

/* CROSS PAGE NAVIGATION */
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
	// if you click an event type from a different page, save that event type
	document.querySelectorAll("a.event_type_filter").forEach(function(this_event_filter){
		this_event_filter.onclick = function(event){
			Site.event_type.push(this_event_filter.getAttribute("data-eventtype"));
		}
	})
}

Site.ui_update = function(){
	if(Site.event_type.length == 0){
		document.querySelector("ul.arch_filter_list").classList.remove("active")
		document.querySelector(".index_sections").classList.remove("active")
	}else{
		document.querySelector("ul.arch_filter_list").classList.add("active")	
		document.querySelector(".index_sections").classList.add("active")
		// filter listed events
		document.querySelectorAll(".index_section").forEach(function(this_section){
			console.log(this_section)
			var this_event_type_list = JSON.parse(this_section.getAttribute("data-eventtype"));
			var active_status = false;
			this_event_type_list.forEach(function(this_event_type, index){
				if(Site.event_type.includes(this_event_type)){
					this_section.classList.add("active")
					active_status = true;
				}

				if(index == this_event_type_list.length - 1 && active_status == false){
					this_section.classList.remove("active")
				}
			})
		})
	}
}

Site.event_filter = function(){
	console.log("events archive page")
	Site.ui_update();
	// if has selected filter(s): show
	document.querySelectorAll("li.arch_filter").forEach(function(this_event_filter){
		this_event_filter.onclick = function(event){
			var this_slug = this_event_filter.getAttribute("data-eventtype");
			if(Site.event_type.includes(this_slug)){
				// already has this filter on so i need to remove it via splice
				this_event_filter.classList.remove("active")
				Site.event_type.splice(Site.event_type.indexOf(this_slug), 1);

			}else{
				// enact filter
				Site.event_type.push(this_slug);
				this_event_filter.classList.add("active")
			}
			// update overall status
			Site.ui_update();
		}
	})


}

window.onload = function(){
	console.log("Archtober 2019  👀\nSmall Stuff & Lukas Eigler-Harding")
	// load ui
	Site.menuInteraction()
	Site.calendar()
	Site.crosspage_event_filter()
	Site.botd_load(document.querySelector("main").getAttribute("data-barba-namespace"))
	Site.visited = true;

	//page dependent functions
	if(document.querySelector("main").getAttribute("data-barba-namespace") == "events-archive"){
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
			afterEnter(data){
				console.log("homepage entered!")
				if(Site.target_day > 0 && Site.target_day < 32){
					document.querySelector("#open_menu").classList.add("visited")
					TweenMax.set(window, {scrollTo: "#day_" + Site.target_day})
					// clear day
					Site.target_day = 0;
				}else{
					Site.pageEnter(data.next.namespace)
				}
			}
		},
		{
			name: 'target_event_type',
			sync: true,
			to: {
				namespace: [
					'events-archive'
				]
			},
			beforeLeave(){
				Site.pageLeave()
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace)
				// filter for event type
				console.log(Site.event_type)
				// select filter. 

				// run filter function

				// clear transition filter
				// Site.event_type = [];
			}
		},
		{
			name: 'basic_transition',
			sync: true,
			beforeLeave(data){
				console.log("basic_transition, leaving", data.current.namespace, data.next.namespace)
				Site.pageLeave()
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace)
			}
		}]
	})
}
