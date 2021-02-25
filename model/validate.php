<?php

/**
 * Class Validate
 */
class Validate
{
    /**
     * @var DataLayer
     */
    private $_dataLayer;

    /**
     * Validate constructor.
     * @param $_dataLayer
     */
    public function __construct()
    {
        $this->_dataLayer = new DataLayer();
    }

    /** validfName() returns true if first name contains only alphabetic characters
     * @param $fName
     * @return bool
     */
    function validfName($fName)
    {
        return ctype_alpha($fName) && isset($fName);
    }

    /** validlName() returns true if last name contains only alphabetic characters
     * @param $lName
     * @return bool
     */
    function validlName($lName)
    {
        return ctype_alpha($lName) && isset($lName);;
    }

    /** validAge() returns true if age is greater than 18, and less than 118
     * @param $age
     * @return bool
     */
    function validAge($age)
    {
        return $age > 18 && $age < 118;
    }

    /** validPhone() returns true if phone number is 10 or 11 digits long
     * @param $number
     * @return bool
     */
    function validPhone($number): bool
    {
        if ($number >= 1000000000 && $number <= 99999999999) {
            return true;
        }
        else {
            return false;
        }
    }

    /** validOutdoor() returns true if all of the selected outdoor-activities are
     * in the list
     * @param Array $outdoorActivity
     * @return bool
     */
    function validOutdoor($outdoorActivity): bool
    {
        $validOutdoor = $this->_dataLayer->getOutdoor();
        return in_array($outdoorActivity, $validOutdoor);
    }

    /** validOutdoor() returns true if all of the selected indoor-activities are
     * in the list
     * @param Array $indoorActivity
     * @return bool
     */
    function validIndoor($indoorActivity): bool
    {
        $validIndoor = $this->_dataLayer->getOutdoor();
        return in_array($indoorActivity, $validIndoor);
    }


}