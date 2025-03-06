<?php
class deleteuserCest
{
public function testDeleteUserById(AcceptanceTester $I)
{
    $userId = $I->recallUserId();
    $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
    $I->sendDELETE($this->baseUrl . '/users/' . $userId);

    $I->seeResponseCodeIs(204);
}
}