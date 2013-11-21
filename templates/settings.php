<form id="photoform">
    <fieldset class="personalblock">
        <legend>
            <strong>User Photo</strong>
        </legend>
        <img id="photoimg" src="<?php echo OC_App::getAppWebPath('user_photo') . '/ajax/showphoto.php?user=' . $_['user'] . '&s=128'; ?>">
        <br>
        <input id="chosephotobutton" type="submit" value="Change Photo" original-title>
        <input id="delphotobutton" type="submit" value="Delete Photo" original-title>
        <input id="usegravatarbutton" type="submit" value="Use Gravatar" original-title>
    </fieldset>
</form>
