<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <META charset="utf-8" />
        <TITLE> Results </TITLE>
        <link type="text/css" rel="stylesheet" href="css/theme.css" />
    </HEAD>
    <BODY>
        <?php
        $isUnique = true;
        $inputArray = $_POST['numbers'];// $numbers[5] may be duplicate
        //returns true if duplicates are not found
        function checkForDuplicates(array $input_array) {
            return count($input_array) === count(array_flip($input_array));
        }
            
        $isUnique =  checkForDuplicates( array_slice($inputArray,0,5) );
        //print_r(array_slice($inputArray,0,5));
        if ($isUnique === false)
            echo "<h1>The entered numbers are not unique!<br/> Please click on the back button and enter unique numbers.</h1>";
        $randomArray = range(1,45);//45 //https://stackoverflow.com/questions/10824770/generate-array-of-random-unique-numbers-in-php
        shuffle($randomArray);
        $randomArray = array_slice($randomArray, 0, 5);
        //print_r($randomArray);
        $matches = 0;
        $jokerMatch = 0;
        ?>
       
        <?php
        if ($isUnique == true) {
            echo
            "<table border='1' align='center'><caption>Input numbers</caption><thead>";

            echo "<tr>";
            for ($j = 0; $j <= 5; $j++) {
                echo "<th>Number $j</th>";
            }
            echo "</tr></thead><tbody>";
            
                echo "<tr>";
                for ($j = 0; $j <= 5; $j++) {
                    echo "<td> " . $inputArray[$j] . " </td>";
                }
                echo "</tr>";
          
            echo   "</tbody></table>";
            echo  "<table border='1'align='center'><caption>Winning numbers</caption><thead>";
            echo "<tr>";
            for ($j = 0; $j <= 5; $j++) {
                echo "<th>Number $j</th>";
            }
            echo "</tr></thead><tbody>";
            
            echo "<tr>";
            for ($j = 0; $j <= 5; $j++) {
                //
                if ($j === 5) {
                    $randomArray[5] = rand(1, 20);//20
                }
                echo "<td> " . $randomArray[$j] . " </td>";
            }
            echo "</tr>";
            echo "</tbody></table><h1>The comparison results follow...</h1>";
            for ($i = 0; $i <= 4; $i++) {//exclude last number from comparison
                for ($j = 4; $j >= 0; $j--) {
                    if ($inputArray[$i] == $randomArray[$j]) {
                        $matches++;
                        echo "<p class='matches'/>Input number $inputArray[$i] matches random number $randomArray[$j] .<p/>";
                        continue;
                     }  
                }
            }//Handle joker match
            if ($inputArray[5] == $randomArray[5]) {
                            $jokerMatch = 1;
                             echo "<p class='joker'>joker number $inputArray[5] matches random number $randomArray[5] .</p>";
                        }
            echo "<br/>All in all, " . $matches . " + " . $jokerMatch . " matching number(s) found!";
           // Prize winning
            $prize = 0;
            switch ($matches) {
                case 5: if ($jokerMatch === 1) {
                        echo "<br/>You win all the money! ";
                    } else {
                          $prize=225.856;
                        echo "<br/>You win € ".$prize;
                    }
                    break;
                case 4: if ($jokerMatch === 1) {
                       
                        $prize = 2.500;
                        echo "<br/>You win € " .$prize;
                    } else {
                       
                        $prize = 50;
                        echo "<br/>You win € " .$prize;
                    }
                    break;
                case 3: if ($jokerMatch === 1) {
                       
                        $prize = 50;
                        echo "<br/>You win € " .  $prize;
                    } else {
                       
                        $prize = 2;
                        echo "<br/>You win € " .$prize;
                    }
                    break;
                case 2: if ($jokerMatch === 1) {
                        $prize = 2;
                        echo "<br/>You win € " .$prize;
                    } else {
                        echo "<br/>You win nothing!";
                        echo"<image src='recycleBin.png' alt='Image of a recycle bin'/>";
                    } break;
                case 1: if ($jokerMatch === 1) {
                       
                        $prize = 1.5;
                        echo "<br/>You win € " .  $prize;
                    } else {
                        echo "<br/>You win nothing!";
                        echo"<image src='recycleBin.png' alt='Image of a recycle bin'/>";
                    }

                    break;
                case 0:
                    echo "<br/>You win nothing!";
                    echo"<image src='recycleBin.png' alt='Image of a recycle bin'/>";
                    break;
                default: echo '<br/>Unknown';
                    break;
            }
        }//end of if isUnique
        ?>
    </body>
</html>
