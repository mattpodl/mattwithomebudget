<?php
namespace OCA\MattWitHomeBudget\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

/**
 * Class Category
 * @package OCA\MattWitHomeBudget\Db
 */
class Category extends Entity implements JsonSerializable {

    protected $userId;
    protected $name;
    protected $hexColor;
    protected $description;
    protected $budgetPeriod;

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'name' => $this->name,
            'hexColor' => $this->hexColor,
            'description' => $this->description,
            'budgetPeriod' => $this->budgetPeriod
        ];
    }
}
