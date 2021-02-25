<?php

class Profile
{
    private $_fName;
    private $_lName;
    private $_age;
    private $_gender;

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->_gender = $gender;
    }
    private $_phone;
    private $_email;
    private $_outdoorActivites;
    private $_indoorActivities;

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->_fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed
     */
    public function getOutdoorActivites()
    {
        return $this->_outdoorActivites;
    }

    /**
     * @return mixed
     */
    public function getIndoorActivities()
    {
        return $this->_indoorActivities;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName): void
    {
        $this->_fName = $fName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName): void
    {
        $this->_lName = $lName;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->_age = $age;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @param mixed $outdoorActivites
     */
    public function setOutdoorActivites($outdoorActivites): void
    {
        $this->_outdoorActivites = $outdoorActivites;
    }

    /**
     * @param mixed $indoorActivities
     */
    public function setIndoorActivities($indoorActivities): void
    {
        $this->_indoorActivities = $indoorActivities;
    }


}

