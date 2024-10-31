<div align="center" id="searchbar">
    <h1>filmQuery</h1>
    <p>query films watched in filmclub</p>

    <form action="index.php" method="get">
        <!-- Select the search type - Actor, film, year -->
        <select name="searchtype">
            <option value="actor">Films starring:</option>
            <option value="film">Films called: </option>
            <option value="year">Films from the year: </option>
            <option value="year">Films directed by: </option>
        </select>
        <input type="text" name="search" placeholder="Lorem Ipsum">
        <input type="submit" value="Search">
    </form>

</div>