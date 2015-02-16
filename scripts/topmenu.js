YAHOO.util.Event.onContentReady("pdcmenubar", function () {



	var oMenuBar = new YAHOO.widget.MenuBar("pdcmenubar", { 

												autosubmenudisplay: true, 

												hidedelay: 750, 

												lazyload: true });



	var aSubmenuData = [

	

		{

			id: "about", 

			itemdata: [ 

				{ text: "About our camp", url: ".about.html" },

				{ text: "Who can come to camp", url: "/who_can_come.html" },

				{ text: "Fees", url: "/fees.html" },

				{ text: "How to register", url: "/registration.html" },

				{ text: "Transporation to camp", url: "/transportation.html" },

				 { text: "Driving Directions", url: "/directions.html" },



			]

		},



		{

			id: "forcampers", 

			itemdata: [

				{ text: "Bus Schedules", url: "/buses.html" },

				{ text: "Overnight Info", url: "/overnight.html" },

				{ text: "Tips for hot days", url: "/hotdays.html" },

				{ text: "Weather", url: "http://www.wunderground.com/auto/sfgate/CA/Redwood_City.html" }

			]    

		},

		 {

			id: "forvolunteers", 

			itemdata: [

				{ text: "Ways to volunteer", url: "/volunteer/ways_to_volunteer.html" },

				{ text: "Being a Unit Leader", url: "/volunteer/unit_leader.html" },

				{ text: "Being a Program Leader", url: "/volunteer/program_leader.html" },

				{ text: "At-home jobs", url: "/volunteer/jobs.html" },

				{ text: "Training", url: "/volunteer/training.html" }

			]    

		},

		  {

			id: "foraides", 

			itemdata: [

				{ text: "Being an aide", url: "/aides/aides.html" },

				{ text: "Aide expectations and responsibilities", url: "/aides/aide_expectations.html" },

				{ text: "Camp Names", url: "/camp_names.html.html" }

			]    

		}

		 

	];





	/*

		 Subscribe to the "beforerender" event, adding a submenu 

		 to each of the items in the MenuBar instance.

	*/



	oMenuBar.subscribe("beforeRender", function () {



		if (this.getRoot() == this) {



			this.getItem(1).cfg.setProperty("submenu", aSubmenuData[0]);

			this.getItem(2).cfg.setProperty("submenu", aSubmenuData[1]);

			this.getItem(3).cfg.setProperty("submenu", aSubmenuData[2]);

			this.getItem(4).cfg.setProperty("submenu", aSubmenuData[3]);



		}



	});



	oMenuBar.render();         



});