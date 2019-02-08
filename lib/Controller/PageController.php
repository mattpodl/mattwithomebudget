<?php
namespace OCA\MattWitHomeBudget\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

use OCA\MattWitHomeBudget\Service\ExpenseService;
use OCA\MattWitHomeBudget\Service\CategoryService;

class PageController extends Controller {
	private $userId;
	private $expenseService;
	private $categoryService;

	public function __construct($AppName, IRequest $request, ExpenseService $expenseService, CategoryService $categoryService, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
		$this->expenseService = $expenseService;
		$this->categoryService = $categoryService;
	}
	
	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		$templateParams['content'] = 'index';
		$templateParams['expensesFromDb'] = $this->expenseService->returnAll($this->userId);
		//$templateParams['expensesFromDbRaw'] = json_decode(json_encode($this->expenseService->findAll($this->userId)), true);
		return new TemplateResponse('mattwithomebudget', 'index', $templateParams);  // templates/index.php
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function expenses() {
		$templateParams['content'] = 'expenses';
		$templateParams['expensesFromDb'] = $this->expenseService->returnAll($this->userId);
		return new TemplateResponse('mattwithomebudget', 'index', $templateParams);  // templates/index.php
	}

     /**
      * @NoCSRFRequired
      * @NoAdminRequired
      *
      * @param int $id
      */
	public function expenseEdit($id) {
		$templateParams['content'] = 'expenseEdit';
		$templateParams['expensesFromDb'] = $this->expenseService->returnOne($id, $this->userId);
		//$templateParams['expensesFromDbRaw'] = $this->expenseService->find($id, $this->userId);
		return new TemplateResponse('mattwithomebudget', 'index', $templateParams);  // templates/index.php
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function categories() {
		$templateParams['content'] = 'categories';
		$templateParams['expensesFromDb'] = $this->expenseService->returnAll($this->userId);
		return new TemplateResponse('mattwithomebudget', 'index', $templateParams);  // templates/index.php
	}

	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
	public function importCsv() {
		$templateParams['content'] = 'import';
		$templateParams['expensesFromDb'] = $this->expenseService->returnAll($this->userId);
		return new TemplateResponse('mattwithomebudget', 'index', $templateParams);  // templates/index.php
	}

}
