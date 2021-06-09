let darkMode = false;
let local = window.localStorage;

if (local.getItem("dark-mode") == "true") {
  $("input").prop("checked", true);
  setDark();
} else {
  $("input").prop("checked", false);
  setLight();
}

$("#style-toggle").click(function () {
  $(this).toggleClass("down");
  if (darkMode == false) {
    setDark();
  } else {
    setLight();
  }
});

function setDark() {
  darkMode = true;
  local.setItem("dark-mode", "true");

  $("#darkMode").attr("data-theme", "dark");
  $("body").css({
    color: "lightgrey",
    "background-color": "rgb(38 42 45)",
  });
  $("nav").css({
    color: "white",
    "background-color": "#161B22",
    "border-bottom": "1px solid white",
  });
  $(".dataStyle").css({
    border: "1px solid white",
  });
  $("#countrySelect").css({
    color: "white",
  });
  $("option").css({
    color: "white",
    background: "#242a33",
  });
  $("#menuIcon").css({
    color: "white",
  });
  $(".modal-header").css({
    "background-color": "#161B22",
    color: "white",
  });
  $(".modal-body").css({
    "background-color": "rgb(38 42 45)",
    color: "white",
  });
  $(".modal-footer").css({
    "background-color": "#161B22",
    color: "white",
  });
  $("#synchronizeModalBtn").removeClass("btn-outline-dark");
  $("#synchronizeModalBtn").addClass("btn-outline-light");
  $("table").removeClass("table-white");
  $("table").addClass("table-dark");
  $("#countryBtn").addClass("btn-outline-light");
  $("#countryBtn").removeClass("btn-outline-dark");
}
function setLight() {
  darkMode = false;
  local.setItem("dark-mode", "false");

  $("#darkMode").attr("data-theme", "light");
  $("body").css({
    color: "black",
    "background-color": "white",
  });
  $("nav").css({
    color: "black",
    "background-color": "#e6e6e6",
    "border-bottom": "1px solid black",
  });
  $(".dataStyle").css({
    border: "1px solid black",
  });
  $("#countrySelect").css({
    color: "black",
  });
  $("option").css({
    color: "black",
    background: "white",
  });
  $("#menuIcon").css({
    color: "black",
  });
  $(".modal-header").css({
    "background-color": "#e6e6e6",
    color: "black",
  });
  $(".modal-body").css({
    "background-color": "white",
    color: "black",
  });
  $(".modal-footer").css({
    "background-color": "#e6e6e6",
    color: "black",
  });
  $("#synchronizeModalBtn").removeClass("btn-outline-light");
  $("#synchronizeModalBtn").addClass("btn-outline-dark");
  $("table").addClass("table-light");
  $("table").removeClass("table-dark");
  $("#countryBtn").addClass("btn-outline-dark");
  $("#countryBtn").removeClass("btn-outline-light");
}
