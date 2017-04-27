<?php

require_once "base_model.php";

class InfoRow extends BaseModel
{

    public function getInfo()
    {
        $infoList = array();

        $user_id = 1;

        $partner_select = $this->dbc->prepare("SELECT partner_id FROM users 
													WHERE user_id=?");
        $partner_select->bind_param("i", $user_id);
        $partner_select->execute();
        $partner_select->bind_result($partner_id);

        if ($partner_select->fetch()) {
            $infoList["partner_id"] = $partner_id;
        } else {
            echo 'nay';
        }

        $partner_select->free_result();
        $partner_select->close();

        $fname_select = $this->dbc->prepare("SELECT firstname FROM users WHERE user_id=?");
        $fname_select->bind_param("i", $partner_id);
        $fname_select->execute();
        $fname_select->bind_result($firstname);
        if ($fname_select->fetch()) {
            $infoList["partner_firstname"] = $firstname;
        } else {
            echo 'nay';
        }

        $fname_select->free_result();
        $fname_select->close();

        $lname_select = $this->dbc->prepare("SELECT lastname FROM users WHERE user_id=?");
        $lname_select->bind_param("i", $partner_id);
        $lname_select->execute();
        $lname_select->bind_result($lastname);
        if ($lname_select->fetch()) {
            $infoList["partner_lastname"] = $lastname;
        } else {
            echo 'nay';
        }

        $lname_select->free_result();
        $lname_select->close();

        $school_select = $this->dbc->prepare("SELECT school FROM users WHERE user_id=?");
        $school_select->bind_param("i", $partner_id);
        $school_select->execute();
        $school_select->bind_result($school);
        if ($school_select->fetch()) {
            $infoList["partner_school"] = $school;
        } else {
            echo 'nay';
        }

        $school_select->free_result();
        $school_select->close();


        $phone_select = $this->dbc->prepare("SELECT phonenumber FROM users WHERE user_id=?");
        $phone_select->bind_param("i", $partner_id);
        $phone_select->execute();
        $phone_select->bind_result($phonenumber);
        if ($phone_select->fetch()) {
            $infoList["partner_phonenumber"] = $phonenumber;
        } else {
            echo 'nay';
        }

        $phone_select->free_result();
        $phone_select->close();

        $email_select = $this->dbc->prepare("SELECT email FROM users WHERE user_id=?");
        $email_select->bind_param("i", $partner_id);
        $email_select->execute();
        $email_select->bind_result($email);
        if ($email_select->fetch()) {
            $infoList["partner_email"] = $email;
        } else {
            echo 'nay';
        }

        $email_select->free_result();
        $email_select->close();

        return $infoList;
    }
}
