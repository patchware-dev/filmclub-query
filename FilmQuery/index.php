<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css?test=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<script type="text/javascript" src="../Data/FilmList.js?version=3"></script>
	
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
					<option value="decade">Films from the decade beginning: </option>
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
				<div id="loading-bar-container">
					<div id="loading-bar"></div>
				</div>
			</div>
		</div>


		<div id="leaderboard-section" class="section" align="center">
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

		 

		
		//loading message in gridCONTAINER
		var gridContainer =  document.querySelector(".grid-container");
		
		// FILMLIST lives in FilmList-TEST.js
		var EnrichedFilmData = [];
		var totalFilms = filmlist.length;
   		var loadedFilms = 0;
		var APIcalls = 0;

		var filmPromises = filmlist.map(function(film) {
			return getFilmData(film.title, film.year).then(function(data) {
				if (data) {
					data.watchdate = film.watchdate;
					data.picker = film.picker;
					data.avScore = film.avScore;
					EnrichedFilmData.push(data);
				}
				loadedFilms++;
            	updateLoadingBar(loadedFilms, totalFilms);
			});
		});

		// Function to get film data from cache or API
		function getFilmData(title, year) {

			var cacheKey = title + "_" + year;
			var cachedData = localStorage.getItem(cacheKey);

			if (cachedData) {

				console.log("Using cached data for " + title + " (" + year + ")");
				return Promise.resolve(JSON.parse(cachedData));

			} else {

				console.log("Fetching fresh data for " + title + " (" + year + ")");
				var URL = "https://www.omdbapi.com/?apikey=9e1b6cd0&t=" + encodeURI(title) + "&y=" + year;
				return $.getJSON(URL).then(function(data) {
					if (data.Response == "True") {
						localStorage.setItem(cacheKey, JSON.stringify(data));
						return data;
					} else {
						console.log("Error fetching data for " + title + " (" + year + ")");
						return null;
					}
				});
				APIcalls++;
			}
		}

		// Function to update the loading bar
		function updateLoadingBar(loaded, total) {
			var percentage = (loaded / total) * 100;
			var loadingBar = document.getElementById("loading-bar");
			loadingBar.style.width = percentage + "%";
			loadingBar.textContent = Math.round(percentage) + "%";
		}

		Promise.all(filmPromises).then(function() {
			console.log(EnrichedFilmData);
			console.log("API calls: " + APIcalls);
			document.getElementById("filmcount").innerHTML = EnrichedFilmData.length;

			// Populate the lists of most popular actors and directors
			// ACTORS
			var mostPopularActors = getMostPopularActors();
			var leaderboard = document.querySelector("#actorlist");
			leaderboard.innerHTML = "";
			for (var i = 0; i < mostPopularActors.length; i++) {
				var li = document.createElement("li");
				li.textContent = mostPopularActors[i][0] + " (" + mostPopularActors[i][1] + " films)";
				leaderboard.appendChild(li);
			}
			
			// DIRECTORS
			var mostPopularDirectors = getMostPopularDirectors();
			var leaderboard = document.querySelector("#directorlist");
			leaderboard.innerHTML = "";
			for (var i = 0; i < mostPopularDirectors.length; i++) {
				var li = document.createElement("li");
				li.textContent = mostPopularDirectors[i][0] + " (" + mostPopularDirectors[i][1] + " films)";
				leaderboard.appendChild(li);
			}
			
			// TOP RATED
			var topRatedFilms = getTopRatedFilms();
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
		});

		

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
				if(actors.toLowerCase().includes(actorname.toLowerCase())){
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
				if(filmtitle.toLowerCase().includes(title.toLowerCase())){
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
				if(director.toLowerCase().includes(directorname.toLowerCase())){
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
				if(picker.toLowerCase().includes(pickername.toLowerCase())){
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
				if(filmcountry.toLowerCase().includes(country.toLowerCase())){
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
				if(EnrichedFilmData[i].avScore == "" || EnrichedFilmData[i].avScore == null){
					continue;
				}
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
			gridContainer.innerHTML = "";

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

				var pFlag = document.createElement("span");

				pFlag.classList.add("pickerFlag", picker + "Col");
				
				pFlag.innerHTML = picker;


				gridItem.appendChild(img);
				gridItem.appendChild(overlay);
				gridItem.appendChild(pFlag);

				document.querySelector(".grid-container").appendChild(gridItem);
			}
		}




	</script>
</html>