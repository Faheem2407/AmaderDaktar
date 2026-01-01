@if ($dayAvailabilities->count() > 0)
    <ul class="time-slots">
        @foreach ($dayAvailabilities as $availability)
            @foreach ($availability->generateTimeSlots() as $slot)
                <li>
                    <i class="isax isax-clock"></i>
                    {{ date('h:i A', strtotime($slot['start_time'])) }}
                    @if ($availability->max_patients > 1)
                        <span class="slot-space">Space: {{ $availability->max_patients }}</span>
                    @endif
                </li>
            @endforeach
        @endforeach
    </ul>
@else
    <p class="text-muted">No slots available</p>
@endif
