<x-app-layout>
    @section('title', 'Data Janji - ' . config('app.name'))
    <x-heading level="h2">
        <x-slot name="title">
            {{ __('Detail Janji') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Detail Janji, dan pastikan data yang dikirim benar') }}
        </x-slot>
    </x-heading>

    <form action="{{ route('patients.appointments.store') }}" method="post" class="grid gap-6 lg:grid-cols-2">
        @csrf

        <!-- Date -->
        <div class="lg:col-span-1">
            <x-label for="date" :value="__('appointments.date.label')" />
            <x-input id="date" type="text" name="date"
                value="{{ \Carbon\Carbon::parse($appointment->date)->translatedFormat('l, d F Y') }}" readonly />
        </div>

        <!-- Appointment Time -->
        <div class="lg:col-span-1">
            <x-label for="time" :value="__('appointments.time.label')" />
            <x-input id="time" type="text" name="time"
                value="{{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }} WIB" readonly />
        </div>

        <!-- Service Information -->
        <div class="lg:col-span-1">
            <x-label for="service_id" :value="__('appointments.service_id.label')" />
            <x-input type="text" id="service_id" name="service_id"
                value="{{ $appointment->service->title }} - Rp {{ number_format($appointment->service->price, 0, '.', '.') }}"
                readonly />
        </div>

        <!-- Payment Information -->
        <div class="lg:col-span-1">
            <x-label for="payment_id" :value="__('appointments.payment_id.label')" />
            <x-input type="text" id="payment_id" name="payment_id"
                value="{{ $appointment->payment->account }} - {{ $appointment->payment->number }}" readonly />
        </div>

        <!-- Frequency -->
        <div class="lg:col-span-1">
            <x-label for="frequency" :value="__('appointments.frequency.label')" />
            <x-input type="text" id="frequency" name="frequency"
                value="{{ \Illuminate\Support\Str::title(__('frequencies.' . $appointment->notification->frequency)) }}"
                readonly />
        </div>

        <div class="lg:col-span-1">
            @php
                $statusClasses = [
                    'cancelled' => 'bg-zinc-100 text-red-600',
                    'pending' => 'bg-zinc-100 text-yellow-600',
                    'finished' => 'bg-zinc-100 text-green-600',
                    'confirmed' => 'bg-accent text-blue-600',
                    'default' => 'bg-gray-100 text-gray-800',
                ];
                $statusClass = $statusClasses[$appointment->status] ?? $statusClasses['default'];
            @endphp

            <x-label for="status" :value="__('Status')" />
            <x-input id="status" type="text" name="status" value="{{ ucfirst($appointment->status) }}" readonly
                class="p-2 rounded {{ $statusClass }}" />
        </div>

        <div class="flex flex-col-reverse lg:flex-row lg:justify-end gap-4 col-span-full">
            <x-button type="button" variant="primary"
                onclick="window.location.href='{{ route('patients.appointments.index', $appointment) }}'">
                <i data-lucide="arrow-left"></i>
                {{ __('Kembali') }}
            </x-button>
        </div>
    </form>

</x-app-layout>
