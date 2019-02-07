<?php
 namespace OCA\MattWitHomeBudget\Controller;

 use OCP\AppFramework\Controller;
 use OCP\IRequest;
 use OCP\IConfig;
 use OCP\AppFramework\Http\DataResponse;


 use OCA\MattWitHomeBudget\Service\CategoryService;

/**
 * Class CategoryController
 *
 * @package OCA\MattWitHomeBudget\Controller
 */
 class CategoryController extends Controller {

     /** @var CategoryService */
     private $service;
     /** @var string */
     private $userId;
     
     use Errors;

         /**
     * @param string $AppName
     * @param IRequest $request
     * @param CategoryService $service
     * @param string $UserId
     */
     public function __construct($AppName, IRequest $request, CategoryService $service, $UserId){
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
     public function create($name, $hexColor, $description='', $budgetPeriod=30) {
         return $this->service->create($this->userId, $name, $hexColor, $description, $budgetPeriod);
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
     public function update($id, $name, $hexColor, $description, $budgetPeriod) {
         return $this->handleNotFound(function () use ($id, $name, $hexColor, $description, $budgetPeriod) {
           return $this->service->update($id, $this->userId, $name, $hexColor, $description, $budgetPeriod);
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
