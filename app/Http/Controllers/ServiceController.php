<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::where('tenant_id', $request->tenant_id)->get();
        return response()->json($services);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:1',
            'preço' => 'required|numeric|min:0',
        ]);

        $service = Service::create([
            'tenant_id' => $request->tenant_id,
            'nome' => $request->nome,
            'duration_minutes' => $request->duration_minutes,
            'preço' => $request->preco,
        ]);

        return response()->json($service, 201);
    }

    public function show(Request $request, $id)
    {
        $service = Service::where('tenant_id', $request->tenant_id)
            ->findOrFail($id);

        return response()->json($service);
    }

    public function update(Request $request, $id)
    {
        $service = Service::where('tenant_id', $request->tenant_id)
            ->findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'duration_minutes' => 'sometimes|integer|min:1',
            'preço' => 'sometimes|numeric|min:0',
        ]);

        $service->update($request->only('nome', 'duration_minutes', 'preço'));

        return response()->json($service);
    }

    public function destroy(Request $request, $id)
    {
        $service = Service::where('tenant_id', $request->tenant_id)
            ->findOrFail($id);

        $service->delete();

        return response()->json(['message' => 'Serviço removido com sucesso']);
    }
}
