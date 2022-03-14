<?php 

define('BIG_CRATE_SIZE',5);
define('SMALL_CRATE_SIZE', 1);

echo calculateCrates(16,2,10);
echo "\n";
echo calculateCrates(16,1,5);
echo "\n";
echo calculateCrates(16,4,10);
echo "\n";
echo calculateCrates(16,3,10);
echo "\n";
echo calculateCrates(16,3,0);
echo "\n";
echo calculateCrates(16,0,20);
echo "\n";

function calculateCrates($itemCount, $bigCratesTotal, $smallCratesTotal)
{
    $totalCapacity = $bigCratesTotal*BIG_CRATE_SIZE + $smallCratesTotal*SMALL_CRATE_SIZE;

    if($totalCapacity < $itemCount)
        return -1;

    $bigCrateCount  = floor($itemCount/BIG_CRATE_SIZE);
    $restItemsCount = $itemCount%BIG_CRATE_SIZE;

    if($bigCrateCount>$bigCratesTotal)
    {
        $bigCrateCount = $bigCratesTotal;
        $restItemsCount = $itemCount - $bigCrateCount*BIG_CRATE_SIZE;
    }

    if($smallCratesTotal*SMALL_CRATE_SIZE < $restItemsCount)
        return -1;

    $smallCratesCount = ceil($restItemsCount/SMALL_CRATE_SIZE);

    return $smallCratesCount+$bigCrateCount;

}