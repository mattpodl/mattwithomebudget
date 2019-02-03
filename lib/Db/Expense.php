<?php
namespace OCA\MattWitHomeBudget\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Expense extends Entity implements JsonSerializable {

    protected $content;
    protected $userId;
    protected $date;
    protected $dayNumber;
    protected $recipient;
    protected $description;
    protected $amount;
    protected $categoryId;

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'date' => $this->date,
            'dayNumber' => $this->dayNumber,
            'recipient' => $this->recipient,
            'description' => $this->description,
            'amount' => $this->amount,
            'categoryId' => $this->categoryId
        ];
    }
}
