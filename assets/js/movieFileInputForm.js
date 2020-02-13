const
    movieSelector = document.getElementById("movie-edit-old"),
    arrayHiddenDiv = Array.from(document.getElementsByClassName("hidden")),

    inputTitle = document.getElementById("movie-title-edit"),
    inputGenre = document.getElementById("movie-genre-edit"),
    inputDirector = document.getElementById("movie-director-edit"),
    inputYear = document.getElementById("movie-year-edit"),
    inputPoster = document.getElementById("movie-poster-preview"),
    inputSynopsis = document.getElementById("movie-synopsis-edit");

movieSelector.addEventListener("change", () => {
    let
        movieSelected = movieSelector.options[movieSelector.selectedIndex].id,
        promiseMovie = getDBDataForMovie(movieSelected);


    promiseMovie.then(
        /**
         * @param {json} arrayMovie
         * @param {string} arrayMovie.title
         * @param {number} arrayMovie.genre
         * @param {number} arrayMovie.director
         * @param {number} arrayMovie.year
         * @param {string} arrayMovie.poster
         * @param {string} arrayMovie.synopsis
         */
        arrayMovie => {
            changeValueOfMovieInputs(
                arrayMovie.title, arrayMovie.genre,
                arrayMovie.director, arrayMovie.year,
                arrayMovie.poster, arrayMovie.synopsis
            );
            showHiddenDivs(arrayHiddenDiv);

        }
    )
});

/**
 * @param title {string}
 * @param genre {number}
 * @param director {number}
 * @param year {number}
 * @param poster {string}
 * @param synopsis {string}
 */
function changeValueOfMovieInputs(
    title, genre,
    director, year,
    poster, synopsis
) {
    inputTitle.value = title;
    inputGenre.selectedIndex = genre;
    inputDirector.selectedIndex = director;
    inputYear.value = year;
    inputPoster.src = "/Uploads/posters/" + poster;
    inputSynopsis.value = synopsis;
}

/**
 * @async
 * @param id
 * @returns {Promise<string>}
 */
async function getDBDataForMovie(id) {
    let data = await fetch("/admin/movie/get/" + id);
    return await data.json();
}

function showHiddenDivs(arrayDivs) {
    arrayDivs.forEach(hiddenDiv => {
        hiddenDiv.classList.remove("hidden");
    });
}


$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
