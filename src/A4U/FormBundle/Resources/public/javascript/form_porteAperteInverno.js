//Ricordati di fare il clear dei valori delle selectbox quando sono nascoste!

$(document).ready(function(){
	//Nascone i campi opzionali al caricamento della pagina
	//Nasconde Attività di orientamento e Altra attività di orientamento
	if ($("#porteAperteInverno_hasAttendedtoOtherActivities").val()==1){ 
		$("#attendedActivity").show("drop");
		if($("#porteAperteInverno_activity").val()=="altro") $("#otherAttendedActivity").show("drop");
		else $("#otherAttendedActivity").hide("drop");
	}
	else {
		$("#attendedActivity").hide("drop");
		$("#otherAttendedActivity").hide("drop");
	}

	//Nasconde Referente e Altro referente
	if ($("#porteAperteInverno_reference").val()=="altro") $("#otherReference").show("drop");
	else $("#otherReference").hide("drop");
	
	//Handler evento change "Hai partecipato ad altre attività"
	$(document).on('change', '#porteAperteInverno_hasAttendedtoOtherActivities' , function() {
		if ($(this).val()==1){ 
			$("#attendedActivity").show("drop");
			if($("#porteAperteInverno_activity").val()=="altro") $("#otherAttendedActivity").show("drop");
			else $("#otherAttendedActivity").hide("drop");
		}
		else {
            $("#attendedActivity option:selected").removeAttr("selected");
            $("#porteAperteInverno_otherActivity").val('');
			$("#attendedActivity").hide("drop");
			$("#otherAttendedActivity").hide("drop");
		}       
	})

	//Handler case -> Altro...
	$(document).on('change', '#porteAperteInverno_activity' , function() {
		if ($(this).val()=="altro") $("#otherAttendedActivity").show("drop");
		else{
            $("#porteAperteInverno_otherActivity").val('');
            $("#otherAttendedActivity").hide("drop");
        }

	})

	//Handler evento change "referente"
	$(document).on('change', '#porteAperteInverno_reference' , function() {
		if ($("#porteAperteInverno_reference").val()=="altro") $("#otherReference").show("drop");
		else{
            $("#porteAperteInverno_otherReference").val('');
            $("#otherReference").hide("drop");
        }

	})
});