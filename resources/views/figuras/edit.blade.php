<x-layouts::app :title="__('Editar figura')">
    <div class="mx-auto w-full max-w-5xl">
        <div class="mb-6">
            <flux:heading size="xl">Editar figura</flux:heading>
            <flux:text class="mt-1">Atualize os dados de {{ $figura->nome }}.</flux:text>
        </div>

        <form action="{{ route('figuras.update', $figura) }}" method="POST" enctype="multipart/form-data" class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            @csrf
            @method('PUT')
            @include('figuras._form', ['submitLabel' => 'Salvar alterações'])
        </form>
    </div>
</x-layouts::app>