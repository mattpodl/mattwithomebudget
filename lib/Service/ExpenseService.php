<?php
 namespace OCA\MattWitHomeBudget\Service;

 use Exception;

 use OCP\AppFramework\Db\DoesNotExistException;
 use OCP\AppFramework\Db\MultipleObjectsReturnedException;

 use OCA\MattWitHomeBudget\Db\Expense;
 use OCA\MattWitHomeBudget\Db\ExpenseMapper;

 class ExpenseService {

     private $mapper;

     public function __construct(ExpenseMapper $mapper){
         $this->mapper = $mapper;
     }

     public function findAll($userId) {
         return $this->mapper->findAll($userId);
     }
     
     private function handleException ($e) {
         if ($e instanceof DoesNotExistException ||
             $e instanceof MultipleObjectsReturnedException) {
             throw new NotFoundException($e->getMessage());
         } else {
             throw $e;
         }
     }

     public function find($id, $userId) {
         try {
             return $this->mapper->find($id, $userId);
             
        // in order to be able to plug in different storage backends like files
        // for instance it is a good idea to turn storage related exceptions
        // into service related exceptions so controllers and service users
        // have to deal with only one type of exception
         } catch(Exception $e) {
             $this->handleException($e);
         }
     }
     
     public function create($date, $recipient, $description, $amount, $categoryId, $userId) {
         $expense = new Expense();
         $expense->setDate($date);
         $expense->setRecipient($recipient);
         $expense->setDescription($description);
         $expense->setAmount($amount);
         $expense->setCategoryId($categoryId);
         
         $expense->setUserId($userId);
         //$expense->setDayNumber($title); auto następny dayNumber
         return new $this->mapper->insert($expense);
     }

     public function update($id, $date, $dayNumber, $recipient, $description, $amount, $categoryId, $userId) {
         try {
             $expense = $this->mapper->find($id, $userId);
             $expense->setDate($date);
             $expense->setDayNumber($dayNumber);
             $expense->setRecipient($recipient);
             $expense->setDescription($description);
             $expense->setAmount($amount);
             $expense->setCategoryId($categoryId);
         return $this->mapper->update($expense);
         } catch(Exception $e) {
             $this->handleException($e);
         }
     }

     public function delete($id, $userId) {
         try {
             $expense = $this->mapper->find($id, $userId);
             $this->mapper->delete($expense);
         } catch(Exception $e) {
             $this->handleException($e);
         }
     }

 }
