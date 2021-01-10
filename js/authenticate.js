flag = 0;
cambiar_login();
cambiar_sign_up();

function cambiar_login() {
	if (flag)
		document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";

	document.querySelector('.cont_form_login').style.display = "block";
	document.querySelector('.cont_form_sign_up').style.opacity = "0";

	setTimeout(function() {
		document.querySelector('.cont_form_login').style.opacity = "1";
	}, 400);

	setTimeout(function() {
		document.querySelector('.cont_form_sign_up').style.display = "none";
	}, 200);
}

function cambiar_sign_up(at) {

	if (flag)
		document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";

	document.querySelector('.cont_form_sign_up').style.display = "block";
	document.querySelector('.cont_form_login').style.opacity = "0";

	document.querySelector('.cont_forms').innerHTML += "<div style='clear:both'></div>";

	setTimeout(function() {
		document.querySelector('.cont_form_sign_up').style.opacity = "1";
	}, 100);

	flag++;

	setTimeout(function() {
		document.querySelector('.cont_form_login').style.display = "none";
	}, 400);
}

function ocultar_login_sign_up() {

	document.querySelector('.cont_forms').className = "cont_forms";
	document.querySelector('.cont_form_sign_up').style.opacity = "0";
	document.querySelector('.cont_form_login').style.opacity = "0";

	setTimeout(function() {
		document.querySelector('.cont_form_sign_up').style.display = "none";
		document.querySelector('.cont_form_login').style.display = "none";
	}, 500);

}
$(window).load(function() {              

login=0;
register=0;

// initialize isotope
var $container = $('.Categories_container');
$container.isotope({
filter: '*',
});

//Showing the most liked recipes
$.post('classes/Recipe.php',{'show_liked':1},function(data){
$('.most_liked').html(data);
});

$('.Categories_filter a').click(function() {
$('.Categories_filter .active').removeClass('active');
$(this).addClass('active');

var selector = $(this).attr('data-filter');
$container.isotope({
	filter: selector,
	animationOptions: {
		duration: 500,
		animationEngine: "jquery"
	}
});
return false;
});

//If the user wants to sign up
$(document).on('click', '.btn_sign_up', function() {
if (!register) {
	register++;
	login = 0;
} else {
	$.post("classes/Auth.php", {
		"register": 1,
		"reg_username": $('#reg_user').val(),
		"reg_email": $('#reg_email').val(),
		"reg_pass": $('#reg_pass').val(),
		"reg_repass": $('#reg_repass').val()
	}, function(data) {
		if (data != 'succeeded') //If there were some errors
		{
			$('.cont_forms').css('height','520px'); 
			$('#err').html(data);
		} else {
			alert('Your account was created successfully!');
			$('.cont_forms').css('height','420px'); 
			$('#err').html('');
		}
	});

}
//location.href="panel.php";
});


//If the user wants to log in
$(document).on('click', '.btn_login', function() {
if (!login) {
	login++;
	register = 0;
} else {
	$.post("classes/Auth.php", {
		"login": 1,
		"log_email": $('#log_email').val(),
		"log_pass": $('#log_pass').val(),
		'is_admin': 0
	}, function(data) {
		if (data != '1') //If there were some errors
		{
			$('#errlog').html(data);
		} else {
			location.href = "user/examples/User-Profile.php";
		}
	});
}


});
});