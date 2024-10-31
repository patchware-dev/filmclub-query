var filmlist = [
	
	{title: "Prospect", year: "2018", watchdate:"2020-05-13", picker: "Phil", avScore: "2.57" },
	{title: "Solaris", year: "1972", watchdate:"2020-05-20", picker: "Vas", avScore: "3" },
	{title: "The Autopsy of Jane Doe", year: "2016", watchdate:"2020-05-27", picker: "Dom", avScore: "3" },
	{title: "Raw", year: "2016", watchdate:"2020-06-03", picker: "Jack", avScore: "3" },
	{title: "The Platform", year: "2019", watchdate:"2020-06-10", picker: "Kelv", avScore: "3" },
	{title: "The Wolf Brigade", year: "2018", watchdate:"2020-06-17", picker: "Kitt", avScore: "1.5" },
	{title: "Saw", year: "2004", watchdate:"2020-06-24", picker: "Kyle", avScore: "3.5" },
	{title: "The Vast of Night", year: "2019", watchdate:"2020-07-01", picker: "Phil", avScore: "2.86" },
	{title: "Miss Violence", year: "2013", watchdate:"2020-07-08", picker: "Vas", avScore: "1.57" },
	{title: "Coherence", year: "2013", watchdate:"2020-07-15", picker: "Dom", avScore: "3.71" },
	{title: "Moonlight", year: "2016", watchdate:"2020-07-29", picker: "Jack", avScore: "3.8" },
	{title: "Fast Color", year: "2018", watchdate:"2020-08-05", picker: "Kitt", avScore: "2" },
	{title: "Prevenge", year: "2016", watchdate:"2020-08-12", picker: "Kelv", avScore: "3.33" },
	{title: "Booksmart", year: "2019", watchdate:"2020-09-09", picker: "Kyle", avScore: "3.57" },
	{title: "Red Sorghum", year: "1988", watchdate:"2020-09-16", picker: "Phil", avScore: "2.33" },
	{title: "500 days of Summer", year: "2009", watchdate:"2020-09-23", picker: "Vas", avScore: "2.71" },
	{title: "A Simple Plan", year: "1998", watchdate:"2020-09-30", picker: "Dom", avScore: "2.6" },
	{title: "I'm Thinking of Ending Things", year: "2020", watchdate:"2020-10-07", picker: "Jack", avScore: "3.29" },
	{title: "Midsommar", year: "2019", watchdate:"2020-10-14", picker: "Kyle", avScore: "4.14" },
	{title: "Extraction", year: "2020", watchdate:"2020-10-21", picker: "Kelv", avScore: "3" },
	{title: "The Martian", year: "2015", watchdate:"2020-10-28", picker: "Kitt", avScore: "4.14" },
	{title: "Call Me By Your Name", year: "2017", watchdate:"2020-11-04", picker: "Phil", avScore: "3.14" },
	{title: "The Handmaiden", year: "2016", watchdate:"2020-11-11", picker: "Vas", avScore: "4" },
	{title: "Beyond the Black Rainbow", year: "2010", watchdate:"2020-11-18", picker: "Dom", avScore: "2" },
	{title: "Upgrade", year: "2018", watchdate:"2020-12-25", picker: "Jack", avScore: "3.57" },
	{title: "Sleeping with Other People", year: "2015", watchdate:"2020-12-02", picker: "Kelv", avScore: "2.57" },
	{title: "The Endless", year: "2017", watchdate:"2020-12-09", picker: "Kitt", avScore: "3.43" },
	{title: "Under the Skin", year: "2013", watchdate:"2020-12-16", picker: "Kyle", avScore: "3.14" },
	{title: "A Dark Song", year: "2016", watchdate:"2020-12-23", picker: "Phil", avScore: "3" },
	{title: "Shaun of the Dead", year: "2004", watchdate:"2020-12-30", picker: "Kyle", avScore: "4.43" },
	{title: "Rosemary's baby", year: "1968", watchdate:"2021-01-06", picker: "Vas", avScore: "3.5" },
	{title: "Possessor", year: "2020", watchdate:"2021-01-13", picker: "Jack", avScore: "4" },
	{title: "Blade II", year: "2002", watchdate:"2021-01-21", picker: "Kelv", avScore: "2.43" },
	{title: "Train to Busan", year: "2016", watchdate:"2021-01-27", picker: "Kitt", avScore: "3.71" },
	{title: "Tusk", year: "2014", watchdate:"2021-02-03", picker: "Kyle", avScore: "2.43" },
	{title: "Three Days of the Condor", year: "1975", watchdate:"2021-02-10", picker: "Phil", avScore: "3" },
	{title: "Constantine", year: "2005", watchdate:"2021-02-17", picker: "Dom", avScore: "2.86" },
	{title: "Zodiac", year: "2007", watchdate:"2021-02-03", picker: "Dom", avScore: "" },
	{title: "Nightcrawler", year: "2014", watchdate:"2021-02-24", picker: "Vas", avScore: "4.71" },
	{title: "Frank", year: "2014", watchdate:"2021-03-03", picker: "Dom", avScore: "3.29" },
	{title: "Shallow Grave", year: "1994", watchdate:"2021-03-10", picker: "Jack", avScore: "2.71" },
	{title: "Castle in the Sky", year: "1986", watchdate:"2021-03-17", picker: "Kelv", avScore: "2.86" },
	{title: "Gamorrah", year: "2008", watchdate:"2021-03-24", picker: "Kitt", avScore: "2.71" },
	{title: "Beverly Hills Cop", year: "1984", watchdate:"2021-03-31", picker: "Kyle", avScore: "2.86" },
	{title: "Nocturnal Animals", year: "2016", watchdate:"2021-04-07", picker: "Phil", avScore: "3.86" },
	{title: "Immortal Beloved", year: "1994", watchdate:"2021-04-14", picker: "Vas", avScore: "1.71" },
	{title: "Kon-Tiki", year: "2012", watchdate:"2021-04-21", picker: "Dom", avScore: "3.57" },
	{title: "Jacobs Ladder", year: "1990", watchdate:"2021-04-28", picker: "Jack", avScore: "2.57" },
	{title: "Grizzly Man", year: "2005", watchdate:"2021-05-05", picker: "Kelv", avScore: "3.43" },
	{title: "The Laundromat", year: "2019", watchdate:"2021-05-12", picker: "Kitt", avScore: "2.43" },
	{title: "Rush", year: "2013", watchdate:"2021-05-19", picker: "Kyle", avScore: "4" },
	{title: "Everest", year: "2015", watchdate:"2021-05-26", picker: "Phil", avScore: "3.43" },
	{title: "Moon", year: "2009", watchdate:"2021-06-02", picker: "Vas", avScore: "3.14" },
	{title: "Mirage", year: "2018", watchdate:"2021-06-09", picker: "Dom", avScore: "2.67" },
	{title: "Triangle", year: "2009", watchdate:"2021-06-16", picker: "Jack", avScore: "3.57" },
	{title: "Searching", year: "2018", watchdate:"2021-06-23", picker: "Kelv", avScore: "4" },
	{title: "The Game", year: "1997", watchdate:"2021-06-30", picker: "Kyle", avScore: "3.57" },
	{title: "Arrival", year: "2016", watchdate:"2021-07-14", picker: "Kitt", avScore: "4.71" },
	{title: "Clue", year: "1985", watchdate:"2021-07-21", picker: "Phil", avScore: "3.67" },
	{title: "Fighting with my Family", year: "2019", watchdate:"2021-07-28", picker: "Dom", avScore: "3.4" },
	{title: "The Borderlands", year: "2013", watchdate:"2021-08-04", picker: "Jack", avScore: "2.67" },
	{title: "BlackKklansman", year: "2018", watchdate:"2021-08-18", picker: "Kelv", avScore: "3" },
	{title: "A Fish Called Wanda", year: "1988", watchdate:"2021-08-25", picker: "Kitt", avScore: "2.86" },
	{title: "One Cut of the Dead", year: "2017", watchdate:"2021-09-01", picker: "Kyle", avScore: "3.8" },
	{title: "Enemy", year: "2013", watchdate:"2021-09-15", picker: "Phil", avScore: "3" },
	{title: "Color out of Space", year: "2019", watchdate:"2021-09-22", picker: "Dom", avScore: "2.8" },
	{title: "Surge", year: "2020", watchdate:"2021-10-06", picker: "Jack", avScore: "1.67" },
	{title: "Four Lions", year: "2010", watchdate:"2021-10-13", picker: "Kelv", avScore: "3.8" },
	{title: "The Guilty", year: "2021", watchdate:"2021-11-03", picker: "Kitt", avScore: "2.83" },
	{title: "The Silence of the Lambs", year: "1991", watchdate:"2021-11-10", picker: "Kyle", avScore: "4.43" },
	{title: "The Harder they Fall", year: "2021", watchdate:"2021-11-17", picker: "Phil", avScore: "2.33" },
	{title: "24 Hour Party People", year: "2002", watchdate:"2021-11-24", picker: "Kyle", avScore: "3.29" },
	{title: "Saint Maud", year: "2019", watchdate:"2021-12-01", picker: "Jack", avScore: "3.29" },
	{title: "The Night Eats the World", year: "2018", watchdate:"2021-12-08", picker: "Kelv", avScore: "3.29" },
	{title: "Life", year: "2017", watchdate:"2021-12-15", picker: "Kitt", avScore: "3.57" },
	{title: "Melancholia", year: "2011", watchdate:"2021-12-22", picker: "Phil", avScore: "2.57" },
	{title: "Mr Brooks", year: "2007", watchdate:"2022-01-05", picker: "Dom", avScore: "2.86" },
	{title: "Identity", year: "2003", watchdate:"2022-01-12", picker: "Vas", avScore: "2.71" },
	{title: "Don't Look Up", year: "2021", watchdate:"2022-01-19", picker: "", avScore: "3.71" },
	{title: "Ladybird", year: "2017", watchdate:"2022-01-26", picker: "Vas", avScore: "3.14" },
	{title: "Ford v Ferrari", year: "2019", watchdate:"2022-02-02", picker: "Dom", avScore: "3.5" },
	{title: "The Machinist", year: "2004", watchdate:"2022-02-09", picker: "Jack", avScore: "3" },
	{title: "Kill Your Darlings", year: "2013", watchdate:"2022-02-23", picker: "Kelv", avScore: "2" },
	{title: "Kodachrome", year: "2017", watchdate:"2022-03-02", picker: "Kitt", avScore: "2" },
	{title: "Mother!", year: "2017", watchdate:"2022-03-09", picker: "Kyle", avScore: "3.83" },
	{title: "Calvary", year: "2014", watchdate:"2022-03-23", picker: "Phil", avScore: "3.71" },
	{title: "The Last Boy Scout", year: "1991", watchdate:"2022-03-30", picker: "Dom", avScore: "2.2" },
	{title: "The Tree of Life", year: "2011", watchdate:"2022-04-06", picker: "Jack", avScore: "2.4" },
	{title: "Nikita", year: "1990", watchdate:"2022-04-13", picker: "Kelv", avScore: "3.33" },
	{title: "Hannah and her Sisters", year: "1986", watchdate:"2022-04-20", picker: "Vas", avScore: "2.33" },
	{title: "The Hunt for Red October", year: "1990", watchdate:"2022-04-27", picker: "Kitt", avScore: "3.86" },
	{title: "Point Break", year: "1991", watchdate:"2022-05-04", picker: "Kyle", avScore: "3.83" },
	{title: "Philomena", year: "2013", watchdate:"2022-05-11", picker: "Phil", avScore: "4" },
	{title: "25th Hour", year: "2002", watchdate:"2022-05-18", picker: "Vas", avScore: "3" },
	{title: "Primer", year: "2004", watchdate:"2022-06-15", picker: "Jack", avScore: "3.29" },
	{title: "Chinatown", year: "1974", watchdate:"2022-06-22", picker: "Kelv", avScore: "3.6" },
	{title: "Drive", year: "2011", watchdate:"2022-06-29", picker: "Kyle", avScore: "4.33" },
	{title: "Oblivion", year: "2013", watchdate:"2022-07-06", picker: "Phil", avScore: "3" },
	{title: "Us", year: "2019", watchdate:"2022-07-13", picker: "Dom", avScore: "3.33" },
	{title: "The Departed", year: "2006", watchdate:"2022-07-20", picker: "Kitt", avScore: "4.71" },
	{title: "Star Trek II: The Wrath of Khan", year: "1982", watchdate:"2022-07-27", picker: "Dom", avScore: "4.29" },
	{title: "Babel", year: "2006", watchdate:"2022-08-03", picker: "Jack", avScore: "3.29" },
	{title: "Lost in Translation", year: "2003", watchdate:"2022-08-10", picker: "Vas", avScore: "4.14" },
	{title: "Everything Everywhere All at Once", year: "2022", watchdate:"2022-08-24", picker: "Kelv", avScore: "4.29" },
	{title: "War Games", year: "1983", watchdate:"2022-09-07", picker: "Kyle", avScore: "3" },
	{title: "Moneyball", year: "2011", watchdate:"2022-09-21", picker: "Phil", avScore: "3.67" },
	{title: "The Untouchables", year: "1987", watchdate:"2022-09-28", picker: "Vas", avScore: "4" },
	{title: "Blonde", year: "2022", watchdate:"2022-10-05", picker: "Dom", avScore: "1.67" },
	{title: "Licorice Pizza", year: "2021", watchdate:"2022-10-12", picker: "Jack", avScore: "2.86" },
	{title: "In Bruges", year: "2008", watchdate:"2022-10-19", picker: "Kitt", avScore: "4.67" },
	{title: "The Belko Experiment", year: "2016", watchdate:"2022-10-26", picker: "Kyle", avScore: "2.43" },
	{title: "Tenet", year: "2020", watchdate:"2022-11-02", picker: "Kelv", avScore: "3.14" },
	{title: "Michael Clayton", year: "2007", watchdate:"2022-11-09", picker: "Phil", avScore: "3.43" },
	{title: "Dolemite is my Name", year: "2019", watchdate:"2022-11-16", picker: "Dom", avScore: "3.57" },
	{title: "I Saw The Devil", year: "2010", watchdate:"2022-11-23", picker: "Vas", avScore: "3.17" },
	{title: "Another Round", year: "2020", watchdate:"2022-11-30", picker: "Jack", avScore: "3.17" },
	{title: "Predestination", year: "2014", watchdate:"2022-12-07", picker: "Kelv", avScore: "3.71" },
	{title: "Dead Snow 2: Red or Dead", year: "2014", watchdate:"2022-12-14", picker: "Kitt", avScore: "2.8" },
	{title: "Krampus", year: "2015", watchdate:"2022-12-21", picker: "Kyle", avScore: "3.5" },
	{title: "Glass Onion", year: "2022", watchdate:"2023-01-04", picker: "Phil", avScore: "3.86" },
	{title: "The Banshees of Inisherin", year: "2022", watchdate:"1900-01-00", picker: "", avScore: "" },
	{title: "Searching for Sugar Man", year: "2012", watchdate:"2023-01-11", picker: "Dom", avScore: "3.17" },
	{title: "Mad God", year: "2021", watchdate:"2023-01-18", picker: "Jack", avScore: "2.67" },
	{title: "Best in Show", year: "2000", watchdate:"2023-01-25", picker: "Kelv", avScore: "2.86" },
	{title: "Rope", year: "1948", watchdate:"2023-02-01", picker: "Vas", avScore: "3" },
	{title: "The Man from Earth", year: "2007", watchdate:"2023-02-08", picker: "Kitt", avScore: "3.14" },
	{title: "Selma", year: "2014", watchdate:"2023-02-15", picker: "Phil", avScore: "3.8" },
	{title: "Tucker and Dale vs. Evil", year: "2010", watchdate:"2023-02-22", picker: "Kyle", avScore: "3" },
	{title: "Face/Off", year: "1997", watchdate:"2023-04-19", picker: "Vas", avScore: "4" },
	{title: "The Fugitive", year: "1993", watchdate:"2023-05-10", picker: "Dom", avScore: "4.17" },
	{title: "Snatch", year: "2000", watchdate:"2023-05-17", picker: "Jack", avScore: "3.86" },
	{title: "12 Angry Men", year: "1957", watchdate:"2023-05-24", picker: "Kelv", avScore: "4.5" },
	{title: "Memento", year: "2000", watchdate:"2023-05-31", picker: "Kyle", avScore: "4.17" },
	{title: "Galaxy Quest", year: "1999", watchdate:"2023-06-07", picker: "Phil", avScore: "3.86" },
	{title: "The Italian Job", year: "2003", watchdate:"2023-06-19", picker: "Vas", avScore: "2.4" },
	{title: "Night of the Creeps", year: "1986", watchdate:"2023-06-26", picker: "Dom", avScore: "3" },
	{title: "The Dead Zone", year: "1983", watchdate:"2023-07-05", picker: "Jack", avScore: "2.2" },
	{title: "Superman 2", year: "1980", watchdate:"2023-07-12", picker: "Kyle", avScore: "3" },
	{title: "Locke", year: "2014", watchdate:"2023-07-26", picker: "Kelv", avScore: "3.4" },
	{title: "Hellraiser", year: "1987", watchdate:"2023-08-02", picker: "Ivan", avScore: "3.4" },
	{title: "Tumbbad", year: "2018", watchdate:"2023-08-09", picker: "Dom", avScore: "2.67" },
	{title: "Where the Crawdads Sing", year: "2022", watchdate:"2023-08-16", picker: "Vas", avScore: "2.17" },
	{title: "Triangle of Sadness", year: "2022", watchdate:"2023-08-23", picker: "Jack", avScore: "3.33" },
	{title: "Das Boot", year: "1981", watchdate:"2023-08-30", picker: "Kelv", avScore: "3.8" },
	{title: "Survive Style 5+", year: "2004", watchdate:"2023-09-06", picker: "Ivan", avScore: "2.5" },
	{title: "Step-Brothers", year: "2008", watchdate:"2023-10-04", picker: "Kyle", avScore: "2.6" },
	{title: "Infinity Pool", year: "2023", watchdate:"2023-10-11", picker: "Jack", avScore: "3" },
	{title: "Exam", year: "2009", watchdate:"2023-10-18", picker: "Dom", avScore: "2.83" },
	{title: "The Breakfast Club", year: "1985", watchdate:"2023-10-25", picker: "Vas", avScore: "3.8" },
	{title: "Pain & Gain", year: "2013", watchdate:"2023-11-08", picker: "Kyle", avScore: "2.86" },
	{title: "Wild Bill", year: "2011", watchdate:"2023-11-15", picker: "Kelv", avScore: "3.5" },
	{title: "The Faculty", year: "1998", watchdate:"2023-11-22", picker: "Ivan", avScore: "4.33" },
	{title: "Heathers", year: "1988", watchdate:"2023-11-29", picker: "Phil", avScore: "2.5" },
	{title: "Tron: Legacy", year: "2010", watchdate:"2023-12-13", picker: "Vas", avScore: "3.14" },
	{title: "Raising Arizona", year: "1987", watchdate:"2023-12-13", picker: "Dom", avScore: "4" },
	{title: "Layer Cake", year: "2004", watchdate:"2023-12-27", picker: "Kelv", avScore: "3.6" },
	{title: "Tick, Tick...Boom!", year: "2021", watchdate:"2024-01-03", picker: "Jack", avScore: "3.71" },
	{title: "Extraction II", year: "2023", watchdate:"2024-01-03", picker: "Kyle", avScore: "2.5" },
	{title: "Society of the Snow", year: "2023", watchdate:"2024-01-10", picker: "Phil", avScore: "3.86" },
	{title: "Black Dynamite", year: "2009", watchdate:"2024-01-24", picker: "Ivan", avScore: "2.86" },
	{title: "...And Justice for All", year: "1979", watchdate:"2024-01-24", picker: "Vas", avScore: "3.67" },
	{title: "Good Time", year: "2017", watchdate:"2024-01-31", picker: "Dom", avScore: "2.83" },
	{title: "Run, Lola, Run", year: "1998", watchdate:"2024-02-07", picker: "Jack", avScore: "3.2" },
	{title: "Quiz Show", year: "1994", watchdate:"2024-02-21", picker: "Kelv", avScore: "3.25" },
	{title: "After Hours", year: "1985", watchdate:"2024-02-28", picker: "Ivan", avScore: "4" },
	{title: "Glengarry Glen Ross", year: "1992", watchdate:"2024-03-06", picker: "Phil", avScore: "4.5" },
	{title: "Brazil", year: "1985", watchdate:"2024-03-13", picker: "Vas", avScore: "2.6" },
	{title: "End of Watch", year: "2012", watchdate:"2024-03-20", picker: "Dom", avScore: "4" },
	{title: "Lake Mungo", year: "2008", watchdate:"2024-03-27", picker: "Jack", avScore: "3.8" },
	{title: "Bad Boys for Life", year: "2020", watchdate:"2024-04-03", picker: "Kelv", avScore: "2.8" },
	{title: "Tango & Cash", year: "1989", watchdate:"2024-04-10", picker: "Kyle", avScore: "3.14" },
	{title: "Dark City", year: "1998", watchdate:"2024-04-17", picker: "Ivan", avScore: "3.6" },
	{title: "The Mosquito Coast", year: "1986", watchdate:"2024-04-24", picker: "Phil", avScore: "2.5" },
	{title: "The Outfit", year: "2022", watchdate:"2024-05-08", picker: "Dom", avScore: "3.57" },
	{title: "Boys Don't Cry", year: "1999", watchdate:"2024-05-15", picker: "Vas", avScore: "2.8" },
	{title: "Insomnia", year: "2002", watchdate:"2024-05-22", picker: "Jack", avScore: "3.4" },
	{title: "Murder by Death", year: "1976", watchdate:"2024-05-29", picker: "Kelv", avScore: "3.67" },
	{title: "Red State", year: "2011", watchdate:"2024-06-05", picker: "Kyle", avScore: "2.83" },
	{title: "Miss Congeniality", year: "2000", watchdate:"2024-06-12", picker: "Phil", avScore: "3.17" },
	{title: "Synchronic", year: "2019", watchdate:"2024-06-26", picker: "Ivan", avScore: "3.57" },
	{title: "Time Addicts", year: "2023", watchdate:"2024-07-17", picker: "Dom", avScore: "3" },
	{title: "Thoroughbreds", year: "2017", watchdate:"2024-07-17", picker: "Jack", avScore: "2.8" },
	{title: "Looper", year: "2012", watchdate:"2024-07-17", picker: "Kyle", avScore: "3.5" },
	{title: "Contact", year: "1997", watchdate:"2024-07-31", picker: "Phil", avScore: "3.71" },
	{title: "In Time", year: "2011", watchdate:"2024-08-07", picker: "Vas", avScore: "2.71" },
	{title: "Brick", year: "2005", watchdate:"2024-08-14", picker: "Kelv", avScore: "1.71" },
	{title: "Return of the Killer Tomatoes!", year: "1988", watchdate:"2024-08-14", picker: "Ivan", avScore: "3" },
	{title: "Amerika Square", year: "2016", watchdate:"2024-08-21", picker: "Vas", avScore: "3.33" },
	{title: "Before I Wake", year: "2016", watchdate:"2024-08-28", picker: "Dom", avScore: "2.8" },
	{title: "Night Moves", year: "2013", watchdate:"2024-09-11", picker: "Jack", avScore: "3.2" },
	{title: "3:10 to Yuma", year: "2007", watchdate:"2024-09-18", picker: "Kelv", avScore: "4.4" },
	{title: "Duplicity", year: "2009", watchdate:"2024-09-25", picker: "Phil", avScore: "3" }
	
	

	
];