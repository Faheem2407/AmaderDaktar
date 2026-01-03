<ul class="time-slots">
@forelse($dayAvailabilities as $slot)
    <li class="slot-item">
        <span class="slot-time">{{ $slot->start_time }} - {{ $slot->end_time }}</span>
        <div class="slot-details">
            <span class="slot-badge">Fee: ${{ $slot->appointment_fee }}</span>
            <span class="slot-badge">Max: {{ $slot->max_patients }}</span>
        </div>
    </li>
@empty
    <li>No slots added yet.</li>
@endforelse
</ul>
