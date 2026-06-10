<x-layouts::app :title="$figura->nome">
    <div class="mx-auto w-full max-w-5xl">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">{{ $figura->nome }}</flux:heading>
                <flux:text class="mt-1">Detalhes da figura cadastrada.</flux:text>
            </div>

            <div class="flex gap-2">
                <flux:button :href="route('figuras.index')" variant="ghost">Voltar</flux:button>
                <flux:button :href="route('figuras.edit', $figura)" variant="primary">Editar</flux:button>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900 md:grid-cols-[220px_1fr]">
            <div class="flex aspect-[3/4] items-center justify-center overflow-hidden rounded-lg bg-zinc-100 dark:bg-zinc-800">
                @if ($figura->imagem)
                    <img src="{{ asset('storage/'.$figura->imagem) }}" alt="{{ $figura->nome }}" class="h-full w-full object-cover">
                @else
                    <span class="px-4 text-center text-sm text-zinc-500">Sem imagem cadastrada</span>
                @endif
            </div>

            <dl class="grid content-start gap-5 sm:grid-cols-2">
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-zinc-500">Seleção</dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-white">{{ $figura->selecao }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-zinc-500">Time</dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-white">{{ $figura->time }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-zinc-500">Posição</dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-white">{{ $figura->posicao }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-zinc-500">Data de nascimento</dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-white">{{ date('d/m/Y', strtotime($figura->data_nascimento)) }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts::app>