<?php
class InvalidUser
{
 public function testCreateUserInvalidInput(AcceptanceTester $I)
 {
     $userData = [
         'firstName' => 'Test',
         // Missing lastName
         'email' => 'test.user@example.com',
         'dateOfBirth' => '1990-01-01',
         'personalIdDocument' => [
             'documentId' => 'TEST12345',
             'countryOfIssue' => 'US',
             'validUntil' => '2030-12-31',
         ],
     ];

     $I->haveHttpHeader('Content-Type', 'application/json');
     $I->haveHttpHeader('Accept', 'application/problem+json');
     $I->haveHttpHeader('Authorization', $this->authHeader['Authorization']);
     $I->sendPOST($this->baseUrl . '/users', $userData);

     $I->seeResponseCodeIs(400);
     $I->seeResponseIsJson();
     $I->seeResponseContainsJson(['title' => 'Invalid Input']);
 }
}