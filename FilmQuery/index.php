<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css">
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<script type="text/javascript" src="../Data/FilmList.js?version=2"></script>
	
	</head>


	<body>

		<div align="center" id="searchbar" class="section">
			<h1>filmQuery</h1>
			<p>query <span id="filmcount">number</span> films watched in filmclub</p>

			<form action="index.php" method="get">
				<!-- Select the search type - Actor, film, year -->
				<select name="searchtype">
					<option value="actor">Films starring:</option>
					<option value="film">Films called: </option>
					<option value="year">Films from the year: </option>
					<option value="director">Films directed by: </option>
					<option value="picker">Films picked by: </option>
					<option value="decade">Films from the decade: </option>
					<option value="country">Films from the country: </option>
					<option value="higherthanaverage">Films with an average rating higher than: </option>
					<option value="lowerthanaverage">Films with an average rating lower than: </option>
				</select>
				<input type="text" name="search" placeholder="Lorem Ipsum">
				<input type="submit" value="Search">
			</form>

		</div>


		<div class="section">
			<!-- A grid of film posters -->
			<div class="grid-container">
			</div>
		</div>


		<div id="leaderboard-section" class="section">
			<h2>Leaderboards:</h2>
			<table id="leaderboards" cellspacing="10">
				<tr>
					<td>
						<h3>Most watched actors:</h3>
						<ol id="actorlist">
							<li>Actor1</li>
							<li>Actor2</li>
							<li>Actor3</li>
						</ol>
					</td>
					<td>
						<h3>Most watched directors:</h3>
						<ol id="directorlist">
							<li>D1</li>
							<li>D2</li>
							<li>D3</li>
						</ol>
					</td>
					<td>
						<h3>Top Rated:</h3>
						<ol id="ratingList">
							<li>D1</li>
							<li>D2</li>
							<li>D3</li>
						</ol>
					</td>
				</tr>
			</table>
			

		</div>
		



	</body>
	<script>

		$.ajaxSetup({
			async: false
		});

		// FILMLIST lives in FilmList-TEST.js

		var EnrichedFilmData = [];

		//loading message in gridCONTAINER
		document.querySelector(".grid-container").innerHTML = "<h1>Loading...</h1>";


		// Loop through the FILMLIST and get the data from OMDB
		for( var i=0; i < filmlist.length; i++)
		{
			//var URL = "http://www.omdbapi.com/?apikey=9e1b6cd0&t=" + encodeURI(filmlist[i].title) + "&y=" + filmlist[i].year + "&type=movie";
			var URL = "https://www.omdbapi.com/?apikey=9e1b6cd0&t=" + encodeURI(filmlist[i].title);
			
			$.getJSON( URL, function( data ){
				if(data.Response == "True"){
					EnrichedFilmData.push(data);

					// Add local data to the array object (watchdate, picker, avScore)
					EnrichedFilmData[EnrichedFilmData.length-1].watchdate = filmlist[i].watchdate;
					EnrichedFilmData[EnrichedFilmData.length-1].picker = filmlist[i].picker;
					EnrichedFilmData[EnrichedFilmData.length-1].avScore = filmlist[i].avScore;

					
				}
			});
		}

		//READY in GridContainer
		document.querySelector(".grid-container").innerHTML = "<h1>Ready</h1>";

		console.log(EnrichedFilmData);

		// update filmcount
		document.getElementById("filmcount").innerHTML = EnrichedFilmData.length;

		




		// Function to get the most popular actors
		function getMostPopularActors() {
			var actorCount = {};

			// Loop through each film in EnrichedFilmData
			for (var i = 0; i < EnrichedFilmData.length; i++) {
				var actors = EnrichedFilmData[i].Actors.split(", ");
				for (var j = 0; j < actors.length; j++) {
					var actor = actors[j];
					if (actorCount[actor]) {
						actorCount[actor]++;
					} else {
						actorCount[actor] = 1;
					}
				}
			}

			// Convert actorCount to an array of [actor, count] pairs
			var actorCountArray = Object.entries(actorCount);

			// Sort the array by count in descending order
			actorCountArray.sort(function(a, b) {
				return b[1] - a[1];
			});

			// Extract the top actors (you can change the number to get more or fewer top actors)
			var topActors = actorCountArray.slice(0, 10);

			return topActors;
		}

		// Call the function and log the result
		var mostPopularActors = getMostPopularActors();
		console.log(mostPopularActors);

		// Optionally, update the leaderboard in the HTML
		var leaderboard = document.querySelector("#actorlist");
		leaderboard.innerHTML = "";
		for (var i = 0; i < mostPopularActors.length; i++) {
			var li = document.createElement("li");
			li.textContent = mostPopularActors[i][0] + " (" + mostPopularActors[i][1] + " films)";
			leaderboard.appendChild(li);
		}

		// Function to get the most popular directors
		function getMostPopularDirectors() {
			var directorCount = {};

			// Loop through each film in EnrichedFilmData
			for (var i = 0; i < EnrichedFilmData.length; i++) {
				var director = EnrichedFilmData[i].Director;
				// skip if director is N/A
				if(director == "N/A"){
					continue;
				}
				if (directorCount[director]) {
					directorCount[director]++;
				} else {
					directorCount[director] = 1;
				}
			}

			// Convert directorCount to an array of [director, count] pairs
			var directorCountArray = Object.entries(directorCount);

			// Sort the array by count in descending order
			directorCountArray.sort(function(a, b) {
				return b[1] - a[1];
			});

			// Extract the top directors (you can change the number to get more or fewer top directors)
			var topDirectors = directorCountArray.slice(0, 10);

			return topDirectors;
		}

		// Call the function and log the result
		var mostPopularDirectors = getMostPopularDirectors();
		console.log(mostPopularDirectors);

		// Optionally, update the leaderboard in the HTML
		var leaderboard = document.querySelector("#directorlist");
		leaderboard.innerHTML = "";
		for (var i = 0; i < mostPopularDirectors.length; i++) {
			var li = document.createElement("li");
			li.textContent = mostPopularDirectors[i][0] + " (" + mostPopularDirectors[i][1] + " films)";
			leaderboard.appendChild(li);
		}





		// Function to get the top rated films (avScore)
		function getTopRatedFilms() {
			// Copy the array so we don't modify the original
			var topRatedFilms = EnrichedFilmData.slice(0);

			// Sort the array by avScore in descending order
			topRatedFilms.sort(function(a, b) {
				return b.avScore - a.avScore;
			});

			// Extract the top films (you can change the number to get more or fewer top films)
			topRatedFilms = topRatedFilms.slice(0, 10);

			return topRatedFilms;
		}

		// Call the function and log the result
		var topRatedFilms = getTopRatedFilms();
		console.log(topRatedFilms);

		// Optionally, update the leaderboard in the HTML
		var leaderboard = document.querySelector("#ratingList");
		leaderboard.innerHTML = "";
		for (var i = 0; i < topRatedFilms.length; i++) {
			var li = document.createElement("li");
			li.textContent = topRatedFilms[i].Title + " (" + topRatedFilms[i].avScore + ")";
			leaderboard.appendChild(li);
		}







		

		// Add event listener to the search form
		document.querySelector("form").addEventListener("submit", function(event){
			event.preventDefault();
			var searchtype = document.querySelector("select").value;
			var search = document.querySelector("input").value;
			ChooseFilter(searchtype, search);
		});


		function ChooseFilter(searchtype, search){

			console.log("Searching for " + search + " in " + searchtype);

			if(searchtype == "actor"){
				FilterFilmsByActor(search);
			}else if(searchtype == "film"){
				FilterFilmsByTitle(search);
			}else if(searchtype == "year"){
				FilterFilmsByYear(search);
			}else if(searchtype == "director"){
				FilterFilmsByDirector(search);
			}else if(searchtype == "picker"){
				FilterFilmsByPicker(search);
			}else if(searchtype == "decade"){
				FilterFilmsByDecade(search);
			}else if(searchtype == "country"){
				FilterFilmsByCountry(search);
			}else if(searchtype == "higherthanaverage"){
				FilterFilmsByHigherThanAverageRating(search);
			}else if(searchtype == "lowerthanaverage"){
				FilterFilmsByLowerThanAverageRating(search);
			}else{
				console.log("Invalid search type");
			}
		}


		function FilterFilmsByActor(actorname){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var actors = EnrichedFilmData[i].Actors;
				if(actors.includes(actorname)){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByTitle(title){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var filmtitle = EnrichedFilmData[i].Title;
				if(filmtitle.includes(title)){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByYear(year){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var filmyear = EnrichedFilmData[i].Year;
				if(filmyear.includes(year)){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByDirector(directorname){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var director = EnrichedFilmData[i].Director;
				if(director.includes(directorname)){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByPicker(pickername){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var picker = EnrichedFilmData[i].picker;
				if(picker.includes(pickername)){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByDecade(decade){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var filmyear = EnrichedFilmData[i].Year;
				// round the year to the nearest decade
				filmyear = Math.floor(filmyear/10)*10;
				if(filmyear == decade){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByCountry(country){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var filmcountry = EnrichedFilmData[i].Country;
				if(filmcountry.includes(country)){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByHigherThanAverageRating(rating){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var filmrating = EnrichedFilmData[i].avScore;
				if(filmrating > rating){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}

		function FilterFilmsByLowerThanAverageRating(rating){
			var filteredFilms = [];
			for( var i=0; i < EnrichedFilmData.length; i++)
			{
				var filmrating = EnrichedFilmData[i].avScore;
				if(filmrating < rating){
					filteredFilms.push(EnrichedFilmData[i]);
				}
			}
			UpdateGridTo(filteredFilms);
			return filteredFilms;
		}



		function UpdateGridTo(visibleFilmList){
			// Clear the grid
			document.querySelector(".grid-container").innerHTML = "";

			// Create a grid of film posters
			for( var i=0; i < visibleFilmList.length; i++)
			{
				var poster = visibleFilmList[i].Poster;
				var title = visibleFilmList[i].Title;
				var year = visibleFilmList[i].Year;
				var director = visibleFilmList[i].Director;
				var actors = visibleFilmList[i].Actors;
				var plot = visibleFilmList[i].Plot;
				var country = visibleFilmList[i].Country;
				var genre = visibleFilmList[i].Genre;
				var rating = visibleFilmList[i].imdbRating;
				var awards = visibleFilmList[i].Awards;
				var runtime = visibleFilmList[i].Runtime;

				var picker = visibleFilmList[i].picker;
				var avScore = visibleFilmList[i].avScore;
				// format date to dd/mm/yyyy
				var watchdate = visibleFilmList[i].watchdate;
				var dateParts = watchdate.split("-");
				watchdate = dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];

				var gridItem = document.createElement("div");
				gridItem.className = "grid-item";

				var img = document.createElement("img");
				img.src = poster;
				img.alt = title + " (" + year + ")";
				img.title = title + " (" + year + ")";

				/*var p = document.createElement("p");
				p.innerHTML = title + " (" + year + ")<br>" + director + "<br>" + actors + "<br>" + country + "<br>" + genre + "<br>" + rating + "<br>" + awards + "<br>" + runtime;*/

				// a Grid overlayed on the image where we can put some text
				var overlay = document.createElement("div");
				overlay.className = "overlay";
				overlay.innerHTML = title + " (" + year + ")<br><span style='font-size:12px'>Dir: " + director + "<br>Country: " + country + "<br>Genre: " + genre + "<br>Average Score: " + avScore + "<br>Watched On: " + watchdate + "<br>Picked by: " + picker + "</span>";


				gridItem.appendChild(img);
				//gridItem.appendChild(p);
				gridItem.appendChild(overlay);

				document.querySelector(".grid-container").appendChild(gridItem);
			}
		}




	</script>
</html>