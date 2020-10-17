$(document).ready(function() {
var self = this;
var zone_id = 0;


	$(document).on('change','#zoneselectedid',function(){
		var selectVal = $("#zoneselectedid option:selected").val();
		window.location.href = '/zoneplantmap/'+selectVal;
	});

	$('.delete_zone').click(function(){

		if(confirm("Are you sure you want to delete this?")){
			window.location = $(this).attr('href');
		}
		else{
			return false;
		}
	});


	$('.delete-sapling').click(function(){

		if(confirm("Are you sure you want to delete this?")){
			window.location = $(this).attr('href');
		}
		else{
			return false;
		}
	});

	$('#userrole').change(function(){
		var field= $(this).val();
		if(field == 1)
		{
			document.getElementById("user-zone").style.display = "none";
			document.getElementById("userward").style.display = "none";
			document.getElementById("user-location").style.display = "none";
		}
		else if(field == 2)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "none";
			document.getElementById("user-location").style.display = "none";
		}
		else if(field == 3)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "none";
			document.getElementById("user-location").style.display = "none";
		}
		else if(field == 4)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "block";
			document.getElementById("user-location").style.display = "none";
		}
		else if(field == 5)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "block";
			document.getElementById("user-location").style.display = "block";
		}
		else if(field == 6)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "none";
			document.getElementById("user-location").style.display = "none";

		}
		else if(field == 7)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "block";
			document.getElementById("user-location").style.display = "none";

		}
		else if(field == 8)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "block";
			document.getElementById("user-location").style.display = "none";

		}
		else if(field == 9)
		{
			document.getElementById("user-zone").style.display = "block";
			document.getElementById("userward").style.display = "block";
			document.getElementById("user-location").style.display = "none";

		}
	});


	$('#userzone').change(function(){


		var wardno =$("#userzone").val();
		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getwardno',
			data: {id: wardno,saplingcentre:wardno},
			success: function( response ) {

				//alert(JSON.stringify(response[0]));
				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardno').html("");
				$('#userwardno').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardno').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardno').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '280px'
				});
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				//$('#userwardno').html(query);
			}
		});

		/* var wardno =$("#userzone").val();
		var userid =$("#userid").val();
		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getwardno',
			data: {id: wardno, userid: userid},
			success: function( response ) {

				//alert(JSON.stringify(response[0]));
				$("input[name='data[userdetail][wardno]'").val(response[0]);
				var count = Object.keys(response[0]).length;
				var wardno = response[0];
				var wards = wardno.split(',');
				var existwards = response[1].split(',');
				$('#userwardno').html("");
				$('#userwardno').multiselect('destroy');

				for(var i=0; i<wards.length;i++){
						$('#userwardno').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				}
				if(count == 0)
				{
					$("#userwardno").multiselect("disable");
				}
				else{
					$('#userwardno').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '280px'
					});
				}



				$('#userwardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#userwardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				});

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardno').html(query);
			}
		}); */
	});


	$('#propertyzone').change(function(){
		var wardno =$("#propertyzone").val();

		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getpropertywardno',
			data: {id: wardno},
			success: function( response ) {

				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardno').html("");
				$('#userwardno').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardno').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardno').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '280px'
				});


				$('#propertywardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#propertywardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardno').html(query);
			}
		});
	});

	$('#reportzone').change(function(){
		var wardno =$("#reportzone").val();

		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getpropertywardno',
			data: {id: wardno},
			success: function( response ) {

				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardno').html("");
				$('#userwardno').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardno').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardno').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '200px'
				});


				$('#propertywardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#propertywardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardno').html(query);
			}
		});
	});


	$('#reportzonehcr').change(function(){
	
		var wardno =$("#reportzonehcr").val();

		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getpropertywardno',
			data: {id: wardno},
			success: function( response ) {

				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardnohcr').html("");
				$('#userwardnohcr').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardnohcr').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardnohcr').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '250px'
				});


				$('#propertywardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#propertywardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardnohcr').html(query);
			}
		});
	});




	$('#reportzonedcr').change(function(){
		var wardno =$("#reportzonedcr").val();

		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getpropertywardno',
			data: {id: wardno},
			success: function( response ) {

				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardnodcr').html("");
				$('#userwardnodcr').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardnodcr').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardnodcr').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '150px'
				});


				$('#propertywardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#propertywardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardnodcr').html(query);
			}
		});
	});



$('#reportzonehqr').change(function(){
		var wardno =$("#reportzonehqr").val();

		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getpropertywardno',
			data: {id: wardno},
			success: function( response ) {

				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardnohqr').html("");
				$('#userwardnohqr').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardnohqr').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardnohqr').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '200px'
				});


				$('#propertywardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#propertywardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardnohqr').html(query);
			}
		});
	});

$('#reportzonebsr').change(function(){
		var wardno =$("#reportzonebsr").val();

		var value = '';
		var query = '';
		$.ajax({

			type: "GET",
			url: '/getpropertywardno',
			data: {id: wardno},
			success: function( response ) {

				$("input[name='data[userdetail][wardno]'").val(response[0].wardno);
				var wardno = response[0].wardno;
				var wards = wardno.split(',');
				$('#userwardnobsr').html("");
				$('#userwardnobsr').multiselect('destroy');
				for(var i=0; i<wards.length;i++)
					$('#userwardnobsr').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				$('#userwardnobsr').multiselect({
					enableFiltering: true,
					includeSelectAllOption: true,
					maxHeight: 200,
					buttonWidth: '200px'
				});


				$('#propertywardnum').html("");
				for(var i=0; i<wards.length;i++)
					$('#propertywardnum').append('<option value="' +wards[i]+ '">'+wards[i]+'</option>');
				/* query += '<option value="">Choose</option>';
				$.each(response[0], function(key,data) {
					query += '<option value="' +data.wardno+ '">'+data.wardno+'</option>';
				}); */

				value += '<option value="">Choose</option>';
				for(var i=0; i<response[1].length;i++) {
					value += '<option value="' + response[1][i].id + '">'+response[1][i].saplingcentre_location+'</option>';
				}
				$('#userlocation').html(value);
				$('#userwardnobsr').html(query);
			}
		});
	});







	$('.delete-user').click(function(){

		if(confirm("Are you sure you want to delete this?")){
			window.location = $(this).attr('href');
		}
		else{
			return false;
		}
	});

	$('.delete-saplingcentre').click(function(){

		if(confirm("Are you sure you want to delete this?")){
			window.location = $(this).attr('href');
		}
		else{
			return false;
		}
	});

	$('.js-date').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: "dd-mm-yy",
		minDate: 0,
	});

	$('.js-datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: "dd-mm-yy",

	});

	 $('#columname').change(function(){

		  $('#keyword').prop('required',true);

     });

	 $("#longitude").keypress(function (e) {
		 var iKeyCode = (e.which) ? e.which : e.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

			return true;
	});


	$("#latitude").keypress(function (e) {
		 var iKeyCode = (e.which) ? e.which : e.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

			return true;
	});


	$('.imagevalidation').change(function(){

		var fileInput = document.getElementsByClassName('imagevalidation');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if(!allowedExtensions.exec(filePath)){
			alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
			fileInput.value = '';
			return false;
		}else{
			//Image preview
			if (fileInput.files && fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	});

	     
	
	
});
