<?php
return call_user_func(
    function () {
        $userCollection = new \Phalcon\Mvc\Micro\Collection();

        $userCollection
            ->setPrefix('/v1/endereco')
            ->setHandler('\App\Users\Controllers\EnderecoController')
            ->setLazy(true);

        $userCollection->get('/', 'getEnderecos');
        $userCollection->get('/{id:\d+}', 'getEndereco');

        $userCollection->post('/', 'addEndereco');

        $userCollection->put('/{id:\d+}', 'editEndereco');

        $userCollection->delete('/{id:\d+}', 'deleteEndereco');

        return $userCollection;
    }
);