<!-- Modern Chat Interface -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900" wire:poll.1s="refreshMessages">
    
    <!-- Main Chat Container -->
    <div class="flex h-screen mx-auto bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl shadow-2xl">
        
        <!-- Sidebar: Conversations List -->
        <div class="w-92 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col">
            
            <!-- Sidebar Header -->
            <div class="p-6">
                <!-- Back Button -->
                <div class="mb-4">
                    @if ($userRole === 'mentor')
                        <a href="{{ route('mentors.dashboard') }}" 
                           class="inline-flex items-center text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors font-medium group">
                            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver al Dashboard
                        </a>
                    @else
                        <a href="{{ route('students.dashboard') }}" 
                           class="inline-flex items-center text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors font-medium group">
                            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver al Dashboard
                        </a>
                    @endif
                </div>
                
                <!-- Title Section -->
                <div class="flex items-center space-x-3 mb-4">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white">Chats</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            @if($searchTerm)
                                {{ count($this->filteredConversations) }} resultados para "{{ $searchTerm }}"
                            @else
                                {{ count($conversations) }} conversaciones
                            @endif
                        </p>
                    </div>
                </div>
                
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" 
                           wire:model.live="searchTerm"
                           placeholder="Buscar un chat o iniciar uno nuevo"
                           class="w-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full px-4 py-2 pl-10 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    
                    <!-- Search Icon -->
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Clear Search Button -->
                    @if($searchTerm)
                        <button wire:click="$set('searchTerm', '')" 
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
            
            <!-- Conversations List -->
            <div class="flex-1 overflow-y-auto p-4 space-y-2">
                @forelse ($this->filteredConversations as $conversation)
                    <button wire:click="selectConversation({{ $conversation->id }})"
                        class="w-full p-4 rounded-xl transition-all duration-200 text-left group hover:bg-gray-50 dark:hover:bg-gray-800 {{ $selectedConversation && $selectedConversation->id == $conversation->id ? 'bg-blue-50 dark:bg-blue-900/20 border-2 border-blue-200 dark:border-blue-700 shadow-sm' : 'border border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                        
                        <div class="flex items-center space-x-3">
                            <!-- Avatar -->
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold shadow-md">
                                    {{ substr($conversation->getOtherParticipant()->name, 0, 1) }}
                                </div>
                                <!-- Online Status -->
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-900"></div>
                            </div>
                            
                            <!-- Contact Info -->
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-900 dark:text-white truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ $conversation->getOtherParticipant()->name }} {{ $conversation->getOtherParticipant()->surname }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 truncate">Última conexión: hace 2 min</p>
                            </div>
                            
                            <!-- Notification Badge -->
                            <div class="flex flex-col items-end space-y-1">
                                <span class="text-xs text-gray-500 dark:text-gray-400">12:30</span>
                                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                            </div>
                        </div>
                    </button>
                @empty
                    <div class="flex flex-col items-center justify-center py-12 text-center">
                        @if($searchTerm)
                            <!-- No search results -->
                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Sin resultados</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">No se encontraron conversaciones con "{{ $searchTerm }}"</p>
                            <button wire:click="$set('searchTerm', '')" 
                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-sm font-medium">
                                Limpiar búsqueda
                            </button>
                        @else
                            <!-- No conversations -->
                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No hay conversaciones</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Comienza una nueva conversación</p>
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- Main Chat Area -->
        <div class="flex-1 flex flex-col bg-gray-50 dark:bg-gray-800">
            
            @if ($selectedConversation)
                <!-- Chat Header -->
                <div class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <!-- Contact Avatar -->
                            <div class="relative">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold shadow-lg">
                                    {{ substr($selectedConversation->getOtherParticipant()->name, 0, 1) }}
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-900"></div>
                            </div>
                            
                            <!-- Contact Info -->
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $selectedConversation->getOtherParticipant()->name }} {{ $selectedConversation->getOtherParticipant()->surname }}
                                </h2>
                                <p class="text-sm text-green-500">En línea</p>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center space-x-2">
                            @if ($userRole === 'student' && $selectedConversation->getOtherParticipant()->mentor)
                                <button wire:click="triggerScheduleModal({{ $selectedConversation->getOtherParticipant()->mentor->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Agendar</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Messages Area -->
                <div class="flex-1 overflow-y-auto p-6 space-y-6">
                    @forelse ($messages as $message)
                        @if ($message->sender_id != auth()->id())
                            <!-- Received Message -->
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-gray-400 to-gray-600 rounded-full flex items-center justify-center text-white text-sm font-medium flex-shrink-0">
                                    {{ substr($message->sender->name, 0, 1) }}
                                </div>
                                <div class="max-w-xs lg:max-w-md">
                                    <div class="bg-white dark:bg-gray-700 rounded-2xl rounded-tl-md px-4 py-3 shadow-sm border border-gray-200 dark:border-gray-600">
                                        <p class="text-gray-900 dark:text-white">{{ $message->content }}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 ml-3">{{ $message->created_at->format('H:i') }}</p>
                                </div>
                            </div>
                        @else
                            <!-- Sent Message -->
                            <div class="flex items-start justify-end space-x-3">
                                <div class="max-w-xs lg:max-w-md text-right">
                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl rounded-tr-md px-4 py-3 shadow-sm">
                                        <p class="text-white">{{ $message->content }}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 mr-3">{{ $message->created_at->format('H:i') }}</p>
                                </div>
                                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white text-sm font-medium flex-shrink-0">
                                    Tú
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="flex flex-col items-center justify-center h-full py-12">
                            <div class="w-24 h-24 bg-gradient-to-r from-blue-100 to-indigo-100 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Comienza la conversación</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-center">Envía el primer mensaje para iniciar el chat</p>
                        </div>
                    @endforelse
                </div>
                
                <!-- Message Input -->
                <div class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 p-4">
                    <form wire:submit.prevent="sendMessage" class="flex items-center space-x-4">
                        <div class="flex-1 relative">
                            <input type="text" 
                                   wire:model.defer="newMessage"
                                   placeholder="Escribe tu mensaje..."
                                   class="w-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full px-6 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   maxlength="1000" />
                            
                            <!-- Emoji Button -->
                            <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Send Button -->
                        <button type="submit"
                                class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed group">
                            <svg class="w-5 h-5 transform group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>
                    </form>
                </div>
            @else
                <!-- Empty State -->
                <div class="flex-1 flex flex-col items-center justify-center p-12 text-center">
                    <div class="w-32 h-32 bg-gradient-to-r from-blue-100 to-indigo-100 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-full flex items-center justify-center mb-8">
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Selecciona una conversación</h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md">Elige una conversación de la lista para comenzar a chatear con tus mentores o estudiantes.</p>
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span>Haz clic en una conversación para empezar</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Schedule Appointment Modal -->
    @livewire('students.schedule-appointment')
</div>
