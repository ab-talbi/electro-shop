let btn = document.getElementsByClassName("confirme");
		for(let item of btn){
			item.addEventListener('click',confirmeFunction);
		}
			
		function confirmeFunction(event){
			let val = event.target.value;
			document.getElementById('idConfirme').innerHTML="<a class='text-light text-decoration-none' href='"+val+"'>Oui</a>";
		}


