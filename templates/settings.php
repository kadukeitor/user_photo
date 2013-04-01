<form id="photoform">
    <fieldset class="personalblock">
        <strong>User Photo</strong><br />
        <img id="photoimg" src="<?php echo $_['webROOT']?>/?app=user_photo&getfile=ajax%2Fshowphoto.php&user=<?php echo $_['user']?>">
        <br>
        <input id="chosephotobutton" type="submit" value="Change Photo" original-title>
        <input id="delphotobutton" type="submit" value="Delete Photo" original-title>
    </fieldset>
</form>
