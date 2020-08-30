$(document).ready(function(){
    $(".dropdown").mouseenter(function(){
        $(this).addClass("open");

    });

	$(".dropdown").mouseleave(function(){
        $(this).removeClass("open");
    });


    /*navbar shrink*/
    $(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('shrink');
  } else {
    $('nav').removeClass('shrink');
  }
});

    $(".navbar-brand").mouseenter(function(){
          $(this).addClass("pulse infinite");
      });

      $(".navbar-brand").mouseleave(function(){
            $(this).removeClass("pulse infinite");
        });


        $(".change").mouseenter(function(){
            $(this).addClass("hidden");

        });
});


/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}



//webcamImage
function take_snapshot() {
  // take snapshot and get image data
  Webcam.snap( function(data_uri) {
    // display results in page

    document.getElementById('results').innerHTML =
      '<h2>Processing:</h2>';

    Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
      document.getElementById('results').innerHTML =
      '<h2>Here is your image:</h2>' +
      '<img src="'+text+'"/>';
    } );
  } );
}
