@props(['disabled' => false])
@php
    $name = $attributes->has('wire:model') ?  $attributes->get('wire:model') : ($attributes->has('name') ?  $attributes->get('name') : null);
    $classError = ($name && $errors->has($name)) ? 'border-danger dark:border-danger/70' : '';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control ' . $classError]) !!}>
