<?php
namespace App\Users\Controllers;

use App\Controllers\RESTController;
use App\Users\Models\Endereco;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Endereco\Controllers
 * @author Luana Hellmann <luly.hellmann@gmail.com>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class EnderecoController extends RESTController
{
    /**
     * Retorna uma lista de Endereço.
     *
     * @access public
     * @return Array Lista de Endereço.
     */
    public function getEnderecos()
    {
        try {
            $endereco = (new Endereco())->find(
                [
                    'conditions' => 'true ' . $this->getConditions(),
                    'columns' => $this->partialFields,
                    'limit' => $this->limit
                ]
            );

            return $endereco;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retorna um Endereço.
     *
     * @access public
     * @return Array Endereço.
     */
    public function getEndereco($iEnderecoId)
    {
        try {
            $endereco = (new Endereco())->findFirst(
                [
                    'conditions' => "iEnderecoId = '$iEnderecoId'",
                    'columns' => $this->partialFields,
                ]
            );

            return $endereco;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Adiciona um Endereço.
     *
     * @access public
     * @return Array Endereço.
     */
    public function addEndereco()
    {
        try { 
             $post= $this->di->get('request')->getPost();

            $endereco = new Endereco();
            $endereco->iUserId = $post['iUserId'];            
            $endereco->sCep = $post['sCep'];
            $endereco->sEndereco = $post['sEndereco'];
            $endereco->iNumero = $post['iNumero'];
            $endereco->sComplemento = isset($post['sComplemento']) ?  $post['sComplemento'] : '';           

            $endereco->saveDB();

            return $endereco;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Editar o campo de um Endereço.
     *
     * @access public
     * @return Array.
     */
    public function editEndereco($iEnderecoId)
    {
        try {
            $put = $this->di->get('request')->getPut();

            $endereco= (new Endereco())->findFirst($iEnderecoId);

            if (false === $endereco) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $endereco->iUserId = isset($put['iUserId']) ? $put['iUserId'] : $endereco->iUserId;
            $endereco->sCep = isset($put['sCep']) ? $put['sCep'] : $endereco->sCep;
            $endereco->sEndereco = isset($put['sEndereco']) ? $put['sEndereco'] : $endereco->sEndereco;
            $endereco->iNumero= isset($put['iNumero']) ? $put['iNumero'] : $endereco->iNumero;
            $endereco->sComplemento = isset($put['sComplemento']) ? $put['sComplemento'] : $endereco->sComplemento;
                    
            $endereco->saveDB();

            return $endereco;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove um Endereço.
     *
     * @access public
     * @return boolean.
     */
    public function deleteEndereco($iEnderecoId)
    {
        try {
            $endereco = (new Endereco())->findFirst($iEnderecoId);

            if (false === $endereco) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $endereco->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
