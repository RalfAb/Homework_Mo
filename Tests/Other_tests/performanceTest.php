<?php
public function testPerformanceCreateUser(AcceptanceTester $I)
    {
        $startTime = microtime(true);
        $this->testCreateUserSuccess($I);
        $endTime = microtime(true);
        $executionTime =
    }
    