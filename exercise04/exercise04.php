<?php

$tests = [
    '2022/03/12',
    '2022-03-12',
    '2022.03.12'
    ];

    $tests = array("2010/02/20", "19/12/2016", "11-18-2012","20130720");

    print_r(transformDateFormat($tests));
        
    function transformDateFormat($dateList)
    {
        $parsedList = [];

        foreach($dateList as $dateStr)
        {
            if($date = date_create_from_format('Y/m/d', $dateStr))
            {
                $parsedList[] =  date_format($date,'Ymd');
            }
            elseif($date = date_create_from_format('d/m/Y', $dateStr))
            {
                $parsedList[] = date_format($date,'Ymd');
            }
            elseif($date = date_create_from_format('m-d-Y', $dateStr))
            {
                $parsedList[] = date_format($date,'Ymd');
            }

        }

        return $parsedList;
    }

