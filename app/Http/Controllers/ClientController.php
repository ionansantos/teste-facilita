<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Clients;
use App\Services\ClientService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(protected ClientService $service) {}

    public function index(Request $request)
    {
        $clients = $this->service->findAll();
        return view('clients.index', compact('clients'));
    }

    public function store(ClientRequest $request) {
        try{
            $this->service->new($request->all());
            return redirect()->route('clients.index')->with('success', 'Usuário criado com sucesso!');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário: ' . $e->getMessage());
        };
    }

    public function edit(Clients $client) {
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id) {
        try {
            $this->service->updateClient($request, $id);
            return redirect()->route('clients.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $client = $this->service->findOne($id);

        if (!$client) {
            return redirect()->back()->with('error', 'Erro ao excluir registro: ' . $e->getMessage());
        }

        $this->service->destroy($id);

        return redirect()->route('clients.index')->with('success', 'Registro excluído com sucesso!');
    }
}
