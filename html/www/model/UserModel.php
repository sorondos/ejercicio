<?php

namespace soron2;

class UserModel {

    public string $name;
    public string $lastname;


    public function __construct($name, $lastname) {
        $this->name = $name;
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastname(): string {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }



}