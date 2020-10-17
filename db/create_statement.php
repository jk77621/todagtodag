<?php
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_procedure.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_trigger.php";

create_table($con, "members");
create_table($con, "deleted_members");
create_table($con, "hospital");
create_table($con, "deleted_hospital");
create_table($con, "notice");
create_table($con, "review");
create_table($con, "health_info");
create_table($con, "interest");
create_table($con, "media");
create_table($con, "appointment");
create_table($con, "faq");
create_table($con, "free");
create_table($con, "free_ripple");
create_table($con, "question");
create_table($con, "question_ripple");

create_procedure($con, 'media_procedure');

create_trigger($con, 'appointment_init');
create_trigger($con, 'deleted_members');
create_trigger($con, 'deleted_hospital');
?>