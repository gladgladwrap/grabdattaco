// var firstName = prompt("What's your first name?", "");


//  function displayMessage(firstName) {
//         alert("Hey " + firstName + ", hello there!");
//     }

// displayMessage(firstName);

// var happiness = prompt("Are you happy?");
// if (happiness ==="yes")
//     console.log("Good for you");

// window.onload = function() {
//    var time = new Date();
//    time = time.toTimeString();
//     getGreeting(time);
// }

// function getGreeting(time){
//     document.getElementById("greeting").innerHTML = "Grabdat Taco</br>" + time;
// }



function myFunction(x) {
	    	x.classList.toggle("change");
	    }

$(function() {

	$('.toggleNav').on('click', function() {

		$('.flex-nav ul').toggleClass('open');

		event.preventDefault();

	});

});

$(function() {

		if (sessionStorage.getItem("displayMan")=='1') {

			$('#logo_img').css({display:'none'});

			$('#hideCreepyManBtn').html('Bring Back The Creepy Man!');

			$('#hideCreepyManBtn').on('click', function() {

				$('#logo_img').css({display:'inline'});

				sessionStorage.setItem("displayMan", 0);

			});

		}

		else {

			$('#hideCreepyManBtn').on('click', function() {

				$('#logo_img').toggle(1000);

				$('#hideCreepyManBtn').html('Goodbye For Now');

				$('#hideCreepyManBtn').fadeOut(4000);

				sessionStorage.setItem("displayMan", 1);

			});
		}

});











