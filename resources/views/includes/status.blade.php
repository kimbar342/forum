<div>
    @if($result->position_in_office === 'В декрете')
    <div>
        <img src="{{ asset('storage/uploads'). "/" . "maternity_leave.png" }}" alt="image" width="30px" height="30px" style="border-radius: 50%">
        <p>
            {{ __('В декрете') }}
        </p>
    </div>
    @elseif($result->position_in_office === 'В командировке')
        <div>
            <img src="{{ asset('storage/uploads'). "/" . "business_trip.png" }}" alt="image" width="30px" height="30px" style="border-radius: 50%">
            <p>
                {{ __('В командировке') }}
            </p>
        </div>
    @elseif($result->position_in_office === 'На больничном')
        <div>
            <img src="{{ asset('storage/uploads'). "/" . "sick_leave.png" }}" alt="image" width="30px" height="30px" style="border-radius: 50%">
            <p>
                {{ __('На больничном') }}
            </p>
        </div>
    @elseif($result->position_in_office === 'Находится на рабочем месте')
        <div>
            <img src="{{ asset('storage/uploads'). "/" . "work.png" }}" alt="image" width="30px" height="30px" style="border-radius: 50%">
            <p>
                {{ __('Находится на рабочем месте') }}
            </p>
        </div>
    @else()
</div>

<div>
    <p>
        {{ __('Статус не известен') }}
    </p>
</div>
@endif
