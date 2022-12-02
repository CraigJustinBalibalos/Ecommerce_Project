<?php

namespace app\models;

class Checkout extends \app\core\Model{

	public function createCheckout(){
		$SQL = "INSERT INTO checkout(account_id, status) VALUES (:account_id, :status)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['account_id'=>$this->account_id,
						'status'=>$this->status]);
		return self::$_connection->lastInsertId();
	}

	public function findUserCheckout($account_id){
		$SQL = "SELECT * FROM checkout WHERE account_id = :account_id AND status = :status";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['status'=>'not_paid',
						'account_id'=>$account_id]);
	}

	public function updateCheckoutStatus(){
		$SQL = "UPDATE checkout SET status=:status WHERE account_id = :account_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['status'=>$this->status,
						'account_id'=>$this->account_id]);
	}
	
}