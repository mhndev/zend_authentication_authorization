<?php

class Application_Acl_Order extends Zend_Db_Table_Row_Abstract implements Application_Acl_ResourceInterface
{
    public function getType()
    {
        return 'Order';
    }


    public function getResourceId()
    {
        $id = $this->getType();
        if($this->order_id){
            $id .= ':'.$this->order_id;
        }

        return $id;
    }
}