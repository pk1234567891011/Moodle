<?php
require_once(dirname(__FILE__) . '/../config.php');

require_once($CFG->dirroot.'/lib/formslib.php');

class simplehtml_form extends moodleform {

    
    public function definition() {
        //
        global $CFG, $COURSE, $USER;
        $mform = $this->_form; // Don't forget the underscore! 
        $password = $this->_customdata['password'];
        $email = $this->_customdata['email'];

        $mform->addElement('text', 'email', get_string('email')); // Add elements to your form
        $mform->setType('email', PARAM_NOTAGS);       
                //Set type of element
        $mform->addRule('email', 'invalid email !! ', 'email', null, 'client');
        $mform->setDefault('email', $email);        //Default value
        $mform->addElement('password', 'password', get_string('password'), $attributes);
        $mform->addRule('password', 'Please Enter Password', 'required', null, 'client');
        $mform->setDefault('password', $password );  
        $this->add_action_buttons();
        
    
    }
    function validation($data, $files) {
        return array();
    }
}
