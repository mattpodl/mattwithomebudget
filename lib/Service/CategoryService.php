<?php
 namespace OCA\MattWitHomeBudget\Service;

 use Exception;

 use OCP\AppFramework\Db\DoesNotExistException;
 use OCP\AppFramework\Db\MultipleObjectsReturnedException;

 use OCA\MattWitHomeBudget\Db\Category;
 use OCA\MattWitHomeBudget\Db\CategoryMapper;

 class CategoryService {

     /** @var CategoryMapper */
     private $mapper;

     public function __construct(CategoryMapper $mapper){
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
     
     public function create($userId, $name, $hexColor, $description='', $budgetPeriod=30) {
         $category = new Category();
         $category->setUserId($userId);
         $category->setName($name);
         $category->sethexColor($hexColor);
         $category->setDescription($description);
         $category->setBudgetPeriod($budgetPeriod);
         return $this->mapper->insert($category);
     }

     public function update($id, $userId, $name, $hexColor, $description, $budgetPeriod) {
         try {
             $category = $this->mapper->find($id, $userId);
             $category->setUserId($userId);
             $category->setName($name);
             $category->sethexColor($hexColor);
             $category->setDescription($description);
             $category->setBudgetPeriod($budgetPeriod);
             return $this->mapper->update($category);
         } catch(Exception $e) {
             $this->handleException($e);
         }
     }

     public function delete($id, $userId) {
         try {
             $category = $this->mapper->find($id, $userId);
             $this->mapper->delete($category);
         } catch(Exception $e) {
             $this->handleException($e);
         }
     }

 }
