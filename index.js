var maxRes = 3;
var key = 'AIzaSyBnjpUCtArKJAgCbGUCU8umpHB9kXxNIio';
var i = 0;

var postArray = [];

window.onscroll = function () { navBarUpdate() };

$(document).ready(function () {
    googleTrackData();
    getYouTubeData();
    getYouTubeVideos();
    getPosts();
    $(".slide-close").click(function (e) {
        document.getElementsByClassName("slide-nav-bar")[0].style = "left: -175px;";
        document.getElementsByClassName("home-title")[0].style = "visibility: visible";
    });
    $("#bars").click(function (e) {
        document.getElementsByClassName("slide-nav-bar")[0].style = "left: 0px;";
        document.getElementsByClassName("home-title")[0].style = "visibility: hidden";
    });
    $(".show-more-btn").click(function (e) {
        maxRes = maxRes + 2;
        i = maxRes - 2;
        getYouTubeVideos();
    });
    $('#read-more').click(function (e) {
        document.getElementById("more").style.display = "inline";
        document.getElementById("dots").style.display = "none";
        document.getElementById("read-more").innerHTML = "Read Less";
    });
});

function getPosts() {
    $.post('includes/getPosts.php', function (data) {
        var secArr = data.split('_');
        secArr.forEach(function (item) {
            outputPosts(item);
        });
    });
}

function readMore(){
    document.getElementById("more").style.display = "inline";
    document.getElementById("dots").style.display = "none";
    document.getElementById("read-more").style.visibility = "hidden";
}

function outputPosts(item) {
    var itemArr = item.split("#");
    if (!(itemArr == "")) {
        $('.post-container').append(
            `      <div class="post-details">
            <h1>${itemArr[0]}</h1>
            <h2>${itemArr[1]}</h2>
            <h3>${itemArr[2]}</h3>
            </div>`
        );
    }
}

function splitText(str) {
    if ((str.split(" ").length) >= 15) {
        return str.split(/\s+/).slice(0, 20).join(" ");
    }
}

function other(str) {
    var max = (str.split(" ").length);
    return str.split(/\s+/).slice(20, max).join(" ");
}

function getYouTubeVideos() {
    var playlistId = 'PLz1Q8WO0SthTpBimlRR9nkkTVvioamSNP';
    var URL = 'https://www.googleapis.com/youtube/v3/playlistItems';
    var options = {
        part: 'snippet, contentDetails',
        key: key,
        maxResults: maxRes,
        playlistId: playlistId
    }
    $.getJSON(URL, options, function (data) {
        try {
            for (i; i < maxRes; i++) {
                mainVideos(data.items[i]);
            }
        } catch (err) {
            $(".more-btn").attr("disabled", true);
            document.getElementsByClassName("more-btn")[0].textContent = "No More Videos";
        }
    })

    function mainVideos(item) {
        $('.video-container').append(
            `<article>
                    <div class="details">
                        <h1 class="title">${checkTitleLength(item.snippet.title)}</h1>
                        <h3 class="description">${checkDescLength(item.snippet.description)}</h3>
                    </div>
                    <div class="videoDisplay">
                        <iframe width: "1280" height: "720" class = "video" src="https://www.youtube.com/embed/${item.snippet.resourceId.videoId}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    </article>`
        );

    }
}

function googleTrackData(){
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-140627963-1');
}

function getYouTubeData() {
    var URL = "https://www.googleapis.com/youtube/v3/channels";
    var channelID = "UCFzlbFEnI6-RtqKjLYA7FNg";

    var options = {
        part: 'statistics',
        key: key,
        id: channelID
    }
    $.getJSON(URL, options, function (data) {
        var viewCount = data.items[0].statistics.viewCount;
        var subscriberCount = data.items[0].statistics.subscriberCount;
        $('.home-text-stat').html(
            `<h3>${numberWithCommas(subscriberCount)} Subscribers - ${numberWithCommas(viewCount)} Views</h3>`
        );
    })
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function checkTitleLength(str) {
    if ((str.split(" ").length) <= 5) {
        return str.split(/\s+/).slice(0, 5).join(" ");
    }
    else {
        return str.split(/\s+/).slice(0, 5).join(" ") + "...";
    }
}

function checkDescLength(str) {
    return str.split(/\s+/).slice(0, 25).join(" ") + "...";
}

function navBarUpdate() {
    if (document.body.scrollTop > document.body.clientHeight / 25 || document.documentElement.scrollTop > document.body.clientHeight / 25) {
        document.getElementById("nav-bar").style.backgroundColor = "#1a1a1a";
    }
    else {
        document.getElementById("nav-bar").style.backgroundColor = "transparent";
    }
}