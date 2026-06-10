<x-layouts::app :title="__('Figuras')">
    <div class="w-full">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">Figuras</flux:heading>
                <flux:text class="mt-1">Gerencie as figuras cadastradas no álbum.</flux:text>
            </div>

            <flux:button :href="route('figuras.create')" variant="primary" icon="plus">Nova figura</flux:button>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            @if ($figuras->isEmpty())
                <div class="px-6 py-12 text-center">
                    <flux:heading>Nenhuma figura cadastrada</flux:heading>
                    <flux:text class="mt-1">Comece adicionando a primeira figura do álbum.</flux:text>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-zinc-200 text-sm dark:divide-zinc-700">
                        <thead class="bg-zinc-50 text-left text-xs font-medium uppercase tracking-wide text-zinc-500 dark:bg-zinc-800">
                            <tr>
                                <th class="px-4 py-3">Figura</th>
                                <th class="px-4 py-3">Seleção</th>
                                <th class="px-4 py-3">Time</th>
                                <th class="px-4 py-3">Posição</th>
                                <th class="px-4 py-3 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach ($figuras as $figura)
                                <tr class="text-zinc-700 dark:text-zinc-200">
                                    <td class="px-4 py-3 font-medium">{{ $figura->nome }}</td>
                                    <td class="px-4 py-3">{{ $figura->selecao }}</td>
                                    <td class="px-4 py-3">{{ $figura->time }}</td>
                                    <td class="px-4 py-3">{{ $figura->posicao }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-end gap-2">
                                            <flux:button :href="route('figuras.show', $figura)" size="sm" variant="ghost">Ver</flux:button>
                                            <flux:button :href="route('figuras.edit', $figura)" size="sm" variant="ghost">Editar</flux:button>
                                            <form action="{{ route('figuras.destroy', $figura) }}" method="POST" onsubmit="return confirm('Deseja excluir esta figura?')">
                                                @csrf
                                                @method('DELETE')
                                                <flux:button type="submit" size="sm" variant="danger">Excluir</flux:button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-zinc-200 px-4 py-3 dark:border-zinc-700">
                    {{ $figuras->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts::app>