<?php

namespace App\Models\Usuarios;

use CodeIgniter\Model;

class UsersActiveSessionsModel extends Model
{
    protected $table = 'users_active_sessions';
    protected $primaryKey = ['ip', 'email', 'client']; // Cambiamos la clave primaria a 'ip'
    protected $allowedFields = ['ip', 'email', 'client', 'session_started_at', 'session_ends_at'];


    // Otras propiedades y métodos del modelo, si es necesario

    public function insertOrUpdate($data){
        $builder = $this->db->table($this->table);
        $builder->replace($data);
    }

    // Funcion para registrar sesion activa
    public function registerActiveSession($ip, $email, $session_started_at, $session_ends_at)
    {
        $userSessionData = [
            'ip' => $ip,
            'email' => $email,
            'client' => $_SERVER['HTTP_USER_AGENT'],
            'session_started_at' => $session_started_at,
            'session_ends_at' => $session_ends_at,
        ];
        
        $builder = $this->db->table($this->table);
        $builder->where(['ip' => $userSessionData['ip'], 'email' => $userSessionData['email'], 'client' => $userSessionData['client']]);

        if ($builder->countAllResults() > 0) {
            // Si existen registros con la misma clave primaria, actualiza los datos
            $builder->set($userSessionData);
            $builder->where(['ip' => $userSessionData['ip'], 'email' => $userSessionData['email'], 'client' => $userSessionData['client']]);
            $builder->update();
        } else {
            // Si no existen registros con la misma clave primaria, realiza una inserción
            $builder->insert($userSessionData);
        }
    
    }

}
