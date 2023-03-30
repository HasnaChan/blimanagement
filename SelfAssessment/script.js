window.onload = () => {

	const sub = document.getElementById('submit');
	sub.onclick = () => {
		const form = document.getElementsByClassName('forms');
		const iden = document.getElementsByClassName('iden');
		const opt = document.getElementsByClassName('opt');
		console.log(opt);

		var i;
		var j;
		var k = 0;
		for(i = 0; i<iden.length; i++){
			if(iden[i].value == "" || emptyForm(iden[i].value)){
				alert('Identity is required');
				return false;
			}
		}

		for(j = 0; j<opt.length; j++){
			if(!opt[j].checked){
				k++;
			}

		}

		if(k>6){
			alert('Please fill all the questionnaire');
			return false;
		}

		form.submit();
	}


    function emptyForm(str){
        return str.trim() === '';
    }


}