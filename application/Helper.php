<?php

class Helper
{
    public static function getRolAdmin()
    {
        foreach (Session::get('usuario_roles')->funcionarioRol as $funcionarioRol) {
        //echo $funcionarioRol->rol->nombre;
            if ($funcionarioRol->rol->nombre == 'Administrador(a)') {
                return true;
            }
        }

        return false;
    }

    public static function getRolAdminSuper()
    {
        foreach (Session::get('usuario_roles')->funcionarioRol as $funcionarioRol) {
            //echo $funcionarioRol->rol->nombre;
            if ($funcionarioRol->rol->nombre == 'Administrador(a)' || $funcionarioRol->rol->nombre == 'Supervisor(a)') {
                return true;
            }
        }

        return false;
    }

    public static function getRolAdminVeterinario()
    {
        foreach (Session::get('usuario_roles')->funcionarioRol as $funcionarioRol) {
        //echo $funcionarioRol->rol->nombre;
            if ($funcionarioRol->rol->nombre == 'Administrador(a)' || $funcionarioRol->rol->nombre == 'Veterinario(a)') {
                return true;
            }
        }

        return false;
    }
}
