<?php

public function testDeleteUserByIdNotFound(AcceptanceTester $I)
{
    $nonExistentUserId = 'nonexistent-user-id';
    $I->haveHttpHeader('Accept', 'application/problem+json');
    $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
    $I->sendDELETE($this->baseUrl . '/users/' . $nonExistentUserId);

    $I->seeResponseCodeIs(404);
    $I->seeResponseIsJson();
    $I->seeResponseContainsJson(['title' => 'User not found']);
}