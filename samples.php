<?php



// Change to the name of the file

$last_modified = filemtime("thisfile.php");



// Display the results

// eg. Last modified Monday, 27th October, 2003 @ 02:59pm

print "Last modified " . date("l, dS F, Y @ h:ia", $last_modified);



?> 



<?php



// Your email address

$email = "you@example.com";



// The subject

$subject = "Enter your subject here";



// The message

$message = "Enter your message here";



mail($email, $subject, $message, "From: $email");



echo "The email has been sent.";



?>


<?php



/**

 * Just add this in your page where you

 * want the date/time to appear

 *

 * For more configuration options look

 * in the PHP manual at http://uk2.php.net/date

 */



// Displays in the format Saturday, November 22, 2003 11.38

echo date("l, F d, Y h:i" ,time());



?>


<?php



// Example 1



$text = "012345";



if (ereg('[^0-9]', $text)) {

  echo "This contains characters other than just numbers";

}

else {

  echo "This contains only numbers";    

}



// Example 2



$text = "mixedcharacters012345&../@";



if (ereg('[^A-Za-z0-9]', $text)) {

  echo "This contains characters other than just numbers";

}

else {

  echo "This contains only numbers";    

}



?>

<?php



/**

 * The letter l (lowercase L) and the number 1

 * have been removed, as they can be mistaken

 * for each other.

 */



function createRandomPassword() {



    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;



    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }



    return $pass;



}



// Usage

$password = createRandomPassword();

echo "Your random password is: $password";



?> 


<h4>It is now  
<script type="text/javascript">
<!--
var currentTime = new Date()
var hours = currentTime.getHours()
var minutes = currentTime.getMinutes()
if (minutes < 10){
minutes = "0" + minutes
}
document.write(hours + ":" + minutes + " ")
if(hours > 11){
document.write("PM")
} else {
document.write("AM")
}
//-->
</script>
</h4>

