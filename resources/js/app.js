import './bootstrap';
import './layouts/sidebar.js';
import { initFlowbite } from 'flowbite';
import "./vendor/tooltip";
Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
    succeed(({ snapshot, effect }) => {
        queueMicrotask(() => {
            initFlowbite();
            window.tooltip.init();
        })
    })
})

document.addEventListener('livewire:navigated', () => {
    console.log('navigated');
    initFlowbite();
    window.tooltip.init();
})

// Load static files
import.meta.glob(["../images/**"]);
