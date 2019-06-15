// script for determining required inputs based on usertype selected
window.addEventListener('load', function() {
	var userType = document.getElementById("inlineFormCategory");
		userType.addEventListener("change", function(e) {
		var value = e.target.value,
		address = document.getElementById("address"),
		phone = document.getElementById("phone"),
		email = document.getElementById("email");
		//set input validation for each user type
		if(value === 'cimtUser') {
			removeRequired();
			makeVisible();
			phone.setAttribute('required', 'required');
			address.style.visibility = "hidden";
			email.style.visibility = "hidden";
		} else if(value === 'resourceProvider') {
			removeRequired();
			makeVisible();
			address.setAttribute('required', 'required');
			phone.style.visibility = "hidden";
			email.style.visibility = "hidden";
		} else if (value === 'admin') {
			removeRequired();
			makeVisible();
			email.setAttribute('required', 'required');
			address.style.visibility = "hidden";
			phone.style.visibility = "hidden";
		}
		else {
			removeRequired();
			makeVisible();
		}

		function removeRequired() {
			phone.removeAttribute('required');
			address.removeAttribute('required');
			email.removeAttribute('required');
		}

		function makeVisible() {
			phone.style.visibility = "visible";
			address.style.visibility = "visible";
			email.style.visibility = "visible";
		}
	});
	// $(document).ready(function() {
	// 	var uname = $("#txt_uname").val();
	//
	//  	if(uname != ''){
	// 		$("#uname_response").show();
	//
	// 		$.ajax({
	// 			headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //         },
	// 			 url: 'register',
	// 			 type: 'post',
	// 			 data: {uname:uname},
	// 			 success: function(response){
	// 					 if(response > 0){
	// 							 $("#uname_response").html("<span class='not-exists'>* Username Already in use.</span>");
	// 					 }else{
	// 							 $("#uname_response").html("<span class='exists'>Available.</span>");
	// 					 }
	//
	// 				}
	// 		});
	// 	 }else{
	// 			$("#uname_response").hide();
	// 	 }
	// });
	$(document).ready(function() {
		$('#phone').keyup(function() {
	    this.value = this.value.replace(/(\d{3})\-?(\d{3})\-?(\d{4})/g,'$1-$2-$3');
		});
	});



})
