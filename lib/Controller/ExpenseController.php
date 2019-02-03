<?php
 namespace OCA\MattWitHomeBudget\Controller;

 use OCP\IRequest;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Controller;

 use OCA\MattWitHomeBudget\Service\ExpenseService;

 class ExpenseController extends Controller {

     private $mapper;
     private $userId;
     
     use Errors;

     public function __construct($AppName, IRequest $request, ExpenseService $service, $UserId){
         parent::__construct($AppName, $request);
         $this->service = $service;
         $this->userId = $UserId;
     }

     /**
      * @NoAdminRequired
      */
     public function index() {
         return new DataResponse($this->service->findAll($this->userId));
     }

     /**
      * @NoAdminRequired
      *
      * @param int $id
      */
     public function show($id) {
         return $this->handleNotFound(function () use ($id) {
			 return $this->service->find($id, $this->userId);
		 });
     }

     /**
      * @NoAdminRequired
      *
      * @param string $date
      * @param string $recipient
      * @param string $description
      * @param string $amount
      * @param int $categoryId
      */
     public function create($date, $recipient, $description, $amount, $categoryId) {
         return $this->service->create($date, $recipient, $description, $amount, $categoryId, $this->userId);
     }

     /**
      * @NoAdminRequired
      *
      * @param int $id
      * @param string $date
      * @param string $dayNumber
      * @param string $recipient
      * @param string $description
      * @param string $amount
      * @param int $categoryId
      */
     public function update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId) {
         return $this->handleNotFound(function () use ($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId) {
           return $this->service->update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId, $this->userId);
         });
	 }

     /**
      * @NoAdminRequired
      *
      * @param int $id
      */
     public function destroy($id) {
         return $this->handleNotFound(function () use ($id) {
           return $this->service->delete($id, $this->userId);
         });
     }

 }
