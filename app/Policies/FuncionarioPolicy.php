<?php

namespace OrgTabajara\Policies;

use OrgTabajara\Funcionario;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the funcionario.
     *
     * @param  \OrgTabajara\Funcionario  $user
     * @param  \OrgTabajara\Funcionario  $funcionario
     * @return mixed
     */
    public function view(Funcionario $user, Funcionario $funcionario)
    {
        return true;
    }

    /**
     * Determine whether the user can create funcionarios.
     *
     * @param  \OrgTabajara\Funcionario  $user
     * @return mixed
     */
    public function create(Funcionario $user)
    {
        return $user->departamento->descricao == "rh";
    }

    /**
     * Determine whether the user can update the funcionario.
     *
     * @param  \OrgTabajara\Funcionario  $user
     * @param  \OrgTabajara\Funcionario  $funcionario
     * @return mixed
     */
    public function update(Funcionario $user, Funcionario $funcionario)
    {
    	
			return true;
    }

    /**
     * Determine whether the user can delete the funcionario.
     *
     * @param  \OrgTabajara\Funcionario  $user
     * @param  \OrgTabajara\Funcionario  $funcionario
     * @return mixed
     */
    public function delete(Funcionario $user, Funcionario $funcionario)
    {
			return true;
    }
}
