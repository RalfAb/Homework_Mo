<?php
public function testSecurityInvalidAuth(AcceptanceTester $I)
{
    $invalidAuthHeader = ['Authorization' => 'Basic ' . base64_encode('invalid:credentials')];
    $I->haveHttpHeader('Authorization', $invalidAuthHeader['Authorization']);
    $I->sendGET($this->baseUrl . '/users');

    $I->seeResponseCodeIs(401);
}