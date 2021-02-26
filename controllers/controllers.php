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

            //If there are no errors, redirect user to profile
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/profileInfo');
            }
        }

        //Sticky data
        $this->_f3->set('fName', isset($fName) ? $fName : "");
        $this->_f3->set('lName', isset($lName) ? $lName  : "");
        $this->_f3->set('age', isset($age) ? $age : "");
        $this->_f3->set('gender', isset($gender) ? $gender : "");
        $this->_f3->set('number', isset($number) ? $number : "");

        $view = new Template();
        echo $view->render('views/personal-info.html');
    }

    function profile() {
        global $validator;
        global $profile;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $state = $_POST['state'];
            $genderInterest = $_POST['genderInterest'];
            $biography = $_POST['biography'];

            //Email validation
            if ($validator->validEmail($email)) {
                $profile->setEmail($email);
            }
            else {
                $this->_f3->set('errors["email"]', "Invalid email. Please enter valid email.");
            }

            //Optional fields
            $profile->setGenderInterest($genderInterest);
            $profile->setBiography($biography);
            $profile->setState($state);

            //If there are no errors, redirect user to interests
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/interests');
            }
        }

        //Sticky data
        $this->_f3->set('email', isset($email) ? $email : "");
        $this->_f3->set('state', isset($state) ? $state : "");
        $this->_f3->set('genderInterest', isset($genderInterest) ?  : "");
        $this->_f3->set('biography', isset($biography) ? $biography : "");

        //Display a view
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    function interests() {
        global $validator;
        global $profile;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['indoorInterests'])) {
                $indoorInterests = $_POST['indoorInterests'];

                if ($validator->validIndoor($indoorInterests)) {
                    $indoorString = implode(", ", $indoorInterests);
                    $_SESSION['indoorInterests'] = $indoorString;
                }
                else {
                    $this->_f3->set('errors["indoorInterests"]', "Spoof attempt prevented!");
                }
            }

            if (isset($_POST['outdoorInterests'])) {
                $outdoorInterests = $_POST['outdoorInterests'];

                if ($validator->validOutdoor($outdoorInterests)) {
                    $outdoorString = implode(", ", $outdoorInterests);
                    $_SESSION['outdoorInterests'] = $outdoorString;
                }
                else {
                    $this->_f3->set('errors["outdoorInterests"]', "Spoof attempt prevented!");
                }
            }

            //If there are no errors, redirect user to summary page
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/summary');
            }
        }

        //Display a view
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    function summary()
    {
//        $_SESSION['interests'] = $_POST;
//        if (isset($_POST) && count($_POST) > 0) {
//
//            $_SESSION['interests'] =  implode(", ", $_SESSION['interests']['interests']);
//        }
//        else {
//            $_SESSION['interests'] =  "none";
//        }

//    var_dump($_SESSION['interests']);

        $view = new Template();
        echo $view->render('views/summary.html');
    }
}