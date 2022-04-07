<?php

require_once './helpers.php';

auth_check();
echo "You are login as " . current_user()['name'];

?>



