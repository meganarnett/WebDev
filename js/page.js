/*function openCity(evt, cityName) {
	//declare all variables
	var i, tabcontent, tablinks;
	
	//get all elements ith class="tabcontent" and hide them
	tabcontent = document.getElementsByClassName("tabcontent");
	for(i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	//get all elements with class="tablinks" and remove class "active"
	tablinks = document.getElementsByClassName("tabLink");
	for(i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace("active", "");
	}

	//show the current tab, and add an "active" class to the link that opened the tab
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";

	//get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
} */

var tabs = $('.tabs');

$('.tab').hide();
tabs.find('a').on('click', function(e){
        e.preventDefault();
        tabs.find('.current').removeClass('current');
        $(this).addClass('current');
        $(this.hash).show().siblings().hide();
}).first().click();
