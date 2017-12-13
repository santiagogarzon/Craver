$('.form .stages label').click(function() {

	setTimeout(function () {
		var radioButtons = $('.form input:radio');
		var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
		selectedIndex = selectedIndex + 1;
	
		if (selectedIndex == 8) {
			$('.siguiente').html('Calcular');
		} else {
			$('.siguiente').html('Siguiente');
		}
    }, 1000);
	
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

	if(selectedIndex == 9) {
		calcularValores();
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

var calcularValores = function() {

	var metros = 0;

	if($('input:radio[name=cocina]:checked').val()){
		metros += parseFloat($('input:radio[name=cocina]:checked').val());
	}
	if($('input:radio[name=comedor]:checked').val()) {
		metros += parseFloat($('input:radio[name=comedor]:checked').val());
	}
	if($('input:radio[name=living]:checked').val()) {
		metros += parseFloat($('input:radio[name=living]:checked').val());
	}
	if($('input:radio[name=garage]:checked').val()) {
		metros += parseFloat($('input:radio[name=garage]:checked').val());
	}
	if($('input:radio[name=dorm-princ]:checked').val()) {
		metros += parseFloat($('input:radio[name=dorm-princ]:checked').val());
	}

	metros += parseFloat($('select[name=baño-toillete]').val());
	metros += parseFloat($('select[name=baño-simple]').val());
	metros += parseFloat($('select[name=baño-ante]').val());
	metros += parseFloat($('select[name=baño-zonificado]').val());
	metros += parseFloat($('select[name=simple]').val());
	metros += parseFloat($('select[name=doble]').val());
	metros += parseFloat($('select[name=lavadero]').val());
	metros += parseFloat($('select[name=estudio]').val());
	metros += parseFloat($('select[name=plantas]').val());
	metros += parseFloat($('select[name=deposito]').val());
	
	metros = Math.round(metros);
	
	$('.resultado-text').html('Necesitas ' + metros +  ' metros cuadrados para tu casa!!');
	$('.form').hide();
	$('.text-calculadora').empty(); 
	$('.resultado').show();


};