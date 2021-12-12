<?php
$strJsonFileContents = file_get_contents("people2.json");
$person = json_decode($strJsonFileContents, true);
$question = $_POST["question"];
$fa_name = $_POST["person"];
$en_name = $person[$fa_name];

$num = crc32($question . $en_name);

$final;
if($num%16 < 0)
{
	$final= - $num%16;
}
if($num%16 >= 0)
{
	$final=$num%16;
}
$a = file("messages.txt", FILE_IGNORE_NEW_LINES);
$msg = $a[$final];

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
        
		
			<span id="label">پرسش:</span>
			<span id="question"><?php echo $question ?></span>
        
    </div>
    <div id="container">
        <div id="message">
            <p><?php echo $msg ?></p>
        </div>
		<?php
		
		$strJsonFileContents = file_get_contents("people.json");
		$person = json_decode($strJsonFileContents, true);
		?>
        <div id="person">
            <div id="person">
                <img src="images/people/<?php echo "$en_name.jpg" ?>"/>
                <p id="person-name"><?php echo $fa_name ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post">
            سوال
			
				<input type="text" name="question" value="<?php echo $question ?>" maxlength="150" placeholder="..."/>
            را از
            <select name="person">
                <?php
                /*
                 * Loop over people data and
                 * enter data inside `option` tag.
                 * E.g., <option value="hafez">حافظ</option>
                 */
		
		foreach($person as $item) {
			

			if($item != $fa_name)
			{
				echo "<option value='$item'>$item</option>";
			}
			
			if($item == $fa_name)
			{
				echo "<option value='$fa_name' selected>$fa_name</option>";
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