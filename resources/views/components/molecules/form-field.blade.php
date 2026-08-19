@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
])

<div>
    <x-atoms.label :for="$name">
        {{ $label }}
    </x-atoms.label>

    <x-atoms.input
        :id="$name"
        :name="$name"
        :type="$type"
        :value="old($name, $value)"
        :placeholder="$placeholder"
    />

    @error($name)
        <p class="mt-1.5 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>