<?php
namespace App\Users\Models;

/**
 * Model da tabela 'Users'
 *
 * @package App\Users\Models
 * @author Luana Hellmann <luly.hellmann@gmail.com>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Endereco extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $iEnderecoId;

    /**
     * @Column(type="integer", length=10, nullable=false
     */
    public $iUserId;

    /**
     * @Column(type="string", length=9, nullable=false)
     */
    public $sCep;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    public $sEndereco;

    /**
     * @Column(type="integer", length=5,  nullable=false)
     */
    public $iNumero;

    /**
     * @Column(type="string", length=10, nullable=false)
     */
    public $sComplemento;


}
