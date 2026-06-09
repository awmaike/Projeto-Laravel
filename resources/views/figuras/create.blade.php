<x-layouts::app :title="__('Nova figura')">
    <div class="mx-auto w-full max-w-5xl">
        <div class="mb-6">
            <flux:heading size="xl">Nova figura</flux:heading>
            <flux:text class="mt-1">Cadastre os dados da figura para incluí-la no álbum.</flux:text>
        </div>

        <form action="{{ route('figuras.store') }}" method="POST" enctype="multipart/form-data" class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            @csrf
            @include('figuras._form', ['figura' => null, 'submitLabel' => 'Cadastrar figura'])
        </form>
    </div>
</x-layouts::app>