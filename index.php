<!DOCTYPE html>
<head><title>MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a 4 numbers and attempts to hash all four-number combinations
to determine the original four numbers.</p>
<pre>
Debug Output: <br>
<?php
$md5 = "Not entered any hash yet";
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our number
    $txt = "0123456789";
    $show = 15;

    for($i=0; $i<strlen($txt); $i++ ) {
        $ch1 = $txt[$i];   // The first numberer

        for($j=0; $j<strlen($txt); $j++ ) {
            $ch2 = $txt[$j];  // Our second cnumberer

            for($k=0; $k<strlen($txt); $k++ ) {
            	$ch3 = $txt[$k];  // Our third number

            	for($l=0; $l<strlen($txt); $l++ ) {
            		$ch4 = $txt[$l];  // Our fourth number

			            // Concatenate the two characters together to 
			            // form the "possible" pre-hash text
			            $try = $ch1.$ch2.$ch3.$ch4;

			            // Run the hash and then check to see if we match
			            $check = hash('md5', $try);
			            if ( $check == $md5 ) {
			                $goodtext = $try;
			                break;   // Exit the inner loop
			            }

			            // Debug output until $show hits 0
			            if ( $show > 0 ) {
			                print "$check $try\n";
			                $show = $show - 1;
			        }        
			    }            
            }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "\n";
    print "Above displayed are first 15 hashes of the operation";
    print "\n\n";
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Entered Hash was : <?= htmlentities($md5); ?></p>
<p>Original Number : <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
</ul>
</body>
</html>

