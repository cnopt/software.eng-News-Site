function hideNav() {
    // used to hide the side navigation menu, when the user clicks the X
    document.getElementById("sideNav").style.transform = "translateX(-250px)";
}

function showNav() {
    // used to show the side nav menu, when the user clicks the 'burger' button
    document.getElementById("sideNav").style.transform = "translateX(0)";
}


function enterToSearch() {
  // function to ensure the enter key performs the form's "action" attribute,
  // in this case, performs a search
  var input = document.getElementById("headerSearchBar");
  input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) { // 13 is the enter key
      document.getElementById("headerSearchBtn").click(); // click the header's hidden search button
    }
  });
}

function mobileEnterToSearch() {
  // same function, but on a different element of the page
  // - the mobile search bar inside the side nav, only viewable on mobile resolutions
  var input = document.getElementById("sideNavSearchBar");
  input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
      document.getElementById("headerSearchBtn").click();
    }
  });
}
