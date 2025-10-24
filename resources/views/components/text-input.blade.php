@props(['disabled' => false])

{{-- Dark theme input with glassmorphism --}}
<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-white/20 bg-white/10 text-white placeholder-slate-400 focus:border-white/50 focus:ring-white/50 focus:bg-white/20 rounded-lg shadow-sm backdrop-blur-sm']) }}>
