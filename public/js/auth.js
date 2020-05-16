/**
 * Created by Desarrollador on 2/06/2017.
 */

googleApiClientReady = function () {


    var nombrePelicula = $("#nombrePelicula").text();

    gapi.auth.init(function () {
        gapi.client.setApiKey("AIzaSyBzTN3LNkBoPmE6UIjoFnwGhax6TJAOWhQ");
        gapi.client.load("youtube", "v3", function () {
            var request = gapi.client.youtube.search.list({
                q: "trailer " + nombrePelicula,
                part: 'snippet',
                type: 'video',
                maxResults: 2
            });

            request.execute(function (response) {
                var results = response.result;
                $("#results").html("");
                $.each(results.items, function (index, item) {

                    console.log(item.id.videoId);

                    var videoID = item.id.videoId;

                    $("#results").append(
                        "<div class='col-md-6'>" +
                        "<iframe  height='400' width='500' src='https://www.youtube.com/embed/" + videoID + "'></iframe>" +
                        "</div>"
                    );
                });
                resetVideoHeight();
            });
        });
    });
};


function resetVideoHeight() {
    $(".video").css("height", $("#results").width() * 9 / 16);
}