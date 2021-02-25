<?php

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /** Display home page */
    function home()
    {
        //Display a view
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personal()
    {
        global $validator;
        global $profile;


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);
            $fName = trim($_POST['fName']);
            $lName = trim($_POST['lName']);
            $age = trim($_POST['age']);
            $gender = $_POST['genders'];
            $number = trim($_POST['number']);

            echo $fName;
            echo $lName ;
            echo $age;
            echo $gender;
            echo $number;

            if ($validator->validfName($fName)) {
                $profile->setfName($fName);
            }
            else {
                $this->_f3->set('errors["fName"]', "Invalid first name. Must contain only alphabetical characters and can't be empty.");
            }

            if ($validator->validlName($lName)) {
                $profile->setlName($lName);
            }
            else {
                $this->_f3->set('errors["lName"]', "Invalid last name. Must contain only alphabetical characters and can't be empty.");
            }

            if ($validator->validAge($age)) {
                $profile->setAge($age);
            }
            else {
                $this->_f3->set('errors["age"]', "Invalid age. Must be between 18 - 118.");
            }

            if ($validator->validPhone($number)) {
                $profile->setPhone($number);
            }
            else {
                $this->_f3->set('errors["number"]', "Invalid phone number. Must be 10-11 digits");
            }

            if (isset($gender)) {
                $profile->setGender($gender);
            }
            else {
                $this->_f3->set('errors["genders"]', "Must choose a gender");
            }
        }

        $view = new Template();
        echo $view->render('views/personal-info.html');
    }
}