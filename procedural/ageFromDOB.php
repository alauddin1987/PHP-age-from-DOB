<?php
/**
 * get the age from a given date of birth
 * @param strin $dob (expected format is yyyy-mm-dd)
 * @param bool $fromDB (check is date calculate from db)
 * @return int
 * @throws Exception
 */
function getAgeFromDOB($dob, $fromDB = false)
{
    if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dob)) {
        throw new Exception('Your provided date of birth seems to be incorrect');
    }

    if($fromDB) {
        $sql = "SELECT YEAR(CURDATE()) - YEAR(DOB_FIELD) AS age FROM TABLE_NAME";
        $mysqli = '';// $mysqli connection will stablished earlier
        $result = $mysqli->query($sql);
        $show = $result->fetch_array(MYSQLI_BOTH);
        $age = $show['age'];

        return $age;
    }

    $dobDate = new DateTime($dob);
    $curDate = new DateTime();
    $difference = $dobDate->diff($curDate);
    $age = $difference->y;

    return $age;
}

//use the function
try {
    $dob = '1987-08-03';
    $age = getAgeFromDOB($dob);
    echo "You are {$age} year(s) old" . PHP_EOL;
}catch(Exception $e) {
    echo $e->getMessage();
}

