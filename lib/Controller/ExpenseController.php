<?php
 namespace OCA\MattWitHomeBudget\Controller;

 use OCP\AppFramework\Controller;
 use OCP\IRequest;
 use OCP\IConfig;
 use OCP\AppFramework\Http\DataResponse;


 use OCA\MattWitHomeBudget\Service\ExpenseService;

/**
 * Class ExpenseController
 *
 * @package OCA\MattWitHomeBudget\Controller
 */
 class ExpenseController extends Controller {

     /** @var ExpenseService */
     private $service;
     /** @var string */
     private $userId;
     
     use Errors;

         /**
     * @param string $AppName
     * @param IRequest $request
     * @param ExpenseService $service
     * @param string $UserId
     */
     public function __construct($AppName, IRequest $request, ExpenseService $service, $UserId){
         parent::__construct($AppName, $request);
         $this->service = $service;
         $this->userId = $UserId;
     }

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      */
     public function index() {
         return new DataResponse($this->service->findAll($this->userId));
     }

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      *
      * @param int $id
      */
     public function show(int $id) {
         return $this->handleNotFound(function () use ($id) {
			 return $this->service->find($id, $this->userId);
		 });
     }

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      *
      * @param string $date
      * @param string $recipient
      * @param string $description
      * @param string $amount
      * @param int $categoryId
      */
     public function create($date, $amount, $recipient='', $description='', $categoryId=null) {
         return $this->service->create($this->userId, $date, $amount, $recipient, $description, $categoryId);
     }

     /**
      * @NoCSRFRequired
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
     public function update(int $id, string $date, string $dayNumber, string $recipient, string $description, string $amount, int $categoryId) {
         return $this->handleNotFound(function () use ($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId) {
           return $this->service->update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId, $this->userId);
         });
	 }

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      *
      * @param int $id
      */
     public function destroy(int $id) {
         return $this->handleNotFound(function () use ($id) {
           return $this->service->delete($id, $this->userId);
         });
     }

 }
