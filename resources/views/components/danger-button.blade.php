<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger hover:bg-red-500']) }}>
    {{ $slot }}
</button>
