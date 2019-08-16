<div style='margin-left: 10%;'>
    <ul>
        <li><strong>{{ $item->description }}<span class='badge bg-blue'>PCS</span> <span class='badge bg-yellow'>1000</span></strong></li>
        <ul>
            @foreach($qty as $row)
            <li>{{ json_encode($row) }} <span class='badge bg-green'>{{ $row->id }}</span> <span class='badge bg-green'>{{ $item_id }}</span></li>
            <!--
            <ul>
                <li>ICTU <span class='badge bg-green'>100</span></li>
                <ul>
                    <li>Dave <span class='badge bg-green'>100</span></li>
                    <li>Rusel <span class='badge bg-green'>100</span></li>
                </ul>
                <li>P.U <span class='badge bg-green'>100</span></li>
                <ul>
                    <li>Joan <span class='badge bg-green'>100</span></li>
                    <li>Ubebee <span class='badge bg-green'>100</span></li>
                </ul>
            </ul>
            -->
            @endforeach
        </ul>
    </ul>
</div>