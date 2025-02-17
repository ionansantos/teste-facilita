<?php

namespace App\Services;

use App\Repository\ClientRepository;

class ClientService
{
    public function __construct(protected ClientRepository $clientRepository) {}

    public function findAll() {
        return $this->clientRepository->findAll();
    }

    public function findOne($id) {
        return $this->clientRepository->findOne($id);
    }

    public function new($data) {
        if ($data) {
            $data['registration_number'] = strtoupper(uniqid('USER-'));
            $client = $this->clientRepository->new($data);
            return $client;
        }
    }

    public function updateClient($request, $id) {
        $client = $this->clientRepository->findOne($id);
        if (!$client) {
            throw new \Exception('erro ao atualizar!');
        }
        $requestAttributes = $request->all();
        $this->clientRepository->update($id, $requestAttributes);
        $client->save();
    }

    public function destroy($id) {
        if($id) {
            $book = $this->clientRepository->findOne($id);
            if ($book) {
                $this->clientRepository->delete($id);

                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}
