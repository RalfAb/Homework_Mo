<?php
class UserAccountAPIcest
{
public function testGetUserById(AcceptanceTester $I)
    {
        $userId = $I->recallUserId();
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
        $I->sendGET($this->baseUrl . '/users/' . $userId);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['id' => $userId]);
    }
}