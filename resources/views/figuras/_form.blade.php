@php
    $inputClass = 'mt-2 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-500/20 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white';
    $labelClass = 'block text-sm font-medium text-zinc-700 dark:text-zinc-200';
@endphp

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label for="nome" class="{{ $labelClass }}">Nome</label>
        <input id="nome" name="nome" type="text" value="{{ old('nome', $figura?->nome) }}" class="{{ $inputClass }}" required autofocus>
        @error('nome') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="selecao" class="{{ $labelClass }}">Seleção</label>
        <input id="selecao" name="selecao" type="text" value="{{ old('selecao', $figura?->selecao) }}" class="{{ $inputClass }}" required>
        @error('selecao') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="time" class="{{ $labelClass }}">Time</label>
        <input id="time" name="time" type="text" value="{{ old('time', $figura?->time) }}" class="{{ $inputClass }}" required>
        @error('time') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="posicao" class="{{ $labelClass }}">Posição</label>
        <input id="posicao" name="posicao" type="text" value="{{ old('posicao', $figura?->posicao) }}" class="{{ $inputClass }}" required>
        @error('posicao') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="data_nascimento" class="{{ $labelClass }}">Data de nascimento</label>
        <input id="data_nascimento" name="data_nascimento" type="date" value="{{ old('data_nascimento', $figura?->data_nascimento) }}" class="{{ $inputClass }}" required>
        @error('data_nascimento') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="imagem" class="{{ $labelClass }}">Imagem</label>
        <input id="imagem" name="imagem" type="file" accept="image/*" class="{{ $inputClass }}">
        <p class="mt-1 text-xs text-zinc-500">Opcional. JPG, PNG ou WEBP com até 2 MB.</p>
        @error('imagem') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

<div class="mt-6 flex items-center justify-end gap-3 border-t border-zinc-200 pt-5 dark:border-zinc-700">
    <flux:button :href="route('figuras.index')" variant="ghost">Cancelar</flux:button>
    <flux:button type="submit" variant="primary">{{ $submitLabel }}</flux:button>
</div>

