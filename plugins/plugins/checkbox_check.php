<?php
////////////////////////////////////////////////////////// proverka checkboxa
function checkbox_verify($_name)
{
$result=0;
if (isset($_REQUEST[$_name]))
{ if ($_REQUEST[$_name]=='on') { $result=1; } else { $result=0; }
}
return $result;
}
//////////////////////////////////////////////////////////
?>
