<?php
namespace app\model;
class Tag extends Label {
    protected  $logo;
    public function __construct(){
        parent::__construct();

}

    public function getLogo() { 
        return $this->logo;
    }
    public function setLogo($logo) {
            $this->logo = $logo;
    }

    public  function __tostring() {
        parent::__tostring()."".$this->getLogo().""; 
    }
}
