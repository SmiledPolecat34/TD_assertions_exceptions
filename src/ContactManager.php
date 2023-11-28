<?php

class ContactManager {
    private $contacts = [];

    public function addContact($name, $phone, $email) {
        $this->contacts[] = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email
        ];
    }

    public function removeContact($name) {
        foreach ($this->contacts as $key => $contact) {
            if ($contact['name'] === $name) {
                unset($this->contacts[$key]);
                $this->contacts = array_values($this->contacts); // Réindexe le tableau après suppression
                break;
            }
        }
    }

    public function getContacts() {
        return $this->contacts;
    }
}


?>