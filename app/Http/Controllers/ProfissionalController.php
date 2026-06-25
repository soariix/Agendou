<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionalController extends Controller
{
    public function index(Request $request)
    {
        $professionals = Profissional::with('user')
            ->where('tenant_id', $request->tenant_id)
            ->get();

        return response()->json($professionals);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'bio'      => 'nullable|string',
        ]);

        $professional = DB::transaction(function () use ($request) {
            $user = User::create([
                'tenant_id' => $request->tenant_id,
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'role'      => 'professional',
            ]);

            return Profissional::create([
                'tenant_id' => $request->tenant_id,
                'user_id'   => $user->id,
                'bio'       => $request->bio,
            ]);
        });

        return response()->json($professional->load('user'), 201);
    }

    public function show(Request $request, $id)
    {
        $professional = Profissional::with('user')
            ->where('tenant_id', $request->tenant_id)
            ->findOrFail($id);

        return response()->json($professional);
    }

    public function update(Request $request, $id)
    {
        $professional = Profissional::where('tenant_id', $request->tenant_id)
            ->findOrFail($id);

        $request->validate([
            'bio' => 'nullable|string',
        ]);

        $professional->update($request->only('bio'));

        return response()->json($professional->load('user'));
    }

    public function destroy(Request $request, $id)
    {
        $professional = Profissional::where('tenant_id', $request->tenant_id)
            ->findOrFail($id);

        $professional->delete();

        return response()->json(['message' => 'Profissional removido com sucesso']);
    }
}
