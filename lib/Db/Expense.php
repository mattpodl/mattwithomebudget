<?php
namespace OCA\MattWitHomeBudget\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

/**
 * Class Expense
 * @package OCA\Notes\Db
 */
class Expense extends Entity implements JsonSerializable {

    public $content;
    public $userId;
    public $date;
    public $dayNumber;
    public $recipient;
    public $description;
    public $amount;
    public $categoryId;

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'userId' => $this->userId,
            'date' => $this->date,
            'dayNumber' => $this->dayNumber,
            'recipient' => $this->recipient,
            'description' => $this->description,
            'amount' => $this->amount,
            'categoryId' => $this->categoryId
        ];
    }
}
