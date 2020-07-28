
<?php 

use PHPUnit\Framework\TestCase;
class FirstTest extends testCase

{
public function test()
{
    $a = 5;
    $b = 4;
    $c = 5 * 4;

    $this->assertEquals($c, 10);
}
}