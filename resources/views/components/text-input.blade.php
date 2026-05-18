@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition-colors duration-200']) }}>
