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
    public function __construct($_dataLayer)
    {
        $this->_dataLayer = new DataLayer();
    }

    /** validName() returns true if both first and last name are of string type
     * @param $fName
     * @param $lName
     * @return bool
     */
    function validName($fName, $lName)
    {
        return is_string($fName) && is_string($lName);
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