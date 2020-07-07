<?php


namespace App\Services;


use App\Repositories\ClientRepository;

class ClientService
{
    private $clientRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public function create(string $name)
    {
        $i = 0;
        do {
            $key = bin2hex(random_bytes(16));
            $i++;
        } while($this->clientRepository->findWhere(['key' => $key]) && $i < 100);

        return $this->clientRepository->create([
            'name' => $name,
            'key' => $key,
        ]);
    }
}
