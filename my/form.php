<?php

    require_once('simplehtml_form.php');
    $id = $_GET['id'];
    global $DB;
    $data = $DB->get_record('trial', ['id' => $id]);
    $mform = new simplehtml_form( null, array('email'=>$data->email, 'password'=>$data->password ) ); 
    if ($mform->is_cancelled()) {
        $urltogo= $CFG->wwwroot.'/my/display.php';
        redirect($urltogo);
    } 
    else if ($fromform = $mform->get_data()) {
        global $DB;
        $data = new stdClass();
        $data->email=$fromform->email;
        $data->password=$fromform->password;
        $DB->insert_record('trial',$data);

        $urltogo= $CFG->wwwroot.'/my/display.php';
        redirect($urltogo);
    } 
  else {
   
  	    $mform->display();
    }
?>