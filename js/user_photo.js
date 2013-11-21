var UserPhoto = {
	_callback: function(result) {
		if (result.status === 'success') {
			document.getElementById('photoimg').src = OC.filePath('user_photo', 'ajax', 'showphoto.php') + '?user=' + result.data.user + '&ts=' + Date.now();
			OC.dialogs.info(result.data.message, 'User Photo');
		} else {
			OC.dialogs.info(result.data.message, 'An error occurred!');
		}
	},
	Load: function(path) {
		$.post(OC.filePath('user_photo', 'ajax', 'addphoto.php'), {
			path: path
		}, UserPhoto._callback);
	},
	Delete: function(path) {
		$.post(OC.filePath('user_photo', 'ajax', 'deletephoto.php'), {
			path: path
		}, UserPhoto._callback);
	},
	Gravatar: function(path) {
		$.post(OC.filePath('user_photo', 'ajax', 'addphoto.php'), {
			gravatar: 1
		}, UserPhoto._callback);
	}
};

$(document).ready(function() {
	$("#chosephotobutton").click(function() {
		OC.dialogs.filepicker('Select the Image', UserPhoto.Load, false, 'image', true);
		return false;
	});
	$("#delphotobutton").click(function() {
		UserPhoto.Delete();
		return false;
	});
	$("#usegravatarbutton").click(function() {
		UserPhoto.Gravatar();
		return false;
	});
}); 