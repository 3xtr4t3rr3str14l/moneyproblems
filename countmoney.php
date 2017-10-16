<?php

  $padLen = 30;
  $numCombos = 0;

  function sortData($data) {
    function compare($a, $b) {
      $valueA = $a['value'];
      $valueB = $b['value'];
      if ($valueA == $valueB) {
        return 0;
      }
      return ($valueA > $valueB) ? -1 : 1;
    }
    usort($data, "compare");
    return $data;
  }

  function findChange($coinIndex, $data) {
    $dataSize = count($data);

    for ($j = 0; $j <= $data[$coinIndex]["maxCount"]; $j++) {
      $data[$coinIndex]["count"] = $j;
      $nextCoinIndex = $coinIndex + 1;

      if ($coinIndex == ($dataSize - 2)) {
        $previousTotal = 0;
        for ($i = 0; $i < $dataSize - 1; $i++) {
          $previousTotal += ($data[$i]["count"] * $data[$i]["value"]);
        }
        $coinRemainder = $data[$nextCoinIndex]["maxCount"] - $previousTotal;
        $data[$nextCoinIndex]["count"] = $coinRemainder;
        if ($coinRemainder < 0) {
          continue;
        } else {
          echo "\n";
          foreach ($data as $d) {
            echo str_pad($d["count"], strlen($d["displayName"]), " ", STR_PAD_LEFT);
          }
          $GLOBALS["numCombos"]++;
        }
      } else {
        findChange($nextCoinIndex, $data);
      }
    }
  }

  function printHeader($data) {
    echo "\n";
    foreach ($data as $d) {
      echo $d['displayName'];
    }
  }

  function getFormattedDataFromUserInput($input) {
    $inputArray = explode("," ,$input);
    $inputArraySize = sizeof($inputArray);

    for ($i = 0, $j = 0; $i < $inputArraySize; $i += 2, $j++) {
      $maxCount = $inputArray[$i + 1];
      $maxCounts = array_filter($inputArray, 'is_numeric');
      $value = max($maxCounts) / $maxCount;
      $paddingLength = strlen($inputArray[$i]) + 1;
      $displayName = str_pad($inputArray[$i], $paddingLength, " ", STR_PAD_LEFT);
      $data[$j] = [
        "displayName" => $displayName,
        "maxCount" => $maxCount,
        "value" => $value,
        "count" => 0
      ];
    }
    return sortData($data);
  }

  if (count($argv) > 1) {
    $data = getFormattedDataFromUserInput($argv[1]);
    printHeader($data);
    $startingCoinIndex = 0;
    findChange($startingCoinIndex, $data);
    echo "\n", " Count: ", $GLOBALS["numCombos"], "\n";
  } else {
    echo "No input provided.  Please run again with proper input as 'php countmoney.php <input>'. \n";
  }
?>
