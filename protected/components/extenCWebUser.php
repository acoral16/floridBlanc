<?php
class extenCWebUser extends CWebUser
{

        public function isAdmin() {
                return $this->getState('isAdmin');  
        }
        
        public function getSeed() {
        	return $this->getState('seed');
        }
                
        
}
