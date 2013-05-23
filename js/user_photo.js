var UserPhoto = {

	Load : function(path) {
		var data = $.post(OC.filePath('user_photo', 'ajax', 'addphoto.php'), {
			path : path
		}, function(result) {
			if (result.status == 'success') {
				document.getElementById('photoimg').src = OC.filePath('user_photo', 'ajax', 'showphoto.php') +'?user=' + result.data.user;
				OC.dialogs.info(result.data.message, 'User Photo');
			} else {
				OC.dialogs.info(result.data.message, 'An error occurred!');
			}
		});
	},

	Delete : function(path) {
		var data = $.post(OC.filePath('user_photo', 'ajax', 'deletephoto.php'), {
			path : path
		}, function(result) {
			if (result.status == 'success') {
				document.getElementById('photoimg').src = OC.filePath('user_photo', 'ajax', 'showphoto.php') +'?user=' + result.data.user;
				OC.dialogs.alert(result.data.message, 'User Photo');
			} else {
				OC.dialogs.alert(result.data.message, 'An error occurred!');
			}
		});
	},
	Gravitar : function(path) {
		var data = $.post(OC.filePath('user_photo', 'ajax', 'gravitar.php'), {
			path : path
		}, function(result) {
			if (result.status == 'success') {
				document.getElementById('photoimg').src = OC.filePath('user_photo', 'ajax', 'showphoto.php') +'?user=' + result.data.user;
				OC.dialogs.alert(result.data.message, 'User Photo');
			} else {
				OC.dialogs.alert(result.data.message, 'An error occurred!');
			}
		});
	},
}

$(document).ready(function() {
	$("#chosephotobutton").click(function() {
		OC.dialogs.filepicker('Select the Image', UserPhoto.Load, false, 'image', true);
		return false;
	});
	$("#delphotobutton").click(function() {
		UserPhoto.Delete();
		return false;
	});
	$("#usegravitarbutton").click(function() {

		UserPhoto.Gravitar();
		return false;
	});


}); 