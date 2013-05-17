<form id="photoform">
    <fieldset class="personalblock">
        <strong>User Photo</strong><br />
        <img id="photoimg" src="<?php echo OC_App::getAppWebPath('user_photo') . '/ajax/showphoto.php?user=' .  $_['user'] ; ?>">
        <br>
        <input id="chosephotobutton" type="submit" value="Change Photo" original-title>
        <input id="delphotobutton" type="submit" value="Delete Photo" original-title>
		<input id="usegravitarbutton" type="submit" value="Use Gravitar" original-title>

    </fieldset>
</form>
