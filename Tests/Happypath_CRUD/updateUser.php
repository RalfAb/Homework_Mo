<?php
 public function testUpdateUserById(AcceptanceTester $I)
 {
     $userId = $I->recallUserId();
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
     $I->haveHttpHeader('Accept', 'application/json');
     $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
     $I->sendPUT($this->baseUrl . '/users/' . $userId, $updatedUserData);

     $I->seeResponseCodeIs(200);
     $I->seeResponseIsJson();
     $I->seeResponseContainsJson($updatedUserData);
 }
