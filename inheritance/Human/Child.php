<?php
namespace Human;

class Child extends Human
{
    private $brain;
    
    public function getBrain()
    {
        return $this->brain;
    }

    public function setBrain($brain)
    {
        $this->brain = $brain;
    }
    
    public static function fromArray(array $definition)
    {
        $logger2 = \Logger::getInstance();
        $logger2->log('2');
        $child = new Child();
        $child->setAge((int)$definition['age'] ?? '')
            ->setGender($definition['gender'] ?? '')
            ->setName($definition['name'] ?? '')
            ->setEye(Eye::fromArray($definition['eye'] ?? []))
            ->setHair(Hair::fromArray($definition['hair'] ?? []))
            ->setBrain($definition['brain'] ?? '');
        
        return $child;
    }
}

