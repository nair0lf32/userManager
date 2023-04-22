//Add user
$(document).on('click', '#btn-add', function (e) {
	var data = $("#user_form").serialize();
	$.ajax({
		data: data,
		type: "POST",
		url: "save.php",
		success: function () {
			$('#addUserModal').modal('hide');
			alert('utilisateur ajouté!');
			location.reload();
		},
		error: function (xhr, textStatus, thrownError) {
			console.log(textStatus, thrownError);
			alert(chr.responseText);
		}
	});
});
$(document).on('click', '.update', function (e) {
	var id = $(this).attr("data-id");
	var name = $(this).attr("data-name");
	var password = $(this).attr("data-password");
	$('#id_u').val(id);
	$('#name_u').val(name);
	$('#password_u').val(password);

});
//Update
$(document).on('click', '#update', function (e) {
	var data = $("#update_form").serialize();
	$.ajax({
		data: data,
		type: "POST",
		url: "save.php",
		success: function () {
			$('#editUserModal').modal('hide');
			alert('Modifié !');
			location.reload();
		},
		error: function (xhr, textStatus, thrownError) {
			console.log(textStatus, thrownError);
			alert(chr.responseText);
		}
	});
});

//Delete
$(document).on("click", ".delete", function () {
	var id = $(this).attr("data-id");
	$('#id_d').val(id);

});
$(document).on("click", "#delete", function () {
	$.ajax({
		url: "save.php",
		type: "POST",
		cache: false,
		data: {
			type: 3,
			id: $("#id_d").val()
		},
		success: function () {
			$('#deleteUserModal').modal('hide');
			alert('Supprimé !');
			location.reload();
		},
		error: function (xhr, textStatus, thrownError) {
			console.log(textStatus, thrownError);
			alert(chr.responseText);
		}
	});
});

//Multiple action
$(document).on("click", "#delete_multiple", function () {
	var user = [];
	$(".user_checkbox:checked").each(function () {
		user.push($(this).data('user-id'));
	});
	if (user.length <= 0) {
		alert("Please select records.");
	}
	else {
		WRN_PROFILE_DELETE = "T'es sur de vouloir virer " + (user.length > 1 ? "ces types?" : "ce type?");
		var checked = confirm(WRN_PROFILE_DELETE);
		if (checked == true) {
			var selected_values = user.join(",");
			console.log(selected_values);
			$.ajax({
				type: "POST",
				url: "save.php",
				cache: false,
				data: {
					type: 4,
					id: selected_values
				},
				success: function (response) {
					alert('Effacé!');
					location.reload();
				},
				error: function (xhr, textStatus, thrownError) {
					console.log(textStatus, thrownError);
					alert(chr.responseText);
				}
			});
		}
	}
});
$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function () {
		if (this.checked) {
			checkbox.each(function () {
				this.checked = true;
			});
		} else {
			checkbox.each(function () {
				this.checked = false;
			});
		}
	});
	checkbox.click(function () {
		if (!this.checked) {
			$("#selectAll").prop("checked", false);
		}
	});
});
