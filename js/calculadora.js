$('.form .stages label').click(function() {
	var radioButtons = $('.form input:radio');
	var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
	selectedIndex = selectedIndex + 1;

	if (selectedIndex == 8) {
		$('.siguiente').html('Calcular');
	} else {
		$('.siguiente').html('Siguiente');
	}
});

$('.siguiente ').click(function() {
	var radioButtons = $('.form input:radio');
	var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));

	selectedIndex = selectedIndex + 2;

	$('.form input[type="radio"]:nth-of-type(' + selectedIndex + ')').prop('checked', true);

	if (selectedIndex == 8) {
		$('.siguiente').html('Calcular');
	} else {
		$('.siguiente').html('Siguiente');
	}
});

$('.anterior ').click(function() {
	var radioButtons = $('.form input:radio');
	var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));

	selectedIndex = selectedIndex;

	$('.form input[type="radio"]:nth-of-type(' + selectedIndex + ')').prop('checked', true);

	if (selectedIndex == 8) {
		$('.siguiente').html('Calcular');
	} else {
		$('.siguiente').html('Siguiente');
	}
});