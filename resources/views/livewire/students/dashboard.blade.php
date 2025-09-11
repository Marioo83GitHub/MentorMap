<div class= "relative z-10">
    <div class="text-xl p-4">
        Student Dashboard
    </div>

    <div class="p-4">
        <a href="{{ route('students.chat') }}" class="text-blue-600 hover:underline">
            Ir a mis Chats
        </a>
    </div>
    <div class="p-4">
        <a href="{{ route('students.search-mentor') }}" class="text-blue-600 hover:underline">
            Buscar Mentor
        </a>
    </div>
    @livewire('shared.appointments-list')
</div>

