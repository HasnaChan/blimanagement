//ambil elemen
var keyword = document.getElementById('keyword');
var searchButton = document.getElementById('search-button');
var containerAjax = document.getElementById('container-ajax');

//event untuk livesearch
keyword.addEventListener('keyup', function(){
	
	//buat object ajax
	var ajax = new XMLHttpRequest();

	//cek kesiapan ajax
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4 && ajax.status == 200){
			containerAjax.innerHTML = ajax.responseText;
		}

	}

	//eksekusi ajax
	ajax.open('GET', 'scheduleAjax.php?keyword=' + keyword.value, true);
	ajax.send();


});