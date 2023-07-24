<?php

class Complaint_models extends CI_Model
{
    public function createComplaint($name, $phone, $room, $message)
    {
        $data = array(
            'complaint_name' => $name,
            'complaint_phone' => $phone,
            'complaint_room' => $room,
            'complaint_message' => $message
        );

        return $this->db->insert('complaint', $data);
    }
}