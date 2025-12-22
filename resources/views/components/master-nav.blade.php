<div class="mb-6 border-b border-gray-200">
    <nav class="flex gap-8 overflow-x-auto no-scrollbar" aria-label="Tabs">
    
        <a href="{{ route('master.toolbox.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.toolbox.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Tool Box
        </a>

        <a href="{{ route('master.toolkit.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.toolkit.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Toolkit
        </a>

        <a href="{{ route('master.mekanik.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.mekanik.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Mekanik
        </a>

        <a href="{{ route('master.mekanik2.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.mekanik2.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Mekanik 2
        </a>

        <a href="{{ route('master.genset.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.genset.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Genset
        </a>
        
        <a href="{{ route('master.elektric.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.elektric.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Elektric
        </a>

        <a href="{{ route('master.log-gangguan.informasi-pemeriksaan') }}" 
           class="whitespace-nowrap border-b-2 py-3 px-1 text-sm font-medium transition-colors
           {{ request()->routeIs('master.log-gangguan.*') 
              ? 'border-blue-600 text-blue-600 font-bold' 
              : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
           Gangguan
        </a>

    </nav>
</div>