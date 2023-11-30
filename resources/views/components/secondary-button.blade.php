<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-outline-secondary hover:bg-gray-50 dark:hover:bg-gray-700']) }}>
    {{ $slot }}
</button>
