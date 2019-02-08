<?php
 namespace OCA\MattWitHomeBudget\Controller;

 use OCP\AppFramework\Controller;
 use OCP\IRequest;
 use OCP\IConfig;
 use OCP\IURLGenerator;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Http\RedirectResponse;


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
     private $uiurl; //URL dla czlowiekow
     
     use Errors;

         /**
     * @param string $AppName
     * @param IRequest $request
     * @param ExpenseService $service
     * @param string $UserId
     */
     public function __construct($AppName, IRequest $request, IURLGenerator $urlGenerator, ExpenseService $service, $UserId){
         parent::__construct($AppName, $request);
         $this->service = $service;
         $this->userId = $UserId;
         $this->urlGenerator = $urlGenerator;
         $this->uiurl = $urlGenerator->linkToRoute('mattwithomebudget.page.expenses'); 
     }

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      */
     public function index() {
         // NIE UZYWANY
         return new DataResponse($this->service->findAll($this->userId));
     }

    /**
      * @NoCSRFRequired
      * @NoAdminRequired
      *
      * @param int $id
      * @param string $action
      * @param string $date
      * @param string $dayNumber
      * @param string $recipient
      * @param string $description
      * @param string $amount
      * @param int $categoryId
      */
      public function operator($id, $action, $date=null, $dayNumber=null, $recipient=null, $description=null, $amount=null, $categoryId=null) {
        switch ($action) {
            case "update":
                $this->service->update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId, $this->userId);
                break;
            case "delete":
                $this->service->delete($id, $this->userId);
                break;
            default:
                return $this->handleNotFound(function () use ($id) {
                    return $this->service->find($id, $this->userId);
                });
        }
        return new RedirectResponse($this->uiurl);//dodac handleNotFound jakos
    }
        

     /**
      * @NoCSRFRequired
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
         $this->service->create($this->userId, $date, $amount, $recipient, $description, $categoryId);
         return new RedirectResponse($this->uiurl);
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
     public function update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId) {
        //  return $this->handleNotFound(function () use ($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId) {
        //    return $this->service->update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId, $this->userId);
        //  });
        $this->service->update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId, $this->userId);
        return new RedirectResponse($this->uiurl); //dodac handleNotFound jakos
         
	 }

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      *
      * @param int $id
      */
     public function destroy($id) {
        //  return $this->handleNotFound(function () use ($id) {
        //    return $this->service->delete($id, $this->userId);
        //  });
        $this->service->delete($id, $this->userId);
        return new RedirectResponse($this->uiurl); //dodac handleNotFound jakos
     }

 }
