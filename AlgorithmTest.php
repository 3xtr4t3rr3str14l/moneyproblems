<?php
include("./countmoney.php");

class AlgorithmTest extends PHPUnit_Framework_TestCase
{
  public function testAlgorithm() {
    $startPosition = 0;

    $data = [
      [
        'displayName' =>  'Quarter',
        'maxCount' => '4',
        'value' => '25',
        'count' => '0'
      ],
      [
        'displayName' =>  'Dime',
        'maxCount'=> '10',
        'value'=> '10',
        'count'=> '0'
      ],
      [
        'displayName' =>  'Nickel',
        'maxCount'=> '20',
        'value'=> '5',
        'count'=> '0'
      ],
      [
        'displayName' =>  'Penny',
        'maxCount' => '100',
        'value' => '1',
        'count' => '0'
      ]
    ];

    findChange(0, $data);

    $expectedOutput = "
      0   0     0  100
      0   0     1   95
      0   0     2   90
      0   0     3   85
      0   0     4   80
      0   0     5   75
      0   0     6   70
      0   0     7   65
      0   0     8   60
      0   0     9   55
      0   0    10   50
      0   0    11   45
      0   0    12   40
      0   0    13   35
      0   0    14   30
      0   0    15   25
      0   0    16   20
      0   0    17   15
      0   0    18   10
      0   0    19    5
      0   0    20    0
      0   1     0   90
      0   1     1   85
      0   1     2   80
      0   1     3   75
      0   1     4   70
      0   1     5   65
      0   1     6   60
      0   1     7   55
      0   1     8   50
      0   1     9   45
      0   1    10   40
      0   1    11   35
      0   1    12   30
      0   1    13   25
      0   1    14   20
      0   1    15   15
      0   1    16   10
      0   1    17    5
      0   1    18    0
      0   2     0   80
      0   2     1   75
      0   2     2   70
      0   2     3   65
      0   2     4   60
      0   2     5   55
      0   2     6   50
      0   2     7   45
      0   2     8   40
      0   2     9   35
      0   2    10   30
      0   2    11   25
      0   2    12   20
      0   2    13   15
      0   2    14   10
      0   2    15    5
      0   2    16    0
      0   3     0   70
      0   3     1   65
      0   3     2   60
      0   3     3   55
      0   3     4   50
      0   3     5   45
      0   3     6   40
      0   3     7   35
      0   3     8   30
      0   3     9   25
      0   3    10   20
      0   3    11   15
      0   3    12   10
      0   3    13    5
      0   3    14    0
      0   4     0   60
      0   4     1   55
      0   4     2   50
      0   4     3   45
      0   4     4   40
      0   4     5   35
      0   4     6   30
      0   4     7   25
      0   4     8   20
      0   4     9   15
      0   4    10   10
      0   4    11    5
      0   4    12    0
      0   5     0   50
      0   5     1   45
      0   5     2   40
      0   5     3   35
      0   5     4   30
      0   5     5   25
      0   5     6   20
      0   5     7   15
      0   5     8   10
      0   5     9    5
      0   5    10    0
      0   6     0   40
      0   6     1   35
      0   6     2   30
      0   6     3   25
      0   6     4   20
      0   6     5   15
      0   6     6   10
      0   6     7    5
      0   6     8    0
      0   7     0   30
      0   7     1   25
      0   7     2   20
      0   7     3   15
      0   7     4   10
      0   7     5    5
      0   7     6    0
      0   8     0   20
      0   8     1   15
      0   8     2   10
      0   8     3    5
      0   8     4    0
      0   9     0   10
      0   9     1    5
      0   9     2    0
      0  10     0    0
      1   0     0   75
      1   0     1   70
      1   0     2   65
      1   0     3   60
      1   0     4   55
      1   0     5   50
      1   0     6   45
      1   0     7   40
      1   0     8   35
      1   0     9   30
      1   0    10   25
      1   0    11   20
      1   0    12   15
      1   0    13   10
      1   0    14    5
      1   0    15    0
      1   1     0   65
      1   1     1   60
      1   1     2   55
      1   1     3   50
      1   1     4   45
      1   1     5   40
      1   1     6   35
      1   1     7   30
      1   1     8   25
      1   1     9   20
      1   1    10   15
      1   1    11   10
      1   1    12    5
      1   1    13    0
      1   2     0   55
      1   2     1   50
      1   2     2   45
      1   2     3   40
      1   2     4   35
      1   2     5   30
      1   2     6   25
      1   2     7   20
      1   2     8   15
      1   2     9   10
      1   2    10    5
      1   2    11    0
      1   3     0   45
      1   3     1   40
      1   3     2   35
      1   3     3   30
      1   3     4   25
      1   3     5   20
      1   3     6   15
      1   3     7   10
      1   3     8    5
      1   3     9    0
      1   4     0   35
      1   4     1   30
      1   4     2   25
      1   4     3   20
      1   4     4   15
      1   4     5   10
      1   4     6    5
      1   4     7    0
      1   5     0   25
      1   5     1   20
      1   5     2   15
      1   5     3   10
      1   5     4    5
      1   5     5    0
      1   6     0   15
      1   6     1   10
      1   6     2    5
      1   6     3    0
      1   7     0    5
      1   7     1    0
      2   0     0   50
      2   0     1   45
      2   0     2   40
      2   0     3   35
      2   0     4   30
      2   0     5   25
      2   0     6   20
      2   0     7   15
      2   0     8   10
      2   0     9    5
      2   0    10    0
      2   1     0   40
      2   1     1   35
      2   1     2   30
      2   1     3   25
      2   1     4   20
      2   1     5   15
      2   1     6   10
      2   1     7    5
      2   1     8    0
      2   2     0   30
      2   2     1   25
      2   2     2   20
      2   2     3   15
      2   2     4   10
      2   2     5    5
      2   2     6    0
      2   3     0   20
      2   3     1   15
      2   3     2   10
      2   3     3    5
      2   3     4    0
      2   4     0   10
      2   4     1    5
      2   4     2    0
      2   5     0    0
      3   0     0   25
      3   0     1   20
      3   0     2   15
      3   0     3   10
      3   0     4    5
      3   0     5    0
      3   1     0   15
      3   1     1   10
      3   1     2    5
      3   1     3    0
      3   2     0    5
      3   2     1    0
      4   0     0    0";
    $this->expectOutputString($expectedOutput);
  }
}
?>
