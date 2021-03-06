<?php
$question = 'این یک پرسش نمونه است';
$msg = 'سوال خود را بپرس !';
$en_name = 'hafez';
$fa_name = 'حافظ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/default.css">
    <title>مشاوره بزرگان</title>
</head>
<body>
<p id="copyright">تهیه شده برای درس کارگاه کامپیوتر،دانشکده کامییوتر، دانشگاه صنعتی شریف</p>
<div id="wrapper">
    <div id="title">
        
		<?php
		if($question != 'این یک پرسش نمونه است')
		{ ?>
			<span id="label">پرسش:</span>
			<span id="question"><?php echo $question ?></span>
		<?php }
		
			?>
        
    </div>
    <div id="container">
        <div id="message">
            <p><?php echo $msg ?></p>
        </div>
		<?php
		
		$strJsonFileContents = file_get_contents("people.json");
		$person = json_decode($strJsonFileContents, true);
		
		$random_key=array_rand($person);
			$fa_name = $person[$random_key];
			$en_name = $random_key;			
		?>
        <div id="person">
            <div id="person">
                <img src="images/people/<?php echo "$en_name.jpg" ?>"/>
                <p id="person-name"><?php echo $fa_name ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post" action="home.php">
            سوال
			<?php
			if($question != 'این یک پرسش نمونه است')
			{ ?>
				<input type="text" name="question" value="<?php echo $question ?>" maxlength="150" placeholder="..."/>
			<?php }
            ?>
			<?php
			if($question == 'این یک پرسش نمونه است')
			{ ?>
				<input type="text" name="question" maxlength="150" placeholder="..."/>
			<?php } ?>
			
            را از
            <select name="person">
                <?php
                /*
                 * Loop over people data and
                 * enter data inside `option` tag.
                 * E.g., <option value="hafez">حافظ</option>
                 */
		
		foreach($person as $item) {
			

			if($item != $person[$random_key])
			{
				echo "<option value='$item'>$item</option>";
			}
			
			if($item == $person[$random_key])
			{
				echo "<option value='$item' selected>$item</option>";
			}
		}		
                ?>

            </select>
            <input type="submit" value="بپرس"/>
        </form>
		
    </div>
</div>
</body>
</html>
