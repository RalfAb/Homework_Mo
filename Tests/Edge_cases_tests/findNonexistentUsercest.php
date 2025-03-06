<?php
class findnonexistenuserCest
{
  public function testGetUserByIdNotFound(AcceptanceTester $I)
  {
      $nonExistentUserId = 'nonexistent-user-id';
      $I->haveHttpHeader('Accept', 'application/problem+json');
      $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
      $I->sendGET($this->baseUrl . '/users/' . $nonExistentUserId);

      $I->seeResponseCodeIs(404);
      $I->seeResponseIsJson();
      $I->seeResponseContainsJson(['title' => 'User not found']);
  }
}