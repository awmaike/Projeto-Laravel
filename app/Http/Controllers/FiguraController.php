<?php

namespace App\Http\Controllers;

use App\Models\Figura;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FiguraController extends Controller
{
    public function index(): View
    {
        return view('figuras.index', [
            'figuras' => Figura::query()->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('figuras.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('figuras', 'public');
        }

        $figura = Figura::query()->create($data);

        return to_route('figuras.show', $figura)
            ->with('success', 'Figura cadastrada com sucesso.');
    }

    public function show(Figura $figura): View
    {
        return view('figuras.show', compact('figura'));
    }

    public function edit(Figura $figura): View
    {
        return view('figuras.edit', compact('figura'));
    }

    public function update(Request $request, Figura $figura): RedirectResponse
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('imagem')) {
            if ($figura->imagem) {
                Storage::disk('public')->delete($figura->imagem);
            }

            $data['imagem'] = $request->file('imagem')->store('figuras', 'public');
        }

        $figura->update($data);

        return to_route('figuras.show', $figura)
            ->with('success', 'Figura atualizada com sucesso.');
    }

    public function destroy(Figura $figura): RedirectResponse
    {
        if ($figura->imagem) {
            Storage::disk('public')->delete($figura->imagem);
        }

        $figura->delete();

        return to_route('figuras.index')
            ->with('success', 'Figura excluída com sucesso.');
    }

    /**
     * @return array<string, array<int, string>>
     */
    private function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'date', 'before_or_equal:today'],
            'posicao' => ['required', 'string', 'max:255'],
            'selecao' => ['required', 'string', 'max:255'],
            'imagem' => ['nullable', 'image', 'max:2048'],
        ];
    }
}