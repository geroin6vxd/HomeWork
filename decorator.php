<?php

interface DataRequester {
    public function request();
}

abstract class Decorator implements DataRequester {
    protected $_requester;
    public function __construct(DataRequester $requester) {
        $this->_requester = $requester;
    }
    public function request() {
        return ($this->_requester->request());
    }
}

class DbRequester extends Decorator {
    public function __construct(DataRequester $requester) {
        parent::__construct($requester);
    }
    public function request() {
        if(!parent::request()) $this->dbRequest();
    }

    public function dbRequest() {
        // Connect to DB and request data from DB
        print('<br>Search in base and feeling cache.');
    }
}

class CacheRequester implements DataRequester {
    public function request() {
        print('Search in cache.');
        //Found In Cache
        //Return Result with True;
        //return true;

        //Not Found In Cache
        return false;
    }
}
class Integration {
    public static function loadData() {
        $requester = new CacheRequester();
        $cacheAndDbRequester = new DbRequester($requester);
        $cacheAndDbRequester->request();
    }
}
Integration::loadData();
