<?php

$tests = [
    'tes',
    '12test',
    'test_',
    '_test',
    'test__test',
    'Mike Standish',
    'test12',
    'test_test',
    ];
    
    foreach($tests as $testStr)
    {
        echo "Test string: <b>{$testStr}</b>";
        $result = validate($testStr)?'true':'false';
        echo " validated: <b>{$result}</b>";
        echo "<br>\n";
    }

function validate($str)
{
  
    if(strlen($str) < 4)
        return false;
        
    if(substr_count($str,'_') > 1)
        return false;
        
    if(substr($str,-1) === '_')
        return false;
        
    $pattern = '/^[a-zA-Z]([a-zA-Z0-9_])+$/';
    if(preg_match($pattern, $str) === 0)
        return false;
    
    return true;
}