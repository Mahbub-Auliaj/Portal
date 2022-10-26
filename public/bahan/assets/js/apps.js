var map, featureList, theaterSearch = [];

// $(window).resize(function() {
//   sizeLayerControl();
// });

$(document).on("click", ".feature-row", function(e) {
  $(document).off("mouseout", ".feature-row", clearHighlight);
  sidebarClick(parseInt($(this).attr("id"), 10));
});

if ( !("ontouchstart" in window) ) {
  $(document).on("mouseover", ".feature-row", function(e) {
    highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle));
  });
}

$(document).on("mouseout", ".feature-row", clearHighlight);
  
$("#about-btn").click(function() {
    $("#aboutModal").modal("show");
    $(".navbar-collapse.in").collapse("hide");
    return false;
    // console.log("oke")
  });
  
  $("#full-extent-btn").click(function() {
    map.fitBounds(boroughs.getBounds());
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });
  
  $("#legend-btn").click(function() {
    $("#legendModal").modal("show");
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });
  
  $("#login-btn").click(function() {
    $("#loginModal").modal("show");
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });
  
  $("#list-btn").click(function() {
    animateSidebar();
    return false;
  });
  
  $("#nav-btn").click(function() {
    $(".navbar-collapse").collapse("toggle");
    return false;
  });
  
  $("#sidebar-toggle-btn").click(function() {
    animateSidebar();
    return false;
  });
  
  $("#sidebar-hide-btn").click(function() {
    animateSidebar();
    return false;
  });
  
  function animateSidebar() {
    $("#sidebar").animate({
      width: "toggle"
    }, 350, function() {
      map.invalidateSize();
    });
  }

  function clearHighlight() {
    highlight.clearLayers();
  }

