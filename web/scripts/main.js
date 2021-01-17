/*
	Author: Joseph Itiose
	BYU-Idaho: CSE-341
*/

// http://www.w3schools.com/js/js_cookies.asp
function setCookie(jname, jvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// http://www.w3schools.com/js/js_cookies.asp
function getCookie(cname) {
    var name = jname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ja = decodedCookie.split(';');
    for(var i = 0; i <ja.length; i++) {
        var j = ja[i];
        while (j.charAt(0) == ' ') {
            j = j.substring(1);
        }
        if (j.indexOf(name) == 0) {
            return j.substring(name.length, j.length);
        }
    }
    return "";
}

function redirectUrl(curl)
{
	window.location = curl;
}

function setCookieAndRedirect(jname, jvalue, exdays, curl){
	setCookie(jname, jvalue, exdays);
	redirectUrl(curl);
}

function testCookieValueAndClearIfSame(jname,tvalue)
{
	var cookieVal = getCookie(jname);
	
	if( tvalue===cookieVal )
	{
		setCookie(jname, 'javaScriptPost', -1);
	}
}

// http://stackoverflow.com/questions/14446447/javascript-read-local-text-file
function readTextFile(file)
{
	var allText = "";
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                allText = rawFile.responseText;
            }
        }
    }
    rawFile.send(null);
	
	return allText;
}