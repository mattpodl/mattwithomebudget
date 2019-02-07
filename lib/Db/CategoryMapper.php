<?php
namespace OCA\MattWitHomeBudget\Db;

use OCP\IDbConnection;
use OCP\AppFramework\Db\Mapper;

class CategoryMapper extends Mapper {

    public function __construct(IDbConnection $db) {
        parent::__construct($db, 'mattwithomebudget_categories', '\OCA\MattWitHomeBudget\Db\Category');
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM *PREFIX*mattwithomebudget_categories WHERE id = ? AND user_id = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll($userId) {
        $sql = 'SELECT * FROM *PREFIX*mattwithomebudget_categories WHERE user_id = ?';
        return $this->findEntities($sql, [$userId]);
    }

}