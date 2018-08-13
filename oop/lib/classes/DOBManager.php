<?php
/**
* holds & manage DOB related all info & activities
* @lastUpdate Md Alauddin 2018-07-06
*/
class DOBManager {
    
    /**
    * holds the date of birth
    * @var
    */
    private $dob;

    /**
    * set the date of birth
    * @param string $dob
    * @throws Exception
    */
    public function setDOB($dob)
    {
	$dobPattern = '/^[\d]{4}-([0][1-9]|[1-9]|[1][0-2])-([1-9]|[0][1-9]|[1][\d]|[2][\d]|[3][0-1]$/';
	if(!preg_match($dobPattern, $dob)) {
	    throw new Exception('Please provide a valid dob');	
	}
	
	$this->dob = $dob;
    }

    /**
    * get the date of birth
    * @return string
    */
    private function getDOB()
    {
	$dob = $this->setDOB();
	
	return $dob;
    }

    /**
    * get age from a date of birth
    * @return object
    */
    public function getAge()
    {
	$curDate = new DateTime();
	$bodDate = $this->getDOB();
	$bodDate = new DateTime($bodDate);
	$age = $bodDate->diff($curDate);
	
	return $age;
    }

    /**
    * display the age details
    * @return string
    */
    public function displayAgeInfo()
    {
	$age = $this->getAge();
	
	echo "Your age is " . $age->y .' year(s) '. $age->m .' month(s) '. $age->d . 'day(s)';
    }
}
