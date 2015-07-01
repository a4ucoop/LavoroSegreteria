//Ricordati di fare il clear dei valori delle selectbox quando sono nascoste!

$(document).ready(function(){

	// appena pronto nasconde i selettori delle date della visita
	$('#porteAperteEstate_reservationDate').hide();
	$('#porteAperteEstate_julyDiv').hide();
	$('#porteAperteEstate_augustDiv').hide();

	//Nascone i campi opzionali al caricamento della pagina
	//Nasconde Attività di orientamento e Altra attività di orientamento
	if ($("#porteAperteEstate_hasAttendedtoOtherActivities").val()==1){ 
		$("#attendedActivity").show("drop");
		if($("#porteAperteEstate_activity").val()=="altro") $("#otherAttendedActivity").show("drop");
		else $("#otherAttendedActivity").hide("drop");
	}
	else {
		$("#attendedActivity").hide("drop");
		$("#otherAttendedActivity").hide("drop");
	}

	//Nasconde Referente e Altro referente
	if ($("#porteAperteEstate_reference").val()=="altro") $("#otherReference").show("drop");
	else $("#otherReference").hide("drop");
	
	//Handler evento change "Hai partecipato ad altre attività"
	$(document).on('change', '#porteAperteEstate_hasAttendedtoOtherActivities' , function() {
		if ($(this).val()==1){ 
			$("#attendedActivity").show("drop");
			if($("#porteAperteEstate_activity").val()=="altro") $("#otherAttendedActivity").show("drop");
			else $("#otherAttendedActivity").hide("drop");
		}
		else {
            $("#attendedActivity option:selected").removeAttr("selected");
            $("#porteAperteEstate_otherActivity").val('');
			$("#attendedActivity").hide("drop");
			$("#otherAttendedActivity").hide("drop");
		}       
	})

	//Handler case -> Altro...
	$(document).on('change', '#porteAperteEstate_activity' , function() {
		if ($(this).val()=="altro") $("#otherAttendedActivity").show("drop");
		else{
            $("#porteAperteEstate_otherActivity").val('');
            $("#otherAttendedActivity").hide("drop");
        }

	})

	//Handler evento change "referente"
	$(document).on('change', '#porteAperteEstate_reference' , function() {
		if ($("#porteAperteEstate_reference").val()=="altro") $("#otherReference").show("drop");
		else{
            $("#porteAperteEstate_otherReference").val('');
            $("#otherReference").hide("drop");
        }

	})

	// data visita: mostra il selettore data adeguato in base al mese scelto
	$('#porteAperteEstate_reservationMonth').change(function(){
		if ($('#porteAperteEstate_reservationMonth').val() == 'luglio') {
			$('#porteAperteEstate_augustDiv').hide();
			$('#porteAperteEstate_julyDiv').show();
		};
		if ($('#porteAperteEstate_reservationMonth').val() == 'agosto') {
			$('#porteAperteEstate_julyDiv').hide();
			$('#porteAperteEstate_augustDiv').show();
		};
	})

	// valorizza l'input effettivo che verrà passato con la data scelta
	$('#porteAperteEstate_augustDates').change(function(){
		$('#porteAperteEstate_reservationDate').val($('#porteAperteEstate_augustDates').val());
	})

	$('#porteAperteEstate_julyDates').change(function(){
		$('#porteAperteEstate_reservationDate').val($('#porteAperteEstate_julyDates').val());
	})

});