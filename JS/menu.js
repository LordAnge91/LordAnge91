
   // nav menu
  // to the clicked part

document.getElementById("menuOpen").onclick = function() {menu()};
document.getElementById("menuClose").onclick = function() {menu()};
document.getElementById("menuClose1").onclick = function() {menu()};

  // the hidden part

function menu() {
  document.getElementById("myDropdown").classList.toggle("show");
}


// Main tab mono-opening

var tabIndex = 1;
showTab(tabIndex);

// tab activation control

function currentTab(n) {
  showTab(tabIndex = n);
}

function showTab(n) {
  var i;
  var tabs = document.getElementsByClassName("myMainTab");
  var tab = document.getElementsByClassName("tab");
  if (n > tabs.length) {tabIndex = 1}
  if (n < 1) {tabIndex = tabs.length}
  for (i = 0; i < tabs.length; i++) {
      tabs[i].style.display = "none";
  }
  for (i = 0; i < tab.length; i++) {
      tab[i].className = tab[i].className.replace(" active", "");
  }
  tabs[tabIndex-1].style.display = "block";
  tab[tabIndex-1].className += " active";
}

// Sub tab mono-opening

var tabIndex2 = 1;
showTab2(tabIndex2);

// tab activation control

function currentTab2(n) {
  showTab2(tabIndex2 = n);
}

function showTab2(n) {
  var i;
  var tabs = document.getElementsByClassName("myMainTab2");
  var tab = document.getElementsByClassName("tab2");
  if (n > tabs.length) {tabIndex2 = 1}
  if (n < 1) {tabIndex2 = tabs.length}
  for (i = 0; i < tabs.length; i++) {
      tabs[i].style.display = "none";
  }
  for (i = 0; i < tab.length; i++) {
      tab[i].className = tab[i].className.replace(" active", "");
  }
  tabs[tabIndex2-1].style.display = "block";
  tab[tabIndex2-1].className += " active";
}

// Sub tab mono-opening

var tabIndex3 = 1;
showTab3(tabIndex3);

// tab activation control

function currentTab3(n) {
  showTab3(tabIndex3 = n);
}

function showTab3(n) {
  var i;
  var tabs = document.getElementsByClassName("myMainTab3");
  var tab = document.getElementsByClassName("tab3");
  if (n > tabs.length) {tabIndex3 = 1}
  if (n < 1) {tabIndex3 = tabs.length}
  for (i = 0; i < tabs.length; i++) {
      tabs[i].style.display = "none";
  }
  for (i = 0; i < tab.length; i++) {
      tab[i].className = tab[i].className.replace(" active", "");
  }
  tabs[tabIndex3-1].style.display = "block";
  tab[tabIndex3-1].className += " active";
}


  // Menu mono tab function
/*
document.getElementById("tab1").onclick = function() {tab1()};

function tab1() {
  document.getElementById("mytabdown1").classList.toggle("show2");
}
*/



   // end menu


// login and form open close



document.getElementById("formClose").onclick = function() {formre()};

document.getElementById("formRegister").onclick = function() {formre()};

function formre() {
  document.getElementById("formReg").classList.toggle("showFixed");
}

document.getElementById("profile").onclick = function() {logyy()};

document.getElementById("closeLogy").onclick = function() {logyy()};

function logyy() {
  document.getElementById("logy").classList.toggle("showFixed");
}

// end login form open close

   