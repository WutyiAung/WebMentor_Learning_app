@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 bg-transparent bg-opacity-50 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} style="background: lightblue; color:black" >
