<?php
/**
 * namespace core
 */
namespace Core;
/**
 * Model of a MVC Pattern
 */
abstract class Model {

    protected $_members = array();

    public function __construct() {
        
    }

    public function __get($aKey){
        if (array_key_exists($aKey, $this->_members)){
            return $this->_members[$aKey];
        }
        return false;
    }
    public function __set($aKey, $aValue ){
        $this->_members[$aKey] = $aValue;
    }

    /**
     * @throws \JsonException
     */
    public function __toString(){
        return (string)json_encode($this->_members, JSON_THROW_ON_ERROR);
    }

    public function __isset($aKey){
        return \array_key_exists($aKey, $this->_members);
    }
    public function Members() {
        return $this->_members;
    }
}
?>