<?php
namespace OCA\MattWitHomeBudget\Db;

use OCP\IDbConnection;
use OCP\AppFramework\Db\Mapper;

class ExpenseMapper extends Mapper {

    public function __construct(IDbConnection $db) {
        parent::__construct($db, 'mattwithomebudget_expenses', '\OCA\MattWitHomeBudget\Db\Expense');
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM *PREFIX*mattwithomebudget_expenses WHERE id = ? AND user_id = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll($userId) {
        $sql = 'SELECT * FROM *PREFIX*mattwithomebudget_expenses WHERE user_id = ?';
        return $this->findEntities($sql, [$userId]);
    }

}