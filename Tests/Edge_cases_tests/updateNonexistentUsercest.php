<?php
class UpdateNonexistenUserCest
{
 public function testUpdateUserByIdNotFound(AcceptanceTester $I)
 {
     $nonExistentUserId = 'nonexistent-user-id';
     $updatedUserData = [
         'firstName' => 'Updated',
         'lastName' => 'User',
         'email' => 'updated.user@example.com',
         'dateOfBirth' => '1991-01-01',
         'personalIdDocument' => [
             'documentId' => 'UPDATE12345',
             'countryOfIssue' => 'CA',
             'validUntil' => '2031-12-31',
         ],
     ];

     $I->haveHttpHeader('Content-Type', 'application/json');
     $I->haveHttpHeader('Accept', 'application/problem+json');
     $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
     $I->sendPUT($this->baseUrl . '/users/' . $nonExistentUserId, $updatedUserData);

     $I->seeResponseCodeIs(404);
     $I->seeResponseIsJson();
     $I->seeResponseContainsJson(['title' => 'User not found']);
 }
}