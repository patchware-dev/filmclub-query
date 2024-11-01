
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles.css">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script type="text/javascript" src="../Data/FilmList-TEST.js"></script>

	<style>
		/* A grid of film posters */
		.grid-container {
			display: grid;
			grid-template-columns: auto auto auto auto;
			grid-gap: 10px;
			padding: 10px;
		}

		.grid-item {
			text-align: center;
		}

		.grid-item img {
			width: 100%;
			height: auto;
		}
	</style>
</head>


<body>

	<?php include 'searchbar.php';?>


	<div>
		<!-- A grid of film posters -->
		<div class="grid-container">
		</div>
	</div>
	



</body>
<script>

	$.ajaxSetup({
		async: false
	});





	//remove whitespace
	for(var i=0; i<filmlist.length-1; i++){
		filmlist[i].title = filmlist[i].title.trim();
		filmlist[i].title = filmlist[i].title.toLowerCase()
	}
	//remove duplicates from source list
	filmlist = filmlist.filter((v,i,a)=>a.findIndex(t=>(t.title === v.title && t.year===v.year))===i);
	//alphabetise the list
	filmlist.sort(function(a, b) {
    	var textA = a.title.toUpperCase();
    	var textB = b.title.toUpperCase();
    	return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
	});

	var ACTORARRAY = [];
	var UNMERGED_ACTOR_OBJECTS = [];

	var DIRECTORARRAY = [];
	var UNMERGED_DIRECTOR_OBJECTS = [];

	var COUNTRYSTRING = "";
	var COUNTRYARRAY = [];


	for( var i=0; i < filmlist.length; i++)
	{
		//var URL = "http://www.omdbapi.com/?apikey=9e1b6cd0&t=" + encodeURI(filmlist[i].title) + "&y=" + filmlist[i].year + "&type=movie";
		var URL = "https://www.omdbapi.com/?apikey=9e1b6cd0&t=" + encodeURI(filmlist[i].title);
		
		$.getJSON( URL, function( data ){
			if(data.Response == "True"){

				
				

				// ADD TO LIST OF ACTORS
				ACTORSTRING = data.Actors;
				ACTORARRAY = ACTORSTRING.split(",");
				for(var i=0; i< ACTORARRAY.length; i++){
					if (ACTORARRAY[i] != "" && ACTORARRAY[i] != "undefined" && ACTORARRAY[i] != " " && ACTORARRAY[i] != "N/A")
					{
						var actorobj = {actorname: ACTORARRAY[i].trim(), films: data.Title, count:1};
						UNMERGED_ACTOR_OBJECTS.push(actorobj);
					}else{ console.log(ACTORARRAY[i] + " is not an actor! (" + data.Title + ")");}
					
				}


				// ADD TO LIST OF DIRECTORS
				var DIRECTORSTRING = data.Director;
				DIRECTORARRAY = DIRECTORSTRING.split(",");
				for(var i=0; i< DIRECTORARRAY.length; i++){
					if (DIRECTORARRAY[i] != "" && DIRECTORARRAY[i] != "undefined" && DIRECTORARRAY[i] != " " && DIRECTORARRAY[i] != "N/A")
					{
						var directorobj = {directorname: DIRECTORARRAY[i].trim(), films: data.Title, count:1};
						UNMERGED_DIRECTOR_OBJECTS.push(directorobj);
					}else{ console.log(DIRECTORARRAY[i] + " is not an director! (" + data.Title + ")");}
					
				}

				// ADD TO COUNTRY COUNT
				if(data.Country != "undefined" && data.Country != "" && data.Country != " " && data.Country != "N/A"){
					//console.log(data.Country + " : " +  data.Title);
					COUNTRYSTRING = COUNTRYSTRING.concat(data.Country + ", ");
				}
				


			}
		});
	}

	//console.log(COUNTRYSTRING);
	COUNTRYARRAY = COUNTRYSTRING.split(",");

	for(var i=0; i< COUNTRYARRAY.length; i++){
		COUNTRYARRAY[i] = COUNTRYARRAY[i].trim();
	}
	var count = {};
	COUNTRYARRAY.forEach(number => count[number] = (count[number] || 0) +1);
	var COUNTRYARRAY = [];
	for (var vehicle in count) {
	    COUNTRYARRAY.push([vehicle, count[vehicle]]);
	}

	COUNTRYARRAY.sort(function(a, b) {
	    return a[1] - b[1];
	});
	console.log(COUNTRYARRAY);
	
   






	// merge multiple films into one entry
	var ACTOR_OBJECTS = [];
	var DIRECTOR_OBJECTS = [];

	UNMERGED_ACTOR_OBJECTS.forEach(function(item) {
	  var existing = ACTOR_OBJECTS.filter(function(v, i) {
	    return v.actorname == item.actorname;
	  });
	  if (existing.length) {
	    var existingIndex = ACTOR_OBJECTS.indexOf(existing[0]);
	    ACTOR_OBJECTS[existingIndex].films = ACTOR_OBJECTS[existingIndex].films.concat(item.films);
	    ACTOR_OBJECTS[existingIndex].count ++;

	  } else {
	    if (typeof item.films == 'string')
	      item.films = [item.films];
	    ACTOR_OBJECTS.push(item);
	  }
	});
	UNMERGED_DIRECTOR_OBJECTS.forEach(function(item) {
	  var existing = DIRECTOR_OBJECTS.filter(function(v, i) {
	    return v.directorname == item.directorname;
	  });
	  if (existing.length) {
	    var existingIndex = DIRECTOR_OBJECTS.indexOf(existing[0]);
	    DIRECTOR_OBJECTS[existingIndex].films = DIRECTOR_OBJECTS[existingIndex].films.concat(item.films);
	    DIRECTOR_OBJECTS[existingIndex].count ++;
	  } else {
	    if (typeof item.films == 'string')
	      item.films = [item.films];
	    DIRECTOR_OBJECTS.push(item);
	  }
	});

	function compare( a, b ) {
	  if ( a.count < b.count ){
	    return 1;
	  }
	  if ( a.count > b.count ){
	    return -1;
	  }
	  return 0;
	}
	function compare2( a, b ) {
	  if ( a < b ){
	    return 1;
	  }
	  if ( a > b ){
	    return -1;
	  }
	  return 0;
	}

	ACTOR_OBJECTS.sort( compare );
	DIRECTOR_OBJECTS.sort( compare );
	COUNTRYARRAY.sort( compare2 );

	//console.log(ACTOR_OBJECTS);
	//console.log(DIRECTOR_OBJECTS);
	//console.log(COUNTRYARRAY);



	// Create a grid of film posters
	



</script>
</html>