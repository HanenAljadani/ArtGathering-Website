/*
Signup Page
*/

function myFunFocus(b) {
b.style.background = "AliceBlue";
}

function myBlurFunction(a) {
var x = document.getElementById("name");
x.value = x.value.toUpperCase();
a.style.background = "rgba(122,114,255,0.3)";
}

function confirmSubmit() {
if (confirm("Are you sure you want to signup?")) {
document.getElementById("FORM_ID").submit();
}
return false;
}

function resetMsg() {
  alert("Everything will be deleted, you want to continue?");
}

/*
Login Page & Shop Page
*/

function fun(){
alert("Hello! welcome back");
}

function myBlurFunction2(y) {
y.style.background = "rgba(122,114,255,0.3)";
	}


/*
index Page
*/
	
function load() {
alert("Page is loaded");
}

/*
Aboutus Page
*/

function myFunc(elmnt, clr) {
elmnt.style.color = clr;
}
