<?php
require_once('simplehtml_form.php');
$mform = new simplehtml_form();
global $DB;
$link = new moodle_url('/my/form.php');
$link->align[]='center';

echo html_writer::link($link,'Add', ['class' => 'btn btn-danger']);

$rec=$DB->get_records_sql('SELECT * FROM  `mdl_trial`');
$table = new html_table();

$table->width = "80%";
$table->attributes['border'] = '1px';

$table->head = array('Email','Password','Action1','Action2',
            );
foreach($rec as $records) {
    $table->data[] = array (
        $records->email,
        $records->password,
        '<a href="'.$CFG->wwwroot.'/my/form.php?id='.$records->id.'&amp;course='.SITEID.'">'. EDIT.'</a>',
        '<a href="'.$CFG->wwwroot.'/my/delete.php?id='.$records->id.'&amp;course='.SITEID.'">'. DELETE.'</a>'   
    );
    $table->align[]='left';

}
echo html_writer::table($table);


