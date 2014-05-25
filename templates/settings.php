<form id="photoform">
    <div class="section">
        <h2>User Photo</h2>
        <img id="photoimg" src="<?php echo OC_App::getAppWebPath('user_photo') . '/ajax/showphoto.php?user=' .  $_['user'] ; ?>">
        <br>
        <input id="chosephotobutton" type="submit" value="Change Photo" original-title>
        <input id="delphotobutton" type="submit" value="Delete Photo" original-title>
		<input id="usegravitarbutton" type="submit" value="Use Gravitar" original-title>

    </div>
</form>
